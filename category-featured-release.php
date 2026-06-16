<?php
/**
 * Category archive template for Featured Releases.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero page-hero--archive">
		<div class="page-hero__inner">
			<p class="eyebrow">Featured Releases</p>

			<h1>Current and past archival print releases.</h1>

			<p class="hero-copy">
				A growing collection of limited print editions, artist releases, and archive highlights produced through Print Archival.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="archive-grid">

			<?php if ( have_posts() ) : ?>

				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<article class="artwork-card">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large' ); ?>
							<?php endif; ?>

							<div class="artwork-card__content">
								<p class="eyebrow">Featured Release</p>
								<h3><?php the_title(); ?></h3>

								<?php if ( has_excerpt() ) : ?>
									<p><?php echo esc_html( get_the_excerpt() ); ?></p>
								<?php endif; ?>
							</div>
						</a>
					</article>

				<?php endwhile; ?>

			<?php else : ?>

				<div class="empty-state">
					<h3>No featured releases have been published yet.</h3>
					<p>Featured releases will appear here as The Archive grows.</p>
				</div>

			<?php endif; ?>

		</div>

		<div class="archive-pagination">
			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 2,
					'prev_text' => __( 'Previous', 'print-archival' ),
					'next_text' => __( 'Next', 'print-archival' ),
				)
			);
			?>
		</div>
	</section>

</main>

<?php
get_footer();