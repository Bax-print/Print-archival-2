<?php
/**
 * Template for Tattoo Archival page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero page-hero--tattoo page-hero--split">
		<div class="page-hero__inner page-hero__grid">
			<div>
				<p class="eyebrow">Tattoo Archival</p>

				<h1>Archival print packages for tattoo artists, flash sheets, studios, and convention inventory.</h1>

				<p class="hero-copy">
					Turn flash, tattoo artwork, paintings, and original designs into physical print releases your clients and collectors can keep.
				</p>
			</div>

			<div class="page-hero__image">
				<img 
					src="<?php echo print_archival_image_url( 'tattoo-archival.jpeg' ); ?>" 
					alt="Tattoo archival print sample and flash artwork"
				>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Tattoo Artist Offers</p>
				<h2>Built specifically for tattoo artists and studios.</h2>
			</div>
		</div>

		<div class="pathway-grid">

			<article class="pathway-card">
				<h3>Initial Print Package</h3>
				<p>
					Start with a small archival print run and test one artwork as a physical release.
				</p>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Inquire</a>
			</article>

			<article class="pathway-card">
				<h3>Flash Sheet Printing</h3>
				<p>
					Produce flash sheets, studio display prints, and sellable artwork for your audience.
				</p>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">View options</a>
			</article>

			<article class="pathway-card">
				<h3>Convention Print Packages</h3>
				<p>
					Prepare merch table inventory, limited releases, and portable print collections for events.
				</p>
				<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Plan a run</a>
			</article>

		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Print Releases for Tattooers</p>
				<h2>Flash, paintings, and tattoo-based artwork can become more than social media posts.</h2>
			</div>

			<div>
				<p>
					Tattoo Archival is built to help tattoo artists create physical print products from their visual work — whether that means flash sheets, limited drops, convention inventory, studio displays, or collector-focused editions.
				</p>

				<p>
					The goal is to make print releases simple, premium, and realistic for working artists.
				</p>

				<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Start a Tattoo Inquiry</a>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Join The Archive</p>
				<h2>Selected tattoo artists can be featured through The Canadian Archive Project.</h2>
			</div>

			<div>
				<p>
					The Archive includes tattoo culture as part of contemporary Canadian visual art. We are building a national print archive that can include tattooers, flash artists, illustrators, painters, photographers, and independent visual creators.
				</p>

				<a class="button button-secondary" href="<?php echo esc_url( home_url( '/the-archive/' ) ); ?>">Explore The Archive</a>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();