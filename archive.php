<?php
/**
 * Archive template fallback.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">
	<section class="content-section">
		<?php if ( have_posts() ) : ?>

			<header class="section-header">
				<div>
					<p class="eyebrow"><?php esc_html_e( 'Archive', 'print-archival' ); ?></p>
					<?php the_archive_title( '<h1>', '</h1>' ); ?>
				</div>
			</header>

			<div class="archive-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content' );
				endwhile;
				?>
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

		<?php else : ?>

			<div class="empty-state">
				<h1><?php esc_html_e( 'Nothing found', 'print-archival' ); ?></h1>
				<p><?php esc_html_e( 'It looks like nothing was found here.', 'print-archival' ); ?></p>
			</div>

		<?php endif; ?>
	</section>
</main>

<?php
get_footer();
