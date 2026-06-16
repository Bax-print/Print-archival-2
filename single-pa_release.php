<?php
/**
 * Single template for structured Print Archival releases and archive works.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$availability_options = function_exists( 'print_archival_release_availability_options' ) ? print_archival_release_availability_options() : array();
$digitization_options = function_exists( 'print_archival_digitization_status_options' ) ? print_archival_digitization_status_options() : array();
$availability         = get_post_meta( get_the_ID(), '_pa_release_availability', true );
$availability_label   = isset( $availability_options[ $availability ] ) ? $availability_options[ $availability ] : '';
$related_artist_id    = absint( get_post_meta( get_the_ID(), '_pa_release_related_artist', true ) );
$edition_size         = get_post_meta( get_the_ID(), '_pa_release_edition_size', true );
$medium               = get_post_meta( get_the_ID(), '_pa_release_medium', true );
$digitization_status  = get_post_meta( get_the_ID(), '_pa_release_digitization_status', true );
$digitization_label   = isset( $digitization_options[ $digitization_status ] ) ? $digitization_options[ $digitization_status ] : '';
$product_url          = function_exists( 'print_archival_get_release_product_url' ) ? print_archival_get_release_product_url( get_the_ID() ) : '';
$release_types        = get_the_term_list( get_the_ID(), 'pa_release_type', '', ', ' );
$archive_statuses     = get_the_term_list( get_the_ID(), 'pa_archive_status', '', ', ' );
?>

<main id="primary" class="site-main">

	<?php while ( have_posts() ) : the_post(); ?>
		<section class="single-hero">
			<div class="single-hero__inner">
				<div class="single-hero__content">
					<p class="eyebrow">Archive Release</p>
					<h1 class="single-title"><?php the_title(); ?></h1>

					<div class="single-meta">
						<?php if ( $availability_label ) : ?>
							<p><span><?php esc_html_e( 'Availability', 'print-archival' ); ?></span><?php echo esc_html( $availability_label ); ?></p>
						<?php endif; ?>

						<?php if ( $related_artist_id ) : ?>
							<p><span><?php esc_html_e( 'Artist', 'print-archival' ); ?></span><a href="<?php echo esc_url( get_permalink( $related_artist_id ) ); ?>"><?php echo esc_html( get_the_title( $related_artist_id ) ); ?></a></p>
						<?php endif; ?>

						<?php if ( $medium ) : ?>
							<p><span><?php esc_html_e( 'Medium', 'print-archival' ); ?></span><?php echo esc_html( $medium ); ?></p>
						<?php endif; ?>
					</div>

					<?php if ( $product_url && 'available' === $availability ) : ?>
						<div class="hero-actions">
							<a class="button" href="<?php echo esc_url( $product_url ); ?>"><?php esc_html_e( 'View Available Work', 'print-archival' ); ?></a>
						</div>
					<?php endif; ?>
				</div>

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="single-hero__image">
						<?php the_post_thumbnail( 'large' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</section>

		<section class="content-section single-body">
			<div class="single-body__inner">
				<div class="single-body__main">
					<?php the_content(); ?>
				</div>

				<aside class="single-body__aside">
					<div class="archive-record">
						<h2><?php esc_html_e( 'Archive Record', 'print-archival' ); ?></h2>
						<dl>
							<?php if ( $availability_label ) : ?>
								<dt><?php esc_html_e( 'Availability', 'print-archival' ); ?></dt>
								<dd><?php echo esc_html( $availability_label ); ?></dd>
							<?php endif; ?>

							<?php if ( $release_types ) : ?>
								<dt><?php esc_html_e( 'Release Type', 'print-archival' ); ?></dt>
								<dd><?php echo wp_kses_post( $release_types ); ?></dd>
							<?php endif; ?>

							<?php if ( $archive_statuses ) : ?>
								<dt><?php esc_html_e( 'Archive Status', 'print-archival' ); ?></dt>
								<dd><?php echo wp_kses_post( $archive_statuses ); ?></dd>
							<?php endif; ?>

							<?php if ( $related_artist_id ) : ?>
								<dt><?php esc_html_e( 'Related Artist', 'print-archival' ); ?></dt>
								<dd><a href="<?php echo esc_url( get_permalink( $related_artist_id ) ); ?>"><?php echo esc_html( get_the_title( $related_artist_id ) ); ?></a></dd>
							<?php endif; ?>

							<?php if ( $edition_size ) : ?>
								<dt><?php esc_html_e( 'Edition Size', 'print-archival' ); ?></dt>
								<dd><?php echo esc_html( $edition_size ); ?></dd>
							<?php endif; ?>

							<?php if ( $medium ) : ?>
								<dt><?php esc_html_e( 'Medium / Material', 'print-archival' ); ?></dt>
								<dd><?php echo esc_html( $medium ); ?></dd>
							<?php endif; ?>

							<?php if ( $digitization_label ) : ?>
								<dt><?php esc_html_e( 'Digitization', 'print-archival' ); ?></dt>
								<dd><?php echo esc_html( $digitization_label ); ?></dd>
							<?php endif; ?>
						</dl>

						<?php if ( $product_url ) : ?>
							<div class="archive-actions">
								<a class="button" href="<?php echo esc_url( $product_url ); ?>"><?php esc_html_e( 'View Product', 'print-archival' ); ?></a>
							</div>
						<?php endif; ?>
					</div>
				</aside>
			</div>
		</section>
	<?php endwhile; ?>

</main>

<?php
get_footer();
