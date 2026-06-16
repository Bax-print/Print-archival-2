<?php
/**
 * Template for Tattoo Archival Studio Sample Kits page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero page-hero--tattoo">
		<div class="page-hero__inner">
			<p class="eyebrow">Tattoo Archival / Studio Sample Kits</p>

			<h1>Give clients a physical way to browse your artwork, print quality, and available releases.</h1>

			<p class="hero-copy">
				Studio sample kits organize flash, finished artwork, material examples, and sellable print options into a client-facing display system.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">In-Studio Presentation</p>
				<h2>Make print work visible during consultations and everyday studio visits.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Display Prints</h3>
				<p>Use framed or loose samples to show how tattoo artwork translates into a finished archival print.</p>
			</article>

			<article>
				<h3>Sample Binders</h3>
				<p>Organize flash sheets, available designs, paper examples, and print sizes into an easy client reference.</p>
			</article>

			<article>
				<h3>Sales Support</h3>
				<p>Help clients understand available print releases, compare options, and purchase artwork during studio visits.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Kit Planning</p>
				<h2>Build a sample set around the way your studio actually works.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Flash and artwork reference sheets</li>
					<li>Material and finish examples</li>
					<li>Common release sizes and price points</li>
					<li>Client-facing examples for consultations</li>
					<li>Samples that support artist print sales in studio</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Build a Studio Kit</p>
				<h2>Share the artwork and explain how clients currently browse work in your studio.</h2>
			</div>

			<div>
				<p>Include the number of artists, preferred display format, typical print sizes, and whether the kit should support reference, sales, or both.</p>

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
