<?php
/**
 * Template for The Archive New Editions page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero page-hero--archive">
		<div class="page-hero__inner">
			<p class="eyebrow">The Archive / New Editions</p>

			<h1>Current releases, upcoming edition drops, and newly published archival prints.</h1>

			<p class="hero-copy">
				Follow the newest limited releases entering The Archive, from first announcements and artist proofs to current editioned prints.
			</p>

			<div class="hero-actions">
				<a class="button" href="<?php echo esc_url( home_url( '/category/featured-release/' ) ); ?>">View Current Releases</a>
				<a class="button button-secondary" href="<?php echo esc_url( home_url( '/the-archive/' ) ); ?>">Back to The Archive</a>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">New and Upcoming</p>
				<h2>Recent edition activity from The Archive.</h2>
			</div>
		</div>

		<div class="archive-grid">
			<?php
			$new_editions_query = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => 6,
					'category_name'  => 'featured-release',
				)
			);

			if ( $new_editions_query->have_posts() ) :
				while ( $new_editions_query->have_posts() ) :
					$new_editions_query->the_post();
					?>

					<article class="artwork-card">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large' ); ?>
							<?php endif; ?>

							<div class="artwork-card__content">
								<p class="eyebrow">Current Release</p>
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
					<h3>No new editions are live right now.</h3>
					<p>Upcoming edition drops and newly available works will appear here as releases are announced.</p>
				</div>

			<?php endif; ?>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Edition Releases</p>
				<h2>Each release connects an artist, a documented work, and a physical archival edition.</h2>
			</div>

			<div>
				<p>Release details may include edition size, material, dimensions, artist information, and availability. The complete release listing remains available through the Featured Releases archive.</p>

				<a class="button" href="<?php echo esc_url( home_url( '/category/featured-release/' ) ); ?>">Browse Featured Releases</a>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
