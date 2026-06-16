<?php
/**
 * Featured artist card template part.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
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
