<?php
/**
 * Archive template for structured Print Archival releases and archive works.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero page-hero--archive">
		<div class="page-hero__inner">
			<p class="eyebrow">Releases</p>
			<h1>Archive works, editioned prints, and documented releases.</h1>
			<p class="hero-copy">A structured record of works that may be available, sold out, coming soon, or preserved as archive-only documentation.</p>
		</div>
	</section>

	<section class="content-section">
		<?php if ( have_posts() ) : ?>
			<div class="archive-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'release' );
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
				<h3>No release records have been published yet.</h3>
				<p>Releases and archive works added in WordPress admin will appear here.</p>
			</div>
		<?php endif; ?>
	</section>

</main>

<?php
get_footer();
