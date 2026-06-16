<?php
/**
 * Template for About page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">About Print Archival</p>

			<h1>Archival printing for artists, photographers, tattooers, and contemporary Canadian artwork.</h1>

			<p class="hero-copy">
				Print Archival is an Edmonton-based archival print studio building a platform for physical artwork,
				artist editions, and Canadian visual culture in print.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Our Role</p>
				<h2>Print production, artist support, and archive-building under one roof.</h2>
			</div>

			<div>
				<p>
					Print Archival produces high-quality archival prints for artists, photographers, galleries,
					private clients, tattoo artists, and creative studios. Our work is built around physical
					artwork, professional materials, and the belief that images deserve to exist beyond screens.
				</p>

				<p>
					Through The Archive, we also support selected artists in turning their work into limited
					print releases, featured editions, and marketplace-ready collections.
				</p>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">How the Platform Works</p>
				<h2>Three connected paths for different creative needs.</h2>
			</div>
		</div>

		<div class="about-grid">

			<article class="about-card">
				<h3>Print Archival</h3>
				<p>
					The production studio. We handle archival printing, material selection, file preparation,
					edition support, and custom print projects.
				</p>
				<a href="<?php echo esc_url( home_url( '/fine-art-printing/' ) ); ?>">View fine art printing</a>
			</article>

			<article class="about-card">
				<h3>The Archive</h3>
				<p>
					The curated public-facing platform for featured releases, artist profiles, limited editions,
					and contemporary Canadian artwork in print.
				</p>
				<a href="<?php echo esc_url( home_url( '/the-archive/' ) ); ?>">Explore The Archive</a>
			</article>

			<article class="about-card">
				<h3>Tattoo Archival</h3>
				<p>
					The tattoo-specific side of the business, built for flash sheets, tattoo artwork, studio
					packages, limited drops, and convention inventory.
				</p>
				<a href="<?php echo esc_url( home_url( '/tattoo-archival/' ) ); ?>">View tattoo archival</a>
			</article>

		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">The Canadian Archive Project</p>
				<h2>A growing national print archive for contemporary Canadian creators.</h2>
			</div>

			<div>
				<p>
					The Canadian Archive Project is our ongoing initiative to identify, support, and publish
					print releases from artists across Canada. It includes tattooers, illustrators, painters,
					photographers, designers, and independent visual creators.
				</p>

				<p>
					The goal is to make high-quality physical editions more accessible to artists while building
					a curated record of Canadian artwork in print.
				</p>

				<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Join The Project</a>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">What We Value</p>
				<h2>Material quality, artist ownership, and physical longevity.</h2>
			</div>
		</div>

		<div class="values-grid">

			<article class="value-card">
				<h3>Archival Quality</h3>
				<p>
					We use professional print materials and pigment-based production workflows intended for
					long-term display, collection, and resale.
				</p>
			</article>

			<article class="value-card">
				<h3>Artist-First Releases</h3>
				<p>
					We help artists create print products that make sense for their audience, pricing, edition
					size, and long-term brand.
				</p>
			</article>

			<article class="value-card">
				<h3>Canadian Creative Culture</h3>
				<p>
					The Archive is built to showcase work from Canadian artists, including creators outside
					traditional gallery systems.
				</p>
			</article>

		</div>
	</section>

</main>

<?php
get_footer();