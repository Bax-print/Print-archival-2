<?php
/**
 * Front page template for Print Archival.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="home-hero home-hero--with-image">
		<div class="home-hero__inner home-hero__grid">

			<div class="home-hero__content">
				<p class="eyebrow">Print Archival / The Canadian Archive Project</p>

				<h1>Contemporary Canadian artwork, preserved through archival print.</h1>

				<p class="hero-copy">
					Print Archival produces museum-quality archival prints for artists, photographers, galleries,
					private clients, and tattoo artists building physical print releases.
				</p>

				<div class="hero-actions">
					<a class="button" href="<?php echo esc_url( home_url( '/the-archive/' ) ); ?>">Explore The Archive</a>
					<a class="button button-secondary" href="<?php echo esc_url( home_url( '/fine-art-printing/' ) ); ?>">Fine Art Printing</a>
					<a class="button button-secondary" href="<?php echo esc_url( home_url( '/tattoo-archival/' ) ); ?>">Tattoo Archival</a>
				</div>
			</div>

			<div class="home-hero__image">
				<img 
					src="<?php echo print_archival_image_url( 'home-hero.jpg' ); ?>" 
					alt="Archival print production at Print Archival"
				>
			</div>

		</div>
	</section>

	<section class="pathways">
		<div class="section-header">
			<p class="eyebrow">Choose your path</p>
			<h2>Archival print services for distinct creative needs.</h2>
		</div>

		<div class="pathway-grid pathway-grid--images">

			<article class="pathway-card pathway-card--image">
				<img 
					src="<?php echo print_archival_image_url( 'the-archive.jpeg' ); ?>" 
					alt="Curated archival artwork release from Print Archival"
				>

				<h3>The Archive</h3>
				<p>
					Browse featured releases, limited editions, and artists participating in The Canadian Archive Project.
				</p>
				<a href="<?php echo esc_url( home_url( '/the-archive/' ) ); ?>">Explore releases</a>
			</article>

			<article class="pathway-card pathway-card--image">
				<img 
					src="<?php echo print_archival_image_url( 'fine-art-printing.jpg' ); ?>" 
					alt="Fine art print production and archival paper sample"
				>

				<h3>Fine Art Printing</h3>
				<p>
					Archival printing for artists, photographers, galleries, weddings, private collections, and professional projects.
				</p>
				<a href="<?php echo esc_url( home_url( '/fine-art-printing/' ) ); ?>">Request a quote</a>
			</article>

			<article class="pathway-card pathway-card--image">
				<img 
					src="<?php echo print_archival_image_url( 'tattoo-archival.jpeg' ); ?>" 
					alt="Tattoo artwork and flash sheet printed through Tattoo Archival"
				>

				<h3>Tattoo Archival</h3>
				<p>
					Print packages, flash sheets, limited releases, studio sample kits, and convention inventory for tattoo artists.
				</p>
				<a href="<?php echo esc_url( home_url( '/tattoo-archival/' ) ); ?>">View tattoo packages</a>
			</article>

		</div>
	</section>

	<section class="featured-section">
		<div class="section-header">
			<p class="eyebrow">Now in print</p>
			<h2>Featured Releases</h2>
			<a href="<?php echo esc_url( home_url( '/the-archive/' ) ); ?>">View all</a>
		</div>

		<div class="archive-grid">
			<?php
			$featured = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => 3,
					'category_name'  => 'featured-release',
				)
			);

			if ( $featured->have_posts() ) :
				while ( $featured->have_posts() ) :
					$featured->the_post();
					?>

					<article class="artwork-card">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large' ); ?>
							<?php endif; ?>

							<div class="artwork-card__content">
								<h3><?php the_title(); ?></h3>
								<p><?php echo esc_html( get_the_excerpt() ); ?></p>
							</div>
						</a>
					</article>

					<?php
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<div class="empty-state">
					<h3>No featured releases have been published yet.</h3>
					<p>Featured releases will appear here as The Archive begins publishing work.</p>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="materials-preview">
		<div class="section-header">
			<p class="eyebrow">Materials and process</p>
			<h2>Built around archival papers, pigment ink, and edition-ready production.</h2>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Gloss</h3>
				<p>High-impact finish for saturated artwork, tattoo flash, and photographic work.</p>
			</article>

			<article>
				<h3>Matte</h3>
				<p>Fine art paper with a softer surface and elevated gallery-style presentation.</p>
			</article>

			<article>
				<h3>Canvas</h3>
				<p>Textured archival canvas for larger works, statement pieces, and premium editions.</p>
			</article>
		</div>

		<a class="text-link" href="<?php echo esc_url( home_url( '/materials/' ) ); ?>">Explore materials</a>
	</section>

</main>

<?php
get_footer();