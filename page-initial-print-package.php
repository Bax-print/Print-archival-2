<?php
/**
 * Template for Tattoo Archival Initial Print Package page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero page-hero--tattoo">
		<div class="page-hero__inner">
			<p class="eyebrow">Tattoo Archival / Initial Print Package</p>

			<h1>Test your first tattoo artwork release with a focused run of 10 archival prints.</h1>

			<p class="hero-copy">
				A straightforward onboarding package for tattoo artists who want to review a physical proof, learn the production process, and test a first sellable print run.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Package Overview</p>
				<h2>A manageable first run with room to review before going larger.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>10 Prints</h3>
				<p>Begin with ten archival prints of one selected tattoo artwork, flash design, painting, or illustration.</p>
			</article>

			<article>
				<h3>Common Sizes</h3>
				<p>Choose a practical release size based on the artwork proportions, studio display needs, shipping, and intended price point.</p>
			</article>

			<article>
				<h3>Artist Review</h3>
				<p>Review an artist proof or production sample for colour, crop, scale, and surface before confirming the first run.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">First-Run Testing</p>
				<h2>Use the initial package to learn what works for your art and audience.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Test one artwork as a physical print release</li>
					<li>Review colour, detail, material, and final size</li>
					<li>Photograph and display the finished print in studio</li>
					<li>Offer a small quantity to clients and collectors</li>
					<li>Use the response to plan restocks or a larger edition</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Start Your First Run</p>
				<h2>Send one strong artwork file and the size you are considering.</h2>
			</div>

			<div>
				<p>Include your preferred quantity, display or sales plan, deadline, and any colour or crop details that matter to the piece.</p>

				<div class="hero-actions">
					<a class="button" href="<?php echo esc_url( home_url( '/submit-your-work/' ) ); ?>">Start a Project</a>
					<a class="button button-secondary" href="<?php echo esc_url( home_url( '/tattoo-archival/' ) ); ?>">Back to Tattoo Archival</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
