<?php
/**
 * Featured artist card template part.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$artist_types = get_the_term_list( get_the_ID(), 'pa_artist_type', '', ', ' );
$location     = get_post_meta( get_the_ID(), '_pa_artist_location', true );
$is_pa_artist = 'pa_artist' === get_post_type();
?>

<article class="artist-card">
	<a href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>

		<div class="artist-card__content">
			<p class="eyebrow"><?php echo esc_html( $is_pa_artist ? __( 'Archive Artist', 'print-archival' ) : __( 'Featured Artist', 'print-archival' ) ); ?></p>
			<h3><?php the_title(); ?></h3>

			<?php if ( $artist_types ) : ?>
				<p class="archive-card-meta"><?php echo wp_kses_post( $artist_types ); ?></p>
			<?php elseif ( ! empty( $location ) ) : ?>
				<p class="archive-card-meta"><?php echo esc_html( $location ); ?></p>
			<?php endif; ?>

			<?php if ( has_excerpt() ) : ?>
				<p><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</a>
</article>
