<?php
/**
 * Template for Fine Art Printing for Photographers page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Fine Art Printing / For Photographers</p>

			<h1>Archival photographic printing for client work, personal projects, and fine art editions.</h1>

			<p class="hero-copy">
				Professional print support for wedding, portrait, family, editorial, and fine art photography, from individual display prints to curated client collections.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Photography Services</p>
				<h2>Print options shaped around the image, client, and final presentation.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Wedding and Portrait</h3>
				<p>Create premium display prints, family sets, and client add-ons with consistent colour and professional presentation.</p>
			</article>

			<article>
				<h3>Editorial and Family</h3>
				<p>Produce polished prints for editorial projects, personal archives, household displays, and meaningful keepsakes.</p>
			</article>

			<article>
				<h3>Fine Art Photography</h3>
				<p>Prepare exhibition prints, artist proofs, portfolio work, and limited photographic editions.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Production Support</p>
				<h2>Keep photographic work consistent across sizes, sets, and repeat orders.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Material selection for colour, contrast, and viewing conditions</li>
					<li>Single images, coordinated sets, and client packages</li>
					<li>Print sizing and crop review</li>
					<li>Exhibition, portfolio, and edition production</li>
					<li>Repeatable specifications for future orders</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Start a Photography Project</p>
				<h2>Share the final image, intended size, quantity, and presentation goal.</h2>
			</div>

			<div>
				<p>Include whether the prints are for a client, exhibition, edition, portfolio, or private display, along with any deadline or colour-critical notes.</p>

				<div class="hero-actions">
					<a class="button" href="<?php echo esc_url( home_url( '/submit-your-work/' ) ); ?>">Submit Your Work</a>
					<a class="button button-secondary" href="<?php echo esc_url( home_url( '/fine-art-printing/' ) ); ?>">Back to Fine Art Printing</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
