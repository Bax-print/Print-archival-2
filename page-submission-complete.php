<?php
/**
 * Submission Complete page template.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Submission Complete</p>

			<h1>Your submission has been received.</h1>

			<p class="hero-copy">
				Thank you for sending your work to Print Archival. Your file has been transferred into our intake storage,
				and our team will review the details before following up.
			</p>

			<div class="hero-actions">
				<a class="button" href="<?php echo esc_url( home_url( '/the-archive/' ) ); ?>">Explore The Archive</a>
				<a class="button button-secondary" href="<?php echo esc_url( home_url( '/submit-your-work/' ) ); ?>">Submit Another Project</a>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="three-column-grid">

			<article>
				<h3>What happens next</h3>
				<p>
					We’ll review your message, file, project type, and any relevant print or archive details.
				</p>
			</article>

			<article>
				<h3>File review</h3>
				<p>
					If your file needs adjustment for size, resolution, colour, or print preparation, we’ll follow up before production.
				</p>
			</article>

			<article>
				<h3>Response time</h3>
				<p>
					For urgent print deadlines, you can also contact us directly at hello@printarchival.ca.
				</p>
			</article>

		</div>
	</section>

</main>

<?php
get_footer();