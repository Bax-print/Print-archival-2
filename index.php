<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main template file.
 *
 * This is the fallback template for the Print Archival theme.
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php if ( have_posts() ) : ?>

		<?php if ( is_home() && ! is_front_page() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</header>
		<?php endif; ?>

		<div class="content-loop">

			<?php
			while ( have_posts() ) :
				the_post();
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-card' ); ?>>

					<?php if ( has_post_thumbnail() ) : ?>
						<a class="archive-card-image" href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail( 'large' ); ?>
						</a>
					<?php endif; ?>

					<header class="entry-header">
						<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
						endif;
						?>
					</header>

					<div class="entry-content">
						<?php
						if ( is_singular() ) {
							the_content();
						} else {
							the_excerpt();
						}
						?>
					</div>

				</article>

			<?php endwhile; ?>

		</div>

		<nav class="pagination">
			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 2,
					'prev_text' => __( 'Previous', 'print-archival' ),
					'next_text' => __( 'Next', 'print-archival' ),
				)
			);
			?>
		</nav>

	<?php else : ?>

		<section class="no-results not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Nothing found', 'print-archival' ); ?></h1>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found here.', 'print-archival' ); ?></p>
			</div>
		</section>

	<?php endif; ?>

</main>

<?php
get_footer();

//** the get_sidebar funciton has been removed, if you want to add it between line 90 and 91**/

