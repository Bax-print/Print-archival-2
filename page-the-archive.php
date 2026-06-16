<?php
/**
 * Template for The Archive page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero page-hero--archive page-hero--split">
	<div class="page-hero__inner page-hero__grid">
		<div>
			<p class="eyebrow">The Archive</p>

			<h1>A curated archive of contemporary Canadian artwork in print.</h1>

			<p class="hero-copy">
				The Archive brings together limited print editions, featured releases, and artist profiles from across Canada.
			</p>

			<div class="hero-actions">
				<a class="button" href="<?php echo esc_url( home_url( '/artists/' ) ); ?>">View Artists</a>
				<a class="button button-secondary" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Submit Your Work</a>
			</div>
		</div>

		<div class="page-hero__image">
			<img 
				src="<?php echo print_archival_image_url( 'the-archive.jpeg' ); ?>" 
				alt="Curated archival artwork release from Print Archival"
			>
		</div>
	</div>
</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Featured Releases</p>
				<h2>Current editions and archive highlights.</h2>
			</div>
		</div>

		<div class="archive-grid">
			<?php
			$archive_query = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => 9,
					'category_name'  => 'featured-release',
				)
			);

			if ( $archive_query->have_posts() ) :
				while ( $archive_query->have_posts() ) :
					$archive_query->the_post();
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
					<p>
						Featured artist releases will appear here as The Canadian Archive Project begins publishing work.
					</p>
				</div>

			<?php endif; ?>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">The Canadian Archive Project</p>
				<h2>Building a national print archive for artists, tattooers, photographers, and visual creators.</h2>
			</div>

			<div>
				<p>
					The Canadian Archive Project is Print Archival’s ongoing initiative to document and distribute contemporary Canadian artwork through archival print editions.
				</p>

				<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Join The Archive</a>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();