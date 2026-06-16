<?php
/**
 * Generic content template part.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'archive-card' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<a class="archive-card-image" href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'large' ); ?>
		</a>
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
	</header>

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div>

</article>
