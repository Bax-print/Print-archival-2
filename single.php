<?php
/**
 * Single post template for Print Archival.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();

		$categories = get_the_category();
		$category_names = array();

		if ( ! empty( $categories ) ) {
			foreach ( $categories as $category ) {
				$category_names[] = $category->name;
			}
		}

		$is_featured_release = has_category( 'featured-release' );
		$is_featured_artist  = has_category( 'featured-artist' );

		$eyebrow = 'Archive Entry';

		if ( $is_featured_release ) {
			$eyebrow = 'Featured Release';
		} elseif ( $is_featured_artist ) {
			$eyebrow = 'Featured Artist';
		}
		?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-entry' ); ?>>

			<section class="single-hero">
				<div class="single-hero__inner">

					<div class="single-hero__content">
						<p class="eyebrow"><?php echo esc_html( $eyebrow ); ?></p>

						<?php the_title( '<h1 class="single-title">', '</h1>' ); ?>

						<?php if ( has_excerpt() ) : ?>
							<p class="hero-copy">
								<?php echo esc_html( get_the_excerpt() ); ?>
							</p>
						<?php endif; ?>

						<div class="single-meta">
							<?php if ( ! empty( $category_names ) ) : ?>
								<p>
									<span>Category</span>
									<?php echo esc_html( implode( ', ', $category_names ) ); ?>
								</p>
							<?php endif; ?>

							<p>
								<span>Published</span>
								<?php echo esc_html( get_the_date() ); ?>
							</p>
						</div>
					</div>

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="single-hero__image">
							<?php the_post_thumbnail( 'large' ); ?>
						</div>
					<?php endif; ?>

				</div>
			</section>

			<section class="single-body content-section">
				<div class="single-body__inner">

					<div class="single-body__main">
						<?php the_content(); ?>
					</div>

					<aside class="single-body__aside">
						<div class="archive-record">
							<h2>Archive Record</h2>

							<dl>
								<dt>Title</dt>
								<dd><?php the_title(); ?></dd>

								<?php if ( $is_featured_release ) : ?>
									<dt>Type</dt>
									<dd>Featured Release</dd>
								<?php elseif ( $is_featured_artist ) : ?>
									<dt>Type</dt>
									<dd>Featured Artist</dd>
								<?php else : ?>
									<dt>Type</dt>
									<dd>Archive Entry</dd>
								<?php endif; ?>

								<?php if ( ! empty( $category_names ) ) : ?>
									<dt>Category</dt>
									<dd><?php echo esc_html( implode( ', ', $category_names ) ); ?></dd>
								<?php endif; ?>

								<dt>Published</dt>
								<dd><?php echo esc_html( get_the_date() ); ?></dd>
							</dl>
						</div>

						<div class="archive-actions">
							<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Inquire About This Work</a>
							<a class="text-link" href="<?php echo esc_url( home_url( '/the-archive/' ) ); ?>">Back to The Archive</a>
						</div>
					</aside>

				</div>
			</section>

									<section class="single-next content-section content-section--muted">
				<div class="section-header">
					<div>
						<p class="eyebrow">Continue Exploring</p>
						<h2>Discover more from Print Archival and The Archive.</h2>
					</div>
				</div>

				<div class="pathway-grid">

					<?php if ( $is_featured_release ) : ?>

						<article class="pathway-card">
							<h3>More Releases</h3>
							<p>
								Browse additional archival print releases and editioned artwork from Canadian artists.
							</p>
							<a href="<?php echo esc_url( home_url( '/category/featured-release/' ) ); ?>">View Featured Releases</a>
						</article>

						<article class="pathway-card">
							<h3>Featured Artists</h3>
							<p>
								Meet the artists, tattooers, photographers, and visual creators participating in The Canadian Archive Project.
							</p>
							<a href="<?php echo esc_url( home_url( '/category/featured-artist/' ) ); ?>">View Featured Artists</a>
						</article>

					<?php elseif ( $is_featured_artist ) : ?>

						<article class="pathway-card">
							<h3>Artist Releases</h3>
							<p>
								Explore current and upcoming archival print releases from artists featured in The Archive.
							</p>
							<a href="<?php echo esc_url( home_url( '/category/featured-release/' ) ); ?>">View Releases</a>
						</article>

						<article class="pathway-card">
							<h3>More Artists</h3>
							<p>
								Continue browsing artists, tattooers, photographers, and visual creators in The Archive.
							</p>
							<a href="<?php echo esc_url( home_url( '/category/featured-artist/' ) ); ?>">View Featured Artists</a>
						</article>

					<?php else : ?>

						<article class="pathway-card">
							<h3>The Archive</h3>
							<p>
								Browse current and upcoming archival print releases from Canadian artists.
							</p>
							<a href="<?php echo esc_url( home_url( '/the-archive/' ) ); ?>">Explore The Archive</a>
						</article>

						<article class="pathway-card">
							<h3>Featured Artists</h3>
							<p>
								Meet the artists, tattooers, photographers, and visual creators participating in The Canadian Archive Project.
							</p>
							<a href="<?php echo esc_url( home_url( '/category/featured-artist/' ) ); ?>">View Featured Artists</a>
						</article>

					<?php endif; ?>

					<article class="pathway-card">
						<h3>Start a Print Project</h3>
						<p>
							Submit artwork, request a quote, or inquire about artist releases, tattoo archival packages, or fine art printing.
						</p>
						<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact Print Archival</a>
					</article>

				</div>
			</section>

		</article>

	<?php endwhile; ?>

</main>

<?php
get_footer();