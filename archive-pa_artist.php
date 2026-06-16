<?php
/**
 * Archive template for structured Print Archival artists.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Artists</p>
			<h1>Artist records for The Archive.</h1>
			<p class="hero-copy">Structured profiles for tattoo artists, photographers, painters, illustrators, and visual artists connected to Print Archival and The Canadian Archive Project.</p>
		</div>
	</section>

	<section class="content-section">
		<?php if ( have_posts() ) : ?>
			<div class="artist-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'artist' );
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
				<h3>No artist records have been published yet.</h3>
				<p>Artists added in WordPress admin will appear here as The Archive grows.</p>
			</div>
		<?php endif; ?>
	</section>

</main>

<?php
get_footer();
