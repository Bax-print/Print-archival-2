<?php
/**
 * Template for Tattoo Archival Flash Sheet Printing page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero page-hero--tattoo">
		<div class="page-hero__inner">
			<p class="eyebrow">Tattoo Archival / Flash Sheet Printing</p>

			<h1>Turn tattoo flash into durable studio displays, client references, and sellable print releases.</h1>

			<p class="hero-copy">
				Archival flash sheet printing for working tattoo artists who want clear in-studio presentation, convention-ready inventory, or editioned artwork for clients and collectors.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Flash Sheet Uses</p>
				<h2>One artwork file can support booking, display, and release goals.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Studio Display</h3>
				<p>Present available flash clearly in the studio with a polished surface and consistent sizing across a set.</p>
			</article>

			<article>
				<h3>Client Reference</h3>
				<p>Keep physical examples available for consultations, placement discussions, and browsing without relying only on a phone screen.</p>
			</article>

			<article>
				<h3>Print Releases</h3>
				<p>Offer selected sheets as individual prints, coordinated sets, limited runs, or collector-focused releases.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Production Options</p>
				<h2>Plan the sheet around where it will be seen and how it will be used.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Single sheets or coordinated flash collections</li>
					<li>Studio wall, binder, and portfolio display</li>
					<li>Client-facing reference prints</li>
					<li>Convention inventory and portable displays</li>
					<li>Open runs or numbered limited releases</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Print Your Flash</p>
				<h2>Submit the original sheet with the intended size, quantity, and use.</h2>
			</div>

			<div>
				<p>Note whether the prints are for studio reference, sale, a convention, or a limited release so material and production recommendations match the project.</p>

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
