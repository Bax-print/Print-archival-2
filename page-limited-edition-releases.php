<?php
/**
 * Template for Tattoo Archival Limited Edition Releases page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero page-hero--tattoo">
		<div class="page-hero__inner">
			<p class="eyebrow">Tattoo Archival / Limited Edition Releases</p>

			<h1>Build tattoo artist print drops with clear edition language and collector-facing presentation.</h1>

			<p class="hero-copy">
				Turn flash, tattoo-based artwork, paintings, and original designs into documented limited releases for clients, followers, and collectors.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Edition Planning</p>
				<h2>Give each release a defined structure from proof to final drop.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Edition Size</h3>
				<p>Choose a realistic quantity based on audience, price, release timing, and whether future restocks should remain possible.</p>
			</article>

			<article>
				<h3>Artist Proof</h3>
				<p>Review colour, scale, surface, borders, and details before approving the numbered production run.</p>
			</article>

			<article>
				<h3>Release Positioning</h3>
				<p>Frame the work as an editioned tattoo artist release with clear artwork, artist, material, and availability context.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Collector-Facing Releases</p>
				<h2>Create a physical edition that carries more context than a social media post.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Numbered or clearly defined print quantities</li>
					<li>Consistent materials and dimensions across the edition</li>
					<li>Artist, artwork, and release documentation</li>
					<li>Launch planning for studio, online, or convention drops</li>
					<li>Potential Archive release positioning for selected projects</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Plan a Limited Release</p>
				<h2>Submit the artwork with your proposed quantity, size, and release idea.</h2>
			</div>

			<div>
				<p>Include whether the edition will launch through your studio, at a convention, online, or as part of a broader collector-facing release.</p>

				<div class="hero-actions">
					<a class="button" href="<?php echo esc_url( home_url( '/submit-your-work/' ) ); ?>">Start a Project</a>
					<a class="button button-secondary" href="<?php echo esc_url( home_url( '/tattoo-archival/' ) ); ?>">Back to Tattoo Archival</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
