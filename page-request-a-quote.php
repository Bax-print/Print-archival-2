<?php
/**
 * Template for Fine Art Printing Request a Quote page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Fine Art Printing / Request a Quote</p>

			<h1>Tell us what you want to print and receive a project-specific production review.</h1>

			<p class="hero-copy">
				Submit the artwork or photograph with the intended size, quantity, material, and deadline so Print Archival can review the project and prepare the right next step.
			</p>

			<div class="hero-actions">
				<a class="button" href="<?php echo esc_url( home_url( '/submit-your-work/' ) ); ?>">Request a Quote</a>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">What to Include</p>
				<h2>A few clear project details make the first review more useful.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Your File</h3>
				<p>Upload the strongest available artwork or photography file. An original TIFF, PSD, JPEG, JPG, or PNG is preferred.</p>
			</article>

			<article>
				<h3>Print Details</h3>
				<p>Provide the intended dimensions, quantity, material preference, and whether the project is a proof, edition, exhibition, client order, or private display.</p>
			</article>

			<article>
				<h3>Timing and Context</h3>
				<p>Include deadlines, colour concerns, framing plans, release dates, or other details that may affect production recommendations.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Fine Art Printing Services</p>
				<h2>Quote requests are reviewed according to the needs of the project.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Artists and edition releases</li>
					<li>Wedding, portrait, editorial, and fine art photographers</li>
					<li>Galleries, studios, exhibitions, and artist proofs</li>
					<li>Weddings, family collections, and private display projects</li>
					<li>Material, sizing, and presentation guidance</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Ready for Review</p>
				<h2>Send the project details through the Print Archival intake portal.</h2>
			</div>

			<div>
				<p>The intake page securely collects your file and project information so the request can be reviewed before production recommendations are provided.</p>

				<div class="hero-actions">
					<a class="button" href="<?php echo esc_url( home_url( '/submit-your-work/' ) ); ?>">Request a Quote</a>
					<a class="button button-secondary" href="<?php echo esc_url( home_url( '/fine-art-printing/' ) ); ?>">Back to Fine Art Printing</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
