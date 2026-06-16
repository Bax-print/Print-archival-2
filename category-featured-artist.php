<?php
/**
 * Category archive template for Featured Artists.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Featured Artists</p>

			<h1>Artists, tattooers, photographers, and visual creators featured in The Archive.</h1>

			<p class="hero-copy">
				Artist profiles and creative contributors participating in The Canadian Archive Project.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="artist-grid">

			<?php if ( have_posts() ) : ?>

				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<article class="artist-card">
						<a href="<?php the_permalink(); ?>">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'large' ); ?>
							<?php endif; ?>

							<div class="artist-card__content">
								<p class="eyebrow">Featured Artist</p>
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
					<h3>No featured artists have been published yet.</h3>
					<p>Featured artist profiles will appear here as The Archive grows.</p>
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