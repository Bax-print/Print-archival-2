<?php
/**
 * Submit Your Work page template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Submit Your Work</p>

			<h1>Send artwork, project files, or print inquiries directly to Print Archival.</h1>

			<p class="hero-copy">
				Use this intake portal for Archive submissions, Tattoo Archival projects, fine art print quotes,
				photography work, and private client print requests.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="intake-layout">

			<div class="intake-copy">
				<p class="eyebrow">Submission Portal</p>
				<h2>Choose the path that matches your project.</h2>

				<p>
					Files submitted here are routed into the appropriate Print Archival intake folder so we can review
					your work, prepare quote details, and follow up with the right next step.
				</p>

				<div class="intake-notes">
					<h3>Before uploading</h3>
					<ul>
						<li>Use TIFF, PSD, JPEG, JPG, or PNG files.</li>
						<li>Keep uploads under 256MB.</li>
						<li>Include size, material, edition, deadline, or project context in your message.</li>
						<li>For multiple large files, submit one first and note that more files are available.</li>
					</ul>
				</div>
			</div>

			<div class="intake-form-shell">
				<?php
				if ( function_exists( 'print_archival_render_intake_form' ) ) {
					echo print_archival_render_intake_form();
				}
				?>
			</div>

		</div>
	</section>

</main>

<?php
get_footer();