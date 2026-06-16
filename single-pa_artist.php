<?php
/**
 * Single template for structured Print Archival artists.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$location        = get_post_meta( get_the_ID(), '_pa_artist_location', true );
$instagram_url   = get_post_meta( get_the_ID(), '_pa_artist_instagram_url', true );
$website_url     = get_post_meta( get_the_ID(), '_pa_artist_website_url', true );
$cap_participant = get_post_meta( get_the_ID(), '_pa_artist_cap_participant', true );
$artist_types    = get_the_term_list( get_the_ID(), 'pa_artist_type', '', ', ' );
?>

<main id="primary" class="site-main">

	<?php while ( have_posts() ) : the_post(); ?>
		<section class="single-hero">
			<div class="single-hero__inner">
				<div class="single-hero__content">
					<p class="eyebrow">Archive Artist</p>
					<h1 class="single-title"><?php the_title(); ?></h1>

					<div class="single-meta">
						<?php if ( $artist_types ) : ?>
							<p><span><?php esc_html_e( 'Artist Type', 'print-archival' ); ?></span><?php echo wp_kses_post( $artist_types ); ?></p>
						<?php endif; ?>

						<?php if ( $location ) : ?>
							<p><span><?php esc_html_e( 'Location', 'print-archival' ); ?></span><?php echo esc_html( $location ); ?></p>
						<?php endif; ?>

						<?php if ( '1' === $cap_participant ) : ?>
							<p><span><?php esc_html_e( 'Archive Project', 'print-archival' ); ?></span><?php esc_html_e( 'Canadian Archive Project participant', 'print-archival' ); ?></p>
						<?php endif; ?>
					</div>
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
						<h2><?php esc_html_e( 'Artist Record', 'print-archival' ); ?></h2>
						<dl>
							<?php if ( $artist_types ) : ?>
								<dt><?php esc_html_e( 'Type', 'print-archival' ); ?></dt>
								<dd><?php echo wp_kses_post( $artist_types ); ?></dd>
							<?php endif; ?>

							<?php if ( $location ) : ?>
								<dt><?php esc_html_e( 'Location', 'print-archival' ); ?></dt>
								<dd><?php echo esc_html( $location ); ?></dd>
							<?php endif; ?>

							<dt><?php esc_html_e( 'Canadian Archive Project', 'print-archival' ); ?></dt>
							<dd><?php echo '1' === $cap_participant ? esc_html__( 'Participating', 'print-archival' ) : esc_html__( 'Not specified', 'print-archival' ); ?></dd>
						</dl>

						<div class="archive-actions">
							<?php if ( $instagram_url ) : ?>
								<a class="text-link" href="<?php echo esc_url( $instagram_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Instagram', 'print-archival' ); ?></a>
							<?php endif; ?>

							<?php if ( $website_url ) : ?>
								<a class="text-link" href="<?php echo esc_url( $website_url ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Website', 'print-archival' ); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</aside>
			</div>
		</section>
	<?php endwhile; ?>

</main>

<?php
get_footer();
