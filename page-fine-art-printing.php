<?php
/**
 * Template for Fine Art Printing page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero page-hero--split">
		<div class="page-hero__inner page-hero__grid">
			<div>
				<p class="eyebrow">Fine Art Printing</p>

				<h1>Archival printing for artists, photographers, galleries, and private collections.</h1>

				<p class="hero-copy">
					Professional pigment printing for artwork, photography, wedding collections, gallery projects, and edition-ready releases.
				</p>
			</div>

			<div class="page-hero__image">
				<img 
					src="<?php echo print_archival_image_url( 'fine-art-printing.jpg' ); ?>" 
					alt="Fine art print and archival paper sample"
				>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Services</p>
				<h2>Print services for non-tattoo artwork and professional projects.</h2>
			</div>
		</div>

		<div class="pathway-grid">

			<article class="pathway-card">
				<h3>For Artists</h3>
				<p>
					Archival editions, small releases, portfolio prints, gallery-ready production, and physical artwork reproduction.
				</p>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Start an artist inquiry</a>
			</article>

			<article class="pathway-card">
				<h3>For Photographers</h3>
				<p>
					Fine art photography, wedding print packages, family collections, portrait work, and client print add-ons.
				</p>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Start a photographer inquiry</a>
			</article>

			<article class="pathway-card">
				<h3>For Galleries & Private Clients</h3>
				<p>
					Professional print support for exhibitions, private collections, documentation, display, and custom projects.
				</p>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Request a quote</a>
			</article>

		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Production Approach</p>
				<h2>A cleaner, more intentional path from digital file to physical artwork.</h2>
			</div>

			<div>
				<p>
					We help with file review, material selection, sizing recommendations, edition planning, and production decisions so the final print fits the work and its intended use.
				</p>

				<p>
					This side of Print Archival is built for artists, photographers, galleries, weddings, private clients, and professional creative projects that need a polished archival presentation.
				</p>

				<a class="button" href="<?php echo esc_url( home_url( '/materials/' ) ); ?>">Explore Materials</a>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();