<?php
/**
 * Template for Contact page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Contact</p>

			<h1>Start a print project, submit artwork, or inquire about The Archive.</h1>

			<p class="hero-copy">
				Whether you are an artist, tattoo artist, photographer, gallery, studio, or private client,
				Print Archival can help route your project to the right production path.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Inquiry Type</p>
				<h2>Choose the path that best fits your project.</h2>
			</div>
		</div>

		<div class="contact-grid">

			<article class="contact-card">
				<h3>Artist Inquiry</h3>
				<p>
					For painters, illustrators, digital artists, and visual creators interested in archival editions,
					artist releases, or joining The Archive.
				</p>
				<a href="mailto:hello@printarchival.ca?subject=Artist%20Inquiry%20-%20Print%20Archival">Start artist inquiry</a>
			</article>

			<article class="contact-card">
				<h3>Tattoo Artist Inquiry</h3>
				<p>
					For tattoo artists looking to produce flash sheets, initial print packages, limited releases,
					studio samples, or convention inventory.
				</p>
				<a href="mailto:hello@printarchival.ca?subject=Tattoo%20Artist%20Inquiry%20-%20Print%20Archival">Start tattoo inquiry</a>
			</article>

			<article class="contact-card">
				<h3>Photographer Inquiry</h3>
				<p>
					For wedding, family, fine art, portrait, and commercial photographers interested in client print
					add-ons or archival production.
				</p>
				<a href="mailto:hello@printarchival.ca?subject=Photographer%20Inquiry%20-%20Print%20Archival">Start photographer inquiry</a>
			</article>

			<article class="contact-card">
				<h3>Gallery / Studio Inquiry</h3>
				<p>
					For galleries, studios, collectives, tattoo shops, and creative businesses interested in print
					partnerships, artist programs, or sample kits.
				</p>
				<a href="mailto:hello@printarchival.ca?subject=Gallery%20or%20Studio%20Inquiry%20-%20Print%20Archival">Start partnership inquiry</a>
			</article>

			<article class="contact-card">
				<h3>Custom Print Quote</h3>
				<p>
					For one-off print projects, private collections, wedding images, artwork reproductions, and
					material or sizing recommendations.
				</p>
				<a href="mailto:hello@printarchival.ca?subject=Custom%20Print%20Quote%20-%20Print%20Archival">Request a quote</a>
			</article>

			<article class="contact-card">
				<h3>General Inquiry</h3>
				<p>
					For all other questions about Print Archival, The Archive, materials, pricing, production,
					or collaboration opportunities.
				</p>
				<a href="mailto:hello@printarchival.ca?subject=General%20Inquiry%20-%20Print%20Archival">Contact us</a>
			</article>

		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">General Inbox</p>
				<h2>Reach Print Archival directly.</h2>
			</div>

			<div class="contact-details">
				<p>
					For quotes, artist submissions, tattoo archival packages, photographer partnerships, and general inquiries:
				</p>

				<p class="contact-email">
					<a href="mailto:hello@printarchival.ca">hello@printarchival.ca</a>
				</p>

				<p>
					Edmonton, Alberta<br>
					Serving artists, photographers, studios, and creative clients across Canada.
				</p>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">What to Include</p>
				<h2>Help us understand the project quickly.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Your name or studio name</li>
					<li>Your city and province</li>
					<li>The type of work you want printed</li>
					<li>Approximate size and quantity</li>
					<li>Preferred material, if known</li>
					<li>Whether the prints are for display, resale, an event, or The Archive</li>
					<li>A link to your website, portfolio, or Instagram</li>
				</ul>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();