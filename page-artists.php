<?php
/**
 * Template for Artists page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Artists</p>

			<h1>Meet the artists, tattooers, photographers, and visual creators building The Archive.</h1>

			<p class="hero-copy">
				The Archive features contemporary Canadian artwork across tattoo culture, illustration,
				photography, fine art, and independent visual practices.
			</p>

			<div class="hero-actions">
				<a class="button" href="<?php echo esc_url( home_url( '/the-archive/' ) ); ?>">Explore The Archive</a>
				<a class="button button-secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Submit Your Work</a>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Artist Pathways</p>
				<h2>Different creators, one archival print platform.</h2>
			</div>
		</div>

		<div class="artist-category-grid">

			<article class="artist-category-card">
				<h3>Tattoo Artists</h3>
				<p>
					Flash sheets, tattoo artwork, paintings, and studio-based releases produced as archival print editions.
				</p>
				<a href="<?php echo esc_url( home_url( '/tattoo-archival/' ) ); ?>">View tattoo archival</a>
			</article>

			<article class="artist-category-card">
				<h3>Fine Artists & Illustrators</h3>
				<p>
					Archival editions for painters, illustrators, digital artists, and visual creators developing physical releases.
				</p>
				<a href="<?php echo esc_url( home_url( '/fine-art-printing/' ) ); ?>">View fine art printing</a>
			</article>

			<article class="artist-category-card">
				<h3>Photographers</h3>
				<p>
					Fine art photography, wedding collections, portrait work, and client print packages produced with archival materials.
				</p>
				<a href="<?php echo esc_url( home_url( '/fine-art-printing/' ) ); ?>">View photographer options</a>
			</article>

		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Featured Artists</p>
				<h2>Artists currently featured in The Archive.</h2>
			</div>
		</div>

		<div class="artist-grid">
			<?php
			$artist_query = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => 12,
					'category_name'  => 'featured-artist',
				)
			);

			if ( $artist_query->have_posts() ) :
				while ( $artist_query->have_posts() ) :
					$artist_query->the_post();
					?>

					<article class="artist-card">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large' ); ?>
							<?php endif; ?>

							<div class="artist-card__content">
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
					<h3>Featured artist profiles are coming soon.</h3>
					<p>
						As The Canadian Archive Project grows, artist profiles and featured releases will appear here.
					</p>
				</div>

			<?php endif; ?>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Join The Canadian Archive Project</p>
				<h2>We are building a national archive of contemporary Canadian artwork in print.</h2>
			</div>

			<div>
				<p>
					Print Archival works with selected artists to create physical print releases, limited editions,
					artist profiles, and marketplace-ready artwork through The Archive.
				</p>

				<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Submit Your Work</a>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();