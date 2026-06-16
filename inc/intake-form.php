<?php
/**
 * Print Archival Intake Form System — Stage 2 Local Protected Upload
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Allow fine art upload formats.
 */
if ( ! function_exists( 'print_archival_allow_fine_art_formats' ) ) {
	function print_archival_allow_fine_art_formats( $mimes ) {
		$mimes['tiff'] = 'image/tiff';
		$mimes['tif']  = 'image/tiff';
		$mimes['psd']  = 'image/vnd.adobe.photoshop';

		return $mimes;
	}
}
add_filter( 'upload_mimes', 'print_archival_allow_fine_art_formats' );

/**
 * Submission type labels.
 */
function print_archival_intake_submission_types() {
	return array(
		'archive_submission'        => 'The Archive / Canadian Archive Project Submission',
		'tattoo_submission'         => 'Tattoo Archival Submission',
		'fine_art_quote'            => 'Fine Art Print Quote',
		'photography_quote'         => 'Photography Print Quote',
		'wedding_private_quote'     => 'Wedding / Private Client Print Quote',
	);
}

/**
 * Render intake form.
 */
function print_archival_render_intake_form() {
	$submission_types = print_archival_intake_submission_types();

	ob_start();

	get_template_part(
		'template-parts/forms/intake-form',
		null,
		array(
			'submission_types' => $submission_types,
		)
	);

	return ob_get_clean();
}
add_shortcode( 'print_archival_intake_form', 'print_archival_render_intake_form' );

/**
 * Process intake form submission.
 */
function print_archival_process_intake_form() {
	if ( empty( $_POST['pa_intake_action'] ) || 'submit' !== $_POST['pa_intake_action'] ) {
		return;
	}

	$is_ajax = ! empty( $_POST['pa_ajax_submit'] );

	$fail = function( $message ) use ( $is_ajax ) {
		if ( $is_ajax ) {
			wp_send_json_error( $message );
		}

		wp_die(
			esc_html( $message ),
			esc_html__( 'Submission Error', 'print-archival' ),
			array( 'response' => 400 )
		);
	};

	if ( empty( $_POST['pa_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['pa_nonce'] ) ), 'pa_intake_form_nonce' ) ) {
		$fail( 'Security validation failed. Please refresh the page and try again.' );
	}

	if ( ! empty( $_POST['pa_website_verification'] ) ) {
		$fail( 'Spam submission blocked.' );
	}

	$name    = isset( $_POST['pa_name'] ) ? sanitize_text_field( wp_unslash( $_POST['pa_name'] ) ) : '';
	$email   = isset( $_POST['pa_email'] ) ? sanitize_email( wp_unslash( $_POST['pa_email'] ) ) : '';
	$type    = isset( $_POST['pa_type'] ) ? sanitize_key( wp_unslash( $_POST['pa_type'] ) ) : '';
	$message = isset( $_POST['pa_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['pa_message'] ) ) : '';

	$submission_types = print_archival_intake_submission_types();

	if ( empty( $name ) || empty( $email ) || empty( $type ) || empty( $message ) ) {
		$fail( 'Please complete all required fields.' );
	}

	if ( ! is_email( $email ) ) {
		$fail( 'Please enter a valid email address.' );
	}

	if ( ! isset( $submission_types[ $type ] ) ) {
		$fail( 'Invalid submission type.' );
	}

	$type_label = $submission_types[ $type ];

	$file_status = 'No file selected.';

	$log_file_name      = '';
	$log_drive_link     = '';
	$log_retention_note = '';
	$log_upload_status  = 'No file selected';

	if ( ! empty( $_FILES['pa_file']['name'] ) ) {
		$file_result = print_archival_handle_local_intake_upload( $_FILES['pa_file'], $name, $type );

		if ( is_wp_error( $file_result ) ) {
			$fail( $file_result->get_error_message() );
		}

		$folder_id = print_archival_get_drive_folder_id_for_submission_type( $type );

		if ( empty( $folder_id ) ) {
			$fail( 'Google Drive folder is not configured for this submission type.' );
		}

		$drive_result = print_archival_stream_to_drive(
			$file_result['file_path'],
			$file_result['file_name'],
			$file_result['mime_type'],
			$folder_id
		);

		if ( is_wp_error( $drive_result ) ) {
			$file_status = 'File transfer failed. The file was retained in the protected intake folder for review.';

			$log_file_name      = $file_result['file_name'];
			$log_drive_link     = '';
			$log_retention_note = 'Retained in protected intake folder after Drive transfer failure.';
			$log_upload_status  = 'Drive transfer failed';
		} else {
			if ( file_exists( $file_result['file_path'] ) ) {
				wp_delete_file( $file_result['file_path'] );
			}

			$file_status = 'File transferred to Google Drive successfully.';

			$log_file_name      = $file_result['file_name'];
			$log_drive_link     = $drive_result;
			$log_retention_note = '';
			$log_upload_status  = 'Transferred to Google Drive';
		}
	}

	$submission_log_id = print_archival_log_intake_submission(
		array(
			'name'                        => $name,
			'email'                       => $email,
			'type_label'                  => $type_label,
			'pa_submission_name'          => $name,
			'pa_submission_email'         => $email,
			'pa_submission_type'          => $type_label,
			'pa_submission_type_key'      => $type,
			'pa_submission_message'       => $message,
			'pa_submission_file_name'      => $log_file_name,
			'pa_submission_drive_link'     => $log_drive_link,
			'pa_submission_retention_note' => $log_retention_note,
			'pa_submission_upload_status'  => $log_upload_status,
		)
	);

	$to      = 'hello@printarchival.ca';
	$subject = 'New Print Archival Intake: ' . $type_label . ' from ' . $name;

	$email_body = '<h2>Print Archival Submission Received</h2>';

	if ( ! is_wp_error( $submission_log_id ) ) {
		$email_body .= '<p><strong>Submission Log ID:</strong> #' . esc_html( $submission_log_id ) . '</p>';
	}

	$email_body .= '<p><strong>Name:</strong> ' . esc_html( $name ) . '</p>';
	$email_body .= '<p><strong>Email:</strong> ' . esc_html( $email ) . '</p>';
	$email_body .= '<p><strong>Submission Type:</strong> ' . esc_html( $type_label ) . '</p>';
	$email_body .= '<p><strong>Message:</strong><br>' . nl2br( esc_html( $message ) ) . '</p>';
	$email_body .= '<p><strong>File Status:</strong><br>' . esc_html( $file_status ) . '</p>';

	$headers = array(
		'Content-Type: text/html; charset=UTF-8',
		'Reply-To: ' . $name . ' <' . $email . '>',
	);

	wp_mail( $to, $subject, $email_body, $headers );

	$redirect = home_url( '/submission-complete/' );

	if ( $is_ajax ) {
		wp_send_json_success(
			array(
				'redirect' => esc_url_raw( $redirect ),
			)
		);
	}

	wp_safe_redirect( $redirect );
	exit;
}
add_action( 'wp_loaded', 'print_archival_process_intake_form' );

/**
 * Temporarily route intake uploads to protected folder.
 */
function print_archival_intake_upload_dir( $dirs ) {
	$subdir = '/print-archival-intake';

	$dirs['subdir'] = $subdir;
	$dirs['path']   = $dirs['basedir'] . $subdir;
	$dirs['url']    = $dirs['baseurl'] . $subdir;

	return $dirs;
}

/**
 * Create protection files inside intake upload directory.
 */
function print_archival_protect_intake_directory() {
	$uploads = wp_upload_dir();
	$dir     = trailingslashit( $uploads['basedir'] ) . 'print-archival-intake';

	if ( ! file_exists( $dir ) ) {
		wp_mkdir_p( $dir );
	}

	$htaccess = $dir . '/.htaccess';
	$index    = $dir . '/index.php';

	// Verify equivalent server-level access rules separately on Nginx or non-Apache hosts.
	if ( ! file_exists( $htaccess ) ) {
		$rules  = "Options -Indexes\n";
		$rules .= "<IfModule mod_authz_core.c>\n";
		$rules .= "Require all denied\n";
		$rules .= "</IfModule>\n";
		$rules .= "<IfModule !mod_authz_core.c>\n";
		$rules .= "Order allow,deny\n";
		$rules .= "Deny from all\n";
		$rules .= "</IfModule>\n";

		file_put_contents( $htaccess, $rules );
	}

	if ( ! file_exists( $index ) ) {
		file_put_contents( $index, "<?php\n// Silence is golden.\n" );
	}
}

/**
 * Handle local intake upload.
 */
function print_archival_handle_local_intake_upload( $file, $name, $type ) {
	$max_size = 256 * 1024 * 1024;

	$allowed_mimes = array(
		'tiff' => 'image/tiff',
		'tif'  => 'image/tiff',
		'psd'  => 'image/vnd.adobe.photoshop',
		'jpg'  => 'image/jpeg',
		'jpeg' => 'image/jpeg',
		'png'  => 'image/png',
	);

	if ( ! isset( $file['error'] ) || UPLOAD_ERR_OK !== $file['error'] ) {
		return new WP_Error( 'pa_upload_error', 'Upload failed before reaching the server.' );
	}

	if ( empty( $file['size'] ) || $file['size'] > $max_size ) {
		return new WP_Error( 'pa_upload_size', 'File is too large. Maximum upload size is 256MB.' );
	}

	$original_name = isset( $file['name'] ) ? sanitize_file_name( $file['name'] ) : '';
	$extension     = strtolower( pathinfo( $original_name, PATHINFO_EXTENSION ) );

	if ( ! isset( $allowed_mimes[ $extension ] ) ) {
		return new WP_Error( 'pa_upload_type', 'File type not allowed. Please upload TIFF, PSD, JPEG, JPG, or PNG.' );
	}

	require_once ABSPATH . 'wp-admin/includes/file.php';

	print_archival_protect_intake_directory();

	add_filter( 'upload_dir', 'print_archival_intake_upload_dir' );

	$uploaded = wp_handle_upload(
		$file,
		array(
			'test_form'                => false,
			'mimes'                    => $allowed_mimes,
			'unique_filename_callback' => function( $dir, $name_from_upload, $ext ) use ( $name, $type ) {
				$clean_name = sanitize_title( $name );
				$clean_type = sanitize_key( $type );

				return sanitize_file_name(
					gmdate( 'Ymd-His' ) . '-' . $clean_type . '-' . $clean_name . $ext
				);
			},
		)
	);

	remove_filter( 'upload_dir', 'print_archival_intake_upload_dir' );

	if ( isset( $uploaded['error'] ) ) {
		return new WP_Error( 'pa_upload_error', $uploaded['error'] );
	}

	if ( empty( $uploaded['file'] ) || ! file_exists( $uploaded['file'] ) ) {
		return new WP_Error( 'pa_upload_missing', 'The upload could not be saved.' );
	}

	return array(
		'file_name'  => basename( $uploaded['file'] ),
		'file_path'  => $uploaded['file'],
		'mime_type'  => ! empty( $uploaded['type'] ) ? $uploaded['type'] : $allowed_mimes[ $extension ],
		'size_bytes' => filesize( $uploaded['file'] ),
	);
}

/**
 * Get Google Drive folder ID by submission type.
 */
function print_archival_get_drive_folder_id_for_submission_type( $type ) {
	$map = array(
		'archive_submission'    => 'PRINT_ARCHIVAL_DRIVE_ARCHIVE_FOLDER_ID',
		'tattoo_submission'     => 'PRINT_ARCHIVAL_DRIVE_TATTOO_FOLDER_ID',
		'fine_art_quote'        => 'PRINT_ARCHIVAL_DRIVE_CUSTOM_PRINTS_FOLDER_ID',
		'photography_quote'     => 'PRINT_ARCHIVAL_DRIVE_CUSTOM_PRINTS_FOLDER_ID',
		'wedding_private_quote' => 'PRINT_ARCHIVAL_DRIVE_PRIVATE_CLIENT_FOLDER_ID',
	);

	if ( empty( $map[ $type ] ) ) {
		return '';
	}

	$constant_name = $map[ $type ];

	if ( ! defined( $constant_name ) ) {
		return '';
	}

	return constant( $constant_name );
}

/**
 * Stream uploaded file to Google Drive.
 */
function print_archival_stream_to_drive( $file_path, $file_name, $mime_type, $folder_id ) {
	if ( ! defined( 'PRINT_ARCHIVAL_GOOGLE_CLIENT_EMAIL' ) || ! defined( 'PRINT_ARCHIVAL_GOOGLE_PRIVATE_KEY_B64' ) ) {
		return new WP_Error( 'pa_drive_config', 'Google Drive credentials are not configured.' );
	}

	if ( ! function_exists( 'curl_init' ) ) {
		return new WP_Error( 'pa_curl_missing', 'cURL is not available on this server.' );
	}

	if ( ! file_exists( $file_path ) ) {
		return new WP_Error( 'pa_file_missing', 'Local staging file does not exist.' );
	}

	$client_email = PRINT_ARCHIVAL_GOOGLE_CLIENT_EMAIL;
	$private_key  = base64_decode( PRINT_ARCHIVAL_GOOGLE_PRIVATE_KEY_B64, true );

	if ( false === $private_key ) {
		return new WP_Error( 'pa_drive_credentials', 'Google Drive private key could not be decoded.' );
	}

	if ( empty( $client_email ) || empty( $private_key ) ) {
		return new WP_Error( 'pa_drive_credentials', 'Google Drive credentials are incomplete.' );
	}

	$access_token = print_archival_get_google_access_token( $client_email, $private_key );

	if ( is_wp_error( $access_token ) ) {
		return $access_token;
	}

	$metadata = wp_json_encode(
		array(
			'name'    => $file_name,
			'parents' => array( $folder_id ),
		)
	);

	$session_url = 'https://www.googleapis.com/upload/drive/v3/files?uploadType=resumable&supportsAllDrives=true';

	$ch = curl_init( $session_url );

	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_HEADER, true );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $metadata );
	curl_setopt(
		$ch,
		CURLOPT_HTTPHEADER,
		array(
			'Authorization: Bearer ' . $access_token,
			'Content-Type: application/json; charset=UTF-8',
			'X-Upload-Content-Type: ' . $mime_type,
			'X-Upload-Content-Length: ' . filesize( $file_path ),
		)
	);

	$response = curl_exec( $ch );

	if ( false === $response ) {
		$error = curl_error( $ch );
		curl_close( $ch );

		return new WP_Error( 'pa_drive_session_curl', 'Google Drive session error: ' . $error );
	}

	$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	curl_close( $ch );

	if ( $http_code < 200 || $http_code >= 300 ) {
		return new WP_Error( 'pa_drive_session_http', 'Google Drive session failed. HTTP status: ' . $http_code . '. Response: ' . substr( wp_strip_all_tags( $response ), 0, 300 ) );
	}

	$upload_url = '';

	if ( preg_match( '/Location:\s*(.+)\r/i', $response, $matches ) ) {
		$upload_url = trim( $matches[1] );
	}

	if ( empty( $upload_url ) ) {
		return new WP_Error( 'pa_drive_no_location', 'Google Drive upload session did not return an upload URL.' );
	}

	$file_handle = fopen( $file_path, 'rb' );

	if ( ! $file_handle ) {
		return new WP_Error( 'pa_file_open', 'Could not open local staging file.' );
	}

	$ch = curl_init( $upload_url );

	curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'PUT' );
	curl_setopt( $ch, CURLOPT_UPLOAD, true );
	curl_setopt( $ch, CURLOPT_INFILE, $file_handle );
	curl_setopt( $ch, CURLOPT_INFILESIZE, filesize( $file_path ) );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt(
		$ch,
		CURLOPT_HTTPHEADER,
		array(
			'Content-Type: ' . $mime_type,
			'Content-Length: ' . filesize( $file_path ),
			'Expect:',
		)
	);

	$raw_response = curl_exec( $ch );

	if ( false === $raw_response ) {
		$error = curl_error( $ch );
		curl_close( $ch );
		fclose( $file_handle );

		return new WP_Error( 'pa_drive_upload_curl', 'Google Drive upload error: ' . $error );
	}

	$upload_http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );

	curl_close( $ch );
	fclose( $file_handle );

	if ( $upload_http_code < 200 || $upload_http_code >= 300 ) {
		return new WP_Error( 'pa_drive_upload_http', 'Google Drive upload failed. HTTP status: ' . $upload_http_code . '. Response: ' . substr( wp_strip_all_tags( $raw_response ), 0, 300 ) );
	}

	$upload_response = json_decode( $raw_response, true );

	if ( isset( $upload_response['id'] ) ) {
		return 'https://drive.google.com/open?id=' . rawurlencode( $upload_response['id'] );
	}

	if ( isset( $upload_response['error']['message'] ) ) {
		return new WP_Error( 'pa_drive_response', 'Google Drive error: ' . $upload_response['error']['message'] );
	}

	return new WP_Error( 'pa_drive_unknown', 'Google Drive transfer failed without returning a file ID.' );
}

/**
 * Get Google OAuth access token.
 */
function print_archival_get_google_access_token( $client_email, $private_key ) {
	$header = array(
		'alg' => 'RS256',
		'typ' => 'JWT',
	);

	$issued_at  = time();
	$expires_at = $issued_at + 3600;

	$payload = array(
		'iss'   => $client_email,
		'scope' => 'https://www.googleapis.com/auth/drive',
		'aud'   => 'https://oauth2.googleapis.com/token',
		'exp'   => $expires_at,
		'iat'   => $issued_at,
	);

	$base64_header  = print_archival_base64_url_encode( wp_json_encode( $header ) );
	$base64_payload = print_archival_base64_url_encode( wp_json_encode( $payload ) );

	$signature_input = $base64_header . '.' . $base64_payload;

	if ( ! function_exists( 'openssl_sign' ) ) {
		return new WP_Error( 'pa_openssl_missing', 'OpenSSL is not available on this server.' );
	}

	$signed = openssl_sign( $signature_input, $signature, $private_key, 'SHA256' );

	if ( ! $signed ) {
		return new WP_Error( 'pa_drive_signing', 'Could not sign Google authentication request. Check the private key.' );
	}

	$jwt = $signature_input . '.' . print_archival_base64_url_encode( $signature );

	$ch = curl_init( 'https://oauth2.googleapis.com/token' );

	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt(
		$ch,
		CURLOPT_POSTFIELDS,
		http_build_query(
			array(
				'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
				'assertion'  => $jwt,
			)
		)
	);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

	$response = curl_exec( $ch );

	if ( false === $response ) {
		$error = curl_error( $ch );
		curl_close( $ch );

		return new WP_Error( 'pa_drive_token_curl', 'Google token request failed: ' . $error );
	}

	$http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
	curl_close( $ch );

	$token_data = json_decode( $response, true );

	if ( $http_code < 200 || $http_code >= 300 ) {
		$message = isset( $token_data['error_description'] ) ? $token_data['error_description'] : $response;

		return new WP_Error( 'pa_drive_token_http', 'Google token request failed. HTTP status: ' . $http_code . '. Response: ' . substr( wp_strip_all_tags( $message ), 0, 300 ) );
	}

	if ( empty( $token_data['access_token'] ) ) {
		return new WP_Error( 'pa_drive_token_missing', 'Google did not return an access token.' );
	}

	return $token_data['access_token'];
}

/**
 * Base64 URL encode helper.
 */
function print_archival_base64_url_encode( $data ) {
	return rtrim( strtr( base64_encode( $data ), '+/', '-_' ), '=' );
}

/**
 * Register private intake submission log post type.
 */
if ( ! function_exists( 'print_archival_register_submission_log_post_type' ) ) {
	function print_archival_register_submission_log_post_type() {
		register_post_type(
			'pa_submission',
			array(
				'labels' => array(
					'name'               => 'Intake Submissions',
					'singular_name'      => 'Intake Submission',
					'menu_name'          => 'Intake Submissions',
					'add_new_item'       => 'Add Intake Submission',
					'edit_item'          => 'View Intake Submission',
					'new_item'           => 'New Intake Submission',
					'view_item'          => 'View Intake Submission',
					'search_items'       => 'Search Intake Submissions',
					'not_found'          => 'No intake submissions found',
					'not_found_in_trash' => 'No intake submissions found in trash',
				),
				'public'              => false,
				'publicly_queryable'  => false,
				'exclude_from_search' => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 25,
				'menu_icon'           => 'dashicons-portfolio',
				'capability_type'     => 'post',
				'supports'            => array( 'title' ),
				'has_archive'         => false,
				'rewrite'             => false,
			)
		);
	}
}
add_action( 'init', 'print_archival_register_submission_log_post_type' );

/**
 * Save intake submission log.
 */
if ( ! function_exists( 'print_archival_log_intake_submission' ) ) {
	function print_archival_log_intake_submission( $data ) {
		$name       = isset( $data['name'] ) ? sanitize_text_field( $data['name'] ) : '';
		$email      = isset( $data['email'] ) ? sanitize_email( $data['email'] ) : '';
		$type_label = isset( $data['type_label'] ) ? sanitize_text_field( $data['type_label'] ) : 'Intake Submission';

		$title_parts = array_filter(
			array(
				current_time( 'Y-m-d H:i' ),
				$type_label,
				$name,
			)
		);

		$post_id = wp_insert_post(
			array(
				'post_type'   => 'pa_submission',
				'post_status' => 'private',
				'post_title'  => implode( ' — ', $title_parts ),
			),
			true
		);

		if ( is_wp_error( $post_id ) ) {
			return $post_id;
		}

		$fields = array(
			'pa_submission_name',
			'pa_submission_email',
			'pa_submission_type',
			'pa_submission_type_key',
			'pa_submission_message',
			'pa_submission_file_name',
			'pa_submission_drive_link',
			'pa_submission_retention_note',
			'pa_submission_upload_status',
		);

		foreach ( $fields as $field ) {
			$value = isset( $data[ $field ] ) ? $data[ $field ] : '';
			update_post_meta( $post_id, $field, sanitize_textarea_field( $value ) );
		}

		return $post_id;
	}
}

/**
 * Add submission details metabox.
 */
if ( ! function_exists( 'print_archival_submission_log_metaboxes' ) ) {
	function print_archival_submission_log_metaboxes() {
		add_meta_box(
			'pa_submission_details',
			'Submission Details',
			'print_archival_render_submission_log_metabox',
			'pa_submission',
			'normal',
			'high'
		);
	}
}
add_action( 'add_meta_boxes', 'print_archival_submission_log_metaboxes' );

/**
 * Render submission details metabox.
 */
if ( ! function_exists( 'print_archival_render_submission_log_metabox' ) ) {
	function print_archival_render_submission_log_metabox( $post ) {
		$fields = array(
			'pa_submission_name'          => 'Name',
			'pa_submission_email'         => 'Email',
			'pa_submission_type'          => 'Submission Type',
			'pa_submission_message'       => 'Message',
			'pa_submission_file_name'      => 'File Name',
			'pa_submission_drive_link'     => 'Google Drive Link',
			'pa_submission_retention_note' => 'Retention Note',
			'pa_submission_upload_status'  => 'Upload Status',
		);

		echo '<div class="pa-admin-submission-log">';

		foreach ( $fields as $key => $label ) {
			$value = get_post_meta( $post->ID, $key, true );

			echo '<p style="margin-bottom:16px;">';
			echo '<strong style="display:block; margin-bottom:4px;">' . esc_html( $label ) . '</strong>';

			if ( 'pa_submission_drive_link' === $key && ! empty( $value ) ) {
				echo '<a href="' . esc_url( $value ) . '" target="_blank" rel="noopener noreferrer">Open uploaded file in Google Drive</a>';
			} elseif ( 'pa_submission_message' === $key || 'pa_submission_retention_note' === $key ) {
				echo '<span style="white-space:pre-wrap;">' . esc_html( $value ) . '</span>';
			} else {
				echo esc_html( $value );
			}

			echo '</p>';
		}

		echo '</div>';
	}
}

/**
 * Admin columns for intake submissions.
 */
if ( ! function_exists( 'print_archival_submission_log_columns' ) ) {
	function print_archival_submission_log_columns( $columns ) {
		return array(
			'cb'        => $columns['cb'],
			'title'     => 'Submission',
			'pa_name'   => 'Name',
			'pa_email'  => 'Email',
			'pa_type'   => 'Type',
			'pa_file'   => 'File',
			'pa_drive'  => 'Drive',
			'pa_status' => 'Status',
			'date'      => 'Date',
		);
	}
}
add_filter( 'manage_pa_submission_posts_columns', 'print_archival_submission_log_columns' );

/**
 * Render admin column content.
 */
if ( ! function_exists( 'print_archival_submission_log_column_content' ) ) {
	function print_archival_submission_log_column_content( $column, $post_id ) {
		switch ( $column ) {
			case 'pa_name':
				echo esc_html( get_post_meta( $post_id, 'pa_submission_name', true ) );
				break;

			case 'pa_email':
				$email = get_post_meta( $post_id, 'pa_submission_email', true );
				if ( $email ) {
					echo '<a href="mailto:' . esc_attr( $email ) . '">' . esc_html( $email ) . '</a>';
				}
				break;

			case 'pa_type':
				echo esc_html( get_post_meta( $post_id, 'pa_submission_type', true ) );
				break;

			case 'pa_file':
				echo esc_html( get_post_meta( $post_id, 'pa_submission_file_name', true ) );
				break;

			case 'pa_drive':
				$link = get_post_meta( $post_id, 'pa_submission_drive_link', true );
				if ( $link ) {
					echo '<a href="' . esc_url( $link ) . '" target="_blank" rel="noopener noreferrer">Open File</a>';
				} else {
					echo '—';
				}
				break;

			case 'pa_status':
				echo esc_html( get_post_meta( $post_id, 'pa_submission_upload_status', true ) );
				break;
		}
	}
}
add_action( 'manage_pa_submission_posts_custom_column', 'print_archival_submission_log_column_content', 10, 2 );

/**
 * Add submission type filter dropdown to Intake Submissions admin screen.
 */
if ( ! function_exists( 'print_archival_submission_type_admin_filter' ) ) {
	function print_archival_submission_type_admin_filter( $post_type ) {
		if ( 'pa_submission' !== $post_type ) {
			return;
		}

		$submission_types = print_archival_intake_submission_types();

		$selected = isset( $_GET['pa_submission_type_filter'] )
			? sanitize_key( wp_unslash( $_GET['pa_submission_type_filter'] ) )
			: '';

		echo '<select name="pa_submission_type_filter">';
		echo '<option value="">All Submission Types</option>';

		foreach ( $submission_types as $type_key => $type_label ) {
			printf(
				'<option value="%s" %s>%s</option>',
				esc_attr( $type_key ),
				selected( $selected, $type_key, false ),
				esc_html( $type_label )
			);
		}

		echo '</select>';
	}
}
add_action( 'restrict_manage_posts', 'print_archival_submission_type_admin_filter' );

/**
 * Filter Intake Submissions admin list by submission type.
 */
if ( ! function_exists( 'print_archival_filter_submission_admin_query' ) ) {
	function print_archival_filter_submission_admin_query( $query ) {
		global $pagenow;

		if ( ! is_admin() || ! $query->is_main_query() ) {
			return;
		}

		if ( 'edit.php' !== $pagenow ) {
			return;
		}

		$post_type = $query->get( 'post_type' );

		if ( 'pa_submission' !== $post_type ) {
			return;
		}

		if ( empty( $_GET['pa_submission_type_filter'] ) ) {
			return;
		}

		$type_filter = sanitize_key( wp_unslash( $_GET['pa_submission_type_filter'] ) );

		$query->set(
			'meta_query',
			array(
				array(
					'key'     => 'pa_submission_type_key',
					'value'   => $type_filter,
					'compare' => '=',
				),
			)
		);
	}
}
add_action( 'pre_get_posts', 'print_archival_filter_submission_admin_query' );