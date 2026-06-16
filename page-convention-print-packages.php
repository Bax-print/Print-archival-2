<?php
/**
 * Template for Tattoo Archival Convention Print Packages page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero page-hero--tattoo">
		<div class="page-hero__inner">
			<p class="eyebrow">Tattoo Archival / Convention Print Packages</p>

			<h1>Plan portable print inventory for convention tables, artist releases, and fast-moving event sales.</h1>

			<p class="hero-copy">
				Tattoo-specific print packages help artists prepare the right artwork, quantities, sizes, and display pieces before a convention deadline.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Convention Inventory</p>
				<h2>A focused mix of prints that is easy to transport, display, and restock.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Fast Planning</h3>
				<p>Choose a practical set of artworks, sizes, and quantities based on table space, event length, audience, and deadline.</p>
			</article>

			<article>
				<h3>Table Display</h3>
				<p>Prepare visible samples and organized sale inventory that clients can browse without overwhelming the booth.</p>
			</article>

			<article>
				<h3>Print Runs</h3>
				<p>Balance accessible quantities with limited releases, proven designs, and new artwork being tested at the event.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Package Support</p>
				<h2>Prepare the table before the event and keep successful work available afterward.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Portable print sizes and protective packing</li>
					<li>Display samples plus organized sale inventory</li>
					<li>Small runs for new flash and larger runs for proven work</li>
					<li>Convention deadlines and production scheduling</li>
					<li>Restock support for successful releases after the event</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Plan Convention Inventory</p>
				<h2>Send the artwork list, event date, table plan, and target quantities.</h2>
			</div>

			<div>
				<p>Include which designs are proven sellers, which are new releases, and whether you need display copies, sellable inventory, or a combination of both.</p>

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
