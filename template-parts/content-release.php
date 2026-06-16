<?php
/**
 * Featured release card template part.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$is_pa_release        = 'pa_release' === get_post_type();
$availability_options = function_exists( 'print_archival_release_availability_options' ) ? print_archival_release_availability_options() : array();
$availability         = get_post_meta( get_the_ID(), '_pa_release_availability', true );
$availability_label   = isset( $availability_options[ $availability ] ) ? $availability_options[ $availability ] : '';
$medium               = get_post_meta( get_the_ID(), '_pa_release_medium', true );
?>

<article class="artwork-card">
	<a href="<?php the_permalink(); ?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>

		<div class="artwork-card__content">
			<p class="eyebrow"><?php echo esc_html( $is_pa_release ? __( 'Archive Release', 'print-archival' ) : __( 'Featured Release', 'print-archival' ) ); ?></p>
			<h3><?php the_title(); ?></h3>

			<?php if ( $availability_label || $medium ) : ?>
				<p class="archive-card-meta">
					<?php
					$meta_parts = array_filter(
						array(
							$availability_label,
							$medium,
						)
					);
					echo esc_html( implode( ' / ', $meta_parts ) );
					?>
				</p>
			<?php endif; ?>

			<?php if ( has_excerpt() ) : ?>
				<p><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</a>
</article>
