<?php
/**
 * Structured Archive content for artists and releases.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Archive custom post types.
 */
function print_archival_register_archive_content_types() {
	register_post_type(
		'pa_artist',
		array(
			'labels' => array(
				'name'               => __( 'Artists', 'print-archival' ),
				'singular_name'      => __( 'Artist', 'print-archival' ),
				'add_new_item'       => __( 'Add Artist', 'print-archival' ),
				'edit_item'          => __( 'Edit Artist', 'print-archival' ),
				'new_item'           => __( 'New Artist', 'print-archival' ),
				'view_item'          => __( 'View Artist', 'print-archival' ),
				'search_items'       => __( 'Search Artists', 'print-archival' ),
				'not_found'          => __( 'No artists found', 'print-archival' ),
				'not_found_in_trash' => __( 'No artists found in trash', 'print-archival' ),
				'menu_name'          => __( 'Artists', 'print-archival' ),
			),
			'public'       => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-admin-users',
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'has_archive'  => 'archive-artists',
			'rewrite'      => array( 'slug' => 'artists' ),
		)
	);

	register_post_type(
		'pa_release',
		array(
			'labels' => array(
				'name'               => __( 'Releases', 'print-archival' ),
				'singular_name'      => __( 'Release', 'print-archival' ),
				'add_new_item'       => __( 'Add Release', 'print-archival' ),
				'edit_item'          => __( 'Edit Release', 'print-archival' ),
				'new_item'           => __( 'New Release', 'print-archival' ),
				'view_item'          => __( 'View Release', 'print-archival' ),
				'search_items'       => __( 'Search Releases', 'print-archival' ),
				'not_found'          => __( 'No releases found', 'print-archival' ),
				'not_found_in_trash' => __( 'No releases found in trash', 'print-archival' ),
				'menu_name'          => __( 'Releases', 'print-archival' ),
			),
			'public'       => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-art',
			'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'has_archive'  => true,
			'rewrite'      => array( 'slug' => 'releases' ),
		)
	);
}
add_action( 'init', 'print_archival_register_archive_content_types' );

/**
 * Register Archive taxonomies.
 */
function print_archival_register_archive_taxonomies() {
	register_taxonomy(
		'pa_artist_type',
		array( 'pa_artist' ),
		array(
			'labels' => array(
				'name'          => __( 'Artist Types', 'print-archival' ),
				'singular_name' => __( 'Artist Type', 'print-archival' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'artist-type' ),
		)
	);

	register_taxonomy(
		'pa_release_type',
		array( 'pa_release' ),
		array(
			'labels' => array(
				'name'          => __( 'Release Types', 'print-archival' ),
				'singular_name' => __( 'Release Type', 'print-archival' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'release-type' ),
		)
	);

	register_taxonomy(
		'pa_archive_status',
		array( 'pa_release' ),
		array(
			'labels' => array(
				'name'          => __( 'Archive Statuses', 'print-archival' ),
				'singular_name' => __( 'Archive Status', 'print-archival' ),
			),
			'public'            => true,
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'rewrite'           => array( 'slug' => 'archive-status' ),
		)
	);
}
add_action( 'init', 'print_archival_register_archive_taxonomies' );

/**
 * Release availability labels.
 */
function print_archival_release_availability_options() {
	return array(
		'available'     => __( 'Available', 'print-archival' ),
		'sold_out'      => __( 'Sold Out', 'print-archival' ),
		'archived_only' => __( 'Archived Only', 'print-archival' ),
		'coming_soon'   => __( 'Coming Soon', 'print-archival' ),
	);
}

/**
 * Digitization status labels.
 */
function print_archival_digitization_status_options() {
	return array(
		''            => __( 'Not specified', 'print-archival' ),
		'digitized'   => __( 'Digitized', 'print-archival' ),
		'documented'  => __( 'Documented', 'print-archival' ),
		'preserved'   => __( 'Preserved', 'print-archival' ),
		'in_progress' => __( 'In Progress', 'print-archival' ),
	);
}

/**
 * Add admin meta boxes.
 */
function print_archival_add_archive_content_metaboxes() {
	add_meta_box( 'pa_artist_details', __( 'Artist Details', 'print-archival' ), 'print_archival_render_artist_details_metabox', 'pa_artist', 'normal', 'high' );
	add_meta_box( 'pa_release_details', __( 'Release / Archive Work Details', 'print-archival' ), 'print_archival_render_release_details_metabox', 'pa_release', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'print_archival_add_archive_content_metaboxes' );

/**
 * Render artist details meta box.
 */
function print_archival_render_artist_details_metabox( $post ) {
	wp_nonce_field( 'print_archival_save_artist_details', 'print_archival_artist_details_nonce' );

	$location        = get_post_meta( $post->ID, '_pa_artist_location', true );
	$instagram_url   = get_post_meta( $post->ID, '_pa_artist_instagram_url', true );
	$website_url     = get_post_meta( $post->ID, '_pa_artist_website_url', true );
	$cap_participant = get_post_meta( $post->ID, '_pa_artist_cap_participant', true );
	$notes           = get_post_meta( $post->ID, '_pa_artist_notes', true );
	?>
	<p><label for="pa_artist_location"><strong><?php esc_html_e( 'Location', 'print-archival' ); ?></strong></label><br><input class="widefat" type="text" id="pa_artist_location" name="pa_artist_location" value="<?php echo esc_attr( $location ); ?>"></p>
	<p><label for="pa_artist_instagram_url"><strong><?php esc_html_e( 'Instagram URL', 'print-archival' ); ?></strong></label><br><input class="widefat" type="url" id="pa_artist_instagram_url" name="pa_artist_instagram_url" value="<?php echo esc_url( $instagram_url ); ?>"></p>
	<p><label for="pa_artist_website_url"><strong><?php esc_html_e( 'Website URL', 'print-archival' ); ?></strong></label><br><input class="widefat" type="url" id="pa_artist_website_url" name="pa_artist_website_url" value="<?php echo esc_url( $website_url ); ?>"></p>
	<p><label><input type="checkbox" name="pa_artist_cap_participant" value="1" <?php checked( '1', $cap_participant ); ?>> <?php esc_html_e( 'Participating in The Canadian Archive Project', 'print-archival' ); ?></label></p>
	<p><label for="pa_artist_notes"><strong><?php esc_html_e( 'Internal / Archive Notes', 'print-archival' ); ?></strong></label><br><textarea class="widefat" id="pa_artist_notes" name="pa_artist_notes" rows="5"><?php echo esc_textarea( $notes ); ?></textarea></p>
	<?php
}

/**
 * Render release details meta box.
 */
function print_archival_render_release_details_metabox( $post ) {
	wp_nonce_field( 'print_archival_save_release_details', 'print_archival_release_details_nonce' );

	$related_artist      = absint( get_post_meta( $post->ID, '_pa_release_related_artist', true ) );
	$availability        = get_post_meta( $post->ID, '_pa_release_availability', true );
	$product_url         = get_post_meta( $post->ID, '_pa_release_product_url', true );
	$product_id          = absint( get_post_meta( $post->ID, '_pa_release_product_id', true ) );
	$edition_size        = get_post_meta( $post->ID, '_pa_release_edition_size', true );
	$medium              = get_post_meta( $post->ID, '_pa_release_medium', true );
	$digitization_status = get_post_meta( $post->ID, '_pa_release_digitization_status', true );
	$artists             = get_posts( array( 'post_type' => 'pa_artist', 'post_status' => 'publish', 'posts_per_page' => 200, 'orderby' => 'title', 'order' => 'ASC' ) );
	?>
	<p>
		<label for="pa_release_related_artist"><strong><?php esc_html_e( 'Related Artist', 'print-archival' ); ?></strong></label><br>
		<select class="widefat" id="pa_release_related_artist" name="pa_release_related_artist">
			<option value="0"><?php esc_html_e( 'Select an artist', 'print-archival' ); ?></option>
			<?php foreach ( $artists as $artist ) : ?>
				<option value="<?php echo esc_attr( $artist->ID ); ?>" <?php selected( $related_artist, $artist->ID ); ?>><?php echo esc_html( get_the_title( $artist ) ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>
	<p>
		<label for="pa_release_availability"><strong><?php esc_html_e( 'Availability Status', 'print-archival' ); ?></strong></label><br>
		<select class="widefat" id="pa_release_availability" name="pa_release_availability">
			<?php foreach ( print_archival_release_availability_options() as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $availability ? $availability : 'archived_only', $value ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>
	<p><label for="pa_release_product_url"><strong><?php esc_html_e( 'Optional WooCommerce Product URL', 'print-archival' ); ?></strong></label><br><input class="widefat" type="url" id="pa_release_product_url" name="pa_release_product_url" value="<?php echo esc_url( $product_url ); ?>"></p>
	<p><label for="pa_release_product_id"><strong><?php esc_html_e( 'Optional WooCommerce Product ID', 'print-archival' ); ?></strong></label><br><input class="widefat" type="number" min="0" step="1" id="pa_release_product_id" name="pa_release_product_id" value="<?php echo esc_attr( $product_id ); ?>"></p>
	<p><label for="pa_release_edition_size"><strong><?php esc_html_e( 'Edition Size', 'print-archival' ); ?></strong></label><br><input class="widefat" type="text" id="pa_release_edition_size" name="pa_release_edition_size" value="<?php echo esc_attr( $edition_size ); ?>"></p>
	<p><label for="pa_release_medium"><strong><?php esc_html_e( 'Medium / Material', 'print-archival' ); ?></strong></label><br><input class="widefat" type="text" id="pa_release_medium" name="pa_release_medium" value="<?php echo esc_attr( $medium ); ?>"></p>
	<p>
		<label for="pa_release_digitization_status"><strong><?php esc_html_e( 'Archive / Digitization Status', 'print-archival' ); ?></strong></label><br>
		<select class="widefat" id="pa_release_digitization_status" name="pa_release_digitization_status">
			<?php foreach ( print_archival_digitization_status_options() as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $digitization_status, $value ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>
	<?php
}

/**
 * Save artist details.
 */
function print_archival_save_artist_details( $post_id ) {
	if ( ! isset( $_POST['print_archival_artist_details_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['print_archival_artist_details_nonce'] ) ), 'print_archival_save_artist_details' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	update_post_meta( $post_id, '_pa_artist_location', isset( $_POST['pa_artist_location'] ) ? sanitize_text_field( wp_unslash( $_POST['pa_artist_location'] ) ) : '' );
	update_post_meta( $post_id, '_pa_artist_instagram_url', isset( $_POST['pa_artist_instagram_url'] ) ? esc_url_raw( wp_unslash( $_POST['pa_artist_instagram_url'] ) ) : '' );
	update_post_meta( $post_id, '_pa_artist_website_url', isset( $_POST['pa_artist_website_url'] ) ? esc_url_raw( wp_unslash( $_POST['pa_artist_website_url'] ) ) : '' );
	update_post_meta( $post_id, '_pa_artist_cap_participant', ! empty( $_POST['pa_artist_cap_participant'] ) ? '1' : '0' );
	update_post_meta( $post_id, '_pa_artist_notes', isset( $_POST['pa_artist_notes'] ) ? sanitize_textarea_field( wp_unslash( $_POST['pa_artist_notes'] ) ) : '' );
}
add_action( 'save_post_pa_artist', 'print_archival_save_artist_details' );

/**
 * Save release details.
 */
function print_archival_save_release_details( $post_id ) {
	if ( ! isset( $_POST['print_archival_release_details_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['print_archival_release_details_nonce'] ) ), 'print_archival_save_release_details' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$availability_options = print_archival_release_availability_options();
	$digitization_options = print_archival_digitization_status_options();

	$availability = isset( $_POST['pa_release_availability'] ) ? sanitize_key( wp_unslash( $_POST['pa_release_availability'] ) ) : 'archived_only';
	if ( ! isset( $availability_options[ $availability ] ) ) {
		$availability = 'archived_only';
	}

	$digitization_status = isset( $_POST['pa_release_digitization_status'] ) ? sanitize_key( wp_unslash( $_POST['pa_release_digitization_status'] ) ) : '';
	if ( ! isset( $digitization_options[ $digitization_status ] ) ) {
		$digitization_status = '';
	}

	update_post_meta( $post_id, '_pa_release_related_artist', isset( $_POST['pa_release_related_artist'] ) ? absint( $_POST['pa_release_related_artist'] ) : 0 );
	update_post_meta( $post_id, '_pa_release_availability', $availability );
	update_post_meta( $post_id, '_pa_release_product_url', isset( $_POST['pa_release_product_url'] ) ? esc_url_raw( wp_unslash( $_POST['pa_release_product_url'] ) ) : '' );
	update_post_meta( $post_id, '_pa_release_product_id', isset( $_POST['pa_release_product_id'] ) ? absint( $_POST['pa_release_product_id'] ) : 0 );
	update_post_meta( $post_id, '_pa_release_edition_size', isset( $_POST['pa_release_edition_size'] ) ? sanitize_text_field( wp_unslash( $_POST['pa_release_edition_size'] ) ) : '' );
	update_post_meta( $post_id, '_pa_release_medium', isset( $_POST['pa_release_medium'] ) ? sanitize_text_field( wp_unslash( $_POST['pa_release_medium'] ) ) : '' );
	update_post_meta( $post_id, '_pa_release_digitization_status', $digitization_status );
}
add_action( 'save_post_pa_release', 'print_archival_save_release_details' );

/**
 * Resolve a release product URL from manual URL or WooCommerce product ID.
 */
function print_archival_get_release_product_url( $post_id ) {
	$product_url = get_post_meta( $post_id, '_pa_release_product_url', true );

	if ( ! empty( $product_url ) ) {
		return esc_url( $product_url );
	}

	$product_id = absint( get_post_meta( $post_id, '_pa_release_product_id', true ) );

	if ( $product_id && 'product' === get_post_type( $product_id ) ) {
		return esc_url( get_permalink( $product_id ) );
	}

	return '';
}
