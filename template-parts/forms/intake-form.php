<?php
/**
 * Intake form markup template part.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$submission_types = isset( $args['submission_types'] ) && is_array( $args['submission_types'] )
	? $args['submission_types']
	: array();
?>

<?php if ( isset( $_GET['submission'] ) && 'success' === sanitize_key( wp_unslash( $_GET['submission'] ) ) ) : ?>
	<div class="pa-form-success">
		Thank you. Your submission has been received. Print Archival will review your project and follow up.
	</div>
<?php endif; ?>

<form id="pa-intake-form" class="pa-intake-form" action="" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="pa_intake_action" value="<?php echo esc_attr( 'submit' ); ?>">
	<input type="hidden" name="pa_ajax_submit" value="<?php echo esc_attr( '1' ); ?>">
	<?php wp_nonce_field( 'pa_intake_form_nonce', 'pa_nonce' ); ?>

	<div class="pa-honeypot" aria-hidden="true">
		<label>Website</label>
		<input type="text" name="pa_website_verification" autocomplete="off" value="">
	</div>

	<div class="pa-form-row">
		<label for="pa_name">Full Name *</label>
		<input id="pa_name" type="text" name="pa_name" required>
	</div>

	<div class="pa-form-row">
		<label for="pa_email">Email Address *</label>
		<input id="pa_email" type="email" name="pa_email" required>
	</div>

	<div class="pa-form-row">
		<label for="pa_type">Submission Type *</label>
		<select id="pa_type" name="pa_type" required>
			<option value="">Select a submission type</option>

			<?php foreach ( $submission_types as $type_key => $type_label ) : ?>
				<option value="<?php echo esc_attr( $type_key ); ?>">
					<?php echo esc_html( $type_label ); ?>
				</option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="pa-form-row">
		<label for="pa_message">Project Details / Message *</label>
		<textarea id="pa_message" name="pa_message" rows="6" required></textarea>
	</div>

	<div class="pa-upload-box">
		<label for="pa_file">Upload Artwork</label>
		<p>.TIFF, .TIF, .PSD, .JPEG, .JPG, or .PNG up to 256MB.</p>
		<input id="pa_file" type="file" name="pa_file" accept=".tiff,.tif,.psd,.jpg,.jpeg,.png">
	</div>

	<div id="pa-progress-wrapper" class="pa-progress-wrapper">
		<div class="pa-progress-track">
			<div id="pa-progress-bar" class="pa-progress-bar"></div>
		</div>

		<div id="pa-progress-status" class="pa-progress-status">
			Preparing upload...
		</div>
	</div>

	<button id="pa-submit-btn" class="button pa-submit-button" type="submit">
		Submit Request
	</button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
	const form = document.getElementById('pa-intake-form');

	if (!form) {
		return;
	}

	form.addEventListener('submit', function (event) {
		event.preventDefault();

		const submitBtn = document.getElementById('pa-submit-btn');
		const progressWrapper = document.getElementById('pa-progress-wrapper');
		const progressBar = document.getElementById('pa-progress-bar');
		const progressStatus = document.getElementById('pa-progress-status');

		submitBtn.disabled = true;
		submitBtn.innerText = 'Uploading...';
		progressWrapper.style.display = 'block';
		progressBar.style.width = '0%';
		progressStatus.innerText = 'Preparing upload...';

		const formData = new FormData(form);
		const xhr = new XMLHttpRequest();

		xhr.open('POST', window.location.href, true);

		xhr.upload.addEventListener('progress', function (event) {
			if (event.lengthComputable) {
				const percentComplete = Math.round((event.loaded / event.total) * 100);
				const visualPercent = Math.min(Math.round(percentComplete * 0.95), 95);

				progressBar.style.width = visualPercent + '%';
				progressStatus.innerText = 'Uploading artwork to Print Archival: ' + visualPercent + '%';
			}
		});

		xhr.onload = function () {
			if (xhr.status === 200) {
				try {
					const response = JSON.parse(xhr.responseText);

					if (response.success && response.data.redirect) {
						progressBar.style.width = '100%';
						progressStatus.innerText = 'Transfer complete. Redirecting...';
						window.location.href = response.data.redirect;
					} else {
						alert(response.data || 'Submission failed.');
						resetForm();
					}
				} catch (error) {
					alert('Unexpected server response. Please contact Print Archival directly.');
					resetForm();
				}
			} else {
				alert('Upload failed. Server status: ' + xhr.status);
				resetForm();
			}
		};

		xhr.onerror = function () {
			alert('Network error. Please try again.');
			resetForm();
		};

		xhr.send(formData);

		function resetForm() {
			submitBtn.disabled = false;
			submitBtn.innerText = 'Submit Request';
			progressWrapper.style.display = 'none';
			progressBar.style.width = '0%';
			progressStatus.innerText = 'Preparing upload...';
		}
	});
});
</script>