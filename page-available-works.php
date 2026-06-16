<?php
/**
 * Template for The Archive Available Works page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero page-hero--archive">
		<div class="page-hero__inner">
			<p class="eyebrow">The Archive / Available Works</p>

			<h1>Discover current releases and editioned prints available through The Archive.</h1>

			<p class="hero-copy">
				A curated view of available works, artist releases, and limited print editions currently represented within Print Archival's public archive.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Current Releases</p>
				<h2>Available works and recent edition highlights.</h2>
			</div>

			<a class="text-link" href="<?php echo esc_url( home_url( '/category/featured-release/' ) ); ?>">View all featured releases</a>
		</div>

		<div class="archive-grid">
			<?php
			$available_works_query = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => 12,
					'category_name'  => 'featured-release',
				)
			);

			if ( $available_works_query->have_posts() ) :
				while ( $available_works_query->have_posts() ) :
					$available_works_query->the_post();
					?>

					<article class="artwork-card">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large' ); ?>
							<?php endif; ?>

							<div class="artwork-card__content">
								<p class="eyebrow">Available Work</p>
								<h3><?php the_title(); ?></h3>
								<?php if ( has_excerpt() ) : ?>
									<p><?php echo esc_html( get_the_excerpt() ); ?></p>
								<?php endif; ?>
							</div>
						</a>
					</article>

					<?php
				endwhile;
				wp_reset_postdata();
			else :
				?>

				<div class="empty-state">
					<h3>No available works are listed right now.</h3>
					<p>Current releases and newly available editioned prints will appear here as The Archive is updated.</p>
				</div>

			<?php endif; ?>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">The Archive</p>
				<h2>Available Works is a curated release view, not a general print catalogue.</h2>
			</div>

			<div>
				<p>Works appear through artist participation, documented releases, and selected edition projects. Release pages provide the artist and edition context available for each work.</p>

				<div class="hero-actions">
					<a class="button" href="<?php echo esc_url( home_url( '/category/featured-release/' ) ); ?>">Explore Current Releases</a>
					<a class="button button-secondary" href="<?php echo esc_url( home_url( '/the-archive/' ) ); ?>">Back to The Archive</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
