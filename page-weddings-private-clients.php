<?php
/**
 * Template for Weddings and Private Clients page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Fine Art Printing / Weddings &amp; Private Clients</p>

			<h1>Premium, approachable printing for photographs and artwork meant to live at home.</h1>

			<p class="hero-copy">
				Thoughtful print packages for wedding photographs, family collections, household displays, meaningful keepsakes, and private presentation projects.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Personal Print Projects</p>
				<h2>Turn important images into finished prints that are easy to share and display.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Household Display</h3>
				<p>Create individual statement prints or coordinated groupings for living spaces, offices, and personal collections.</p>
			</article>

			<article>
				<h3>Family Distribution</h3>
				<p>Prepare consistent sets in practical sizes for parents, relatives, wedding parties, and close friends.</p>
			</article>

			<article>
				<h3>Curated Packages</h3>
				<p>Combine favourite photographs into a considered collection rather than leaving meaningful images on a screen.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Accessible Guidance</p>
				<h2>You do not need professional print experience to begin.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Help choosing suitable sizes and materials</li>
					<li>Wedding, portrait, family, and keepsake printing</li>
					<li>Single display prints or coordinated sets</li>
					<li>Practical quantities for family distribution</li>
					<li>Clear recommendations based on room, image, and budget</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Plan a Private Print Project</p>
				<h2>Share the image and tell us where the finished print is going.</h2>
			</div>

			<div>
				<p>Include approximate dimensions, quantity, display location, deadline, and whether you need one feature print or a coordinated package.</p>

				<div class="hero-actions">
					<a class="button" href="<?php echo esc_url( home_url( '/submit-your-work/' ) ); ?>">Request a Quote</a>
					<a class="button button-secondary" href="<?php echo esc_url( home_url( '/fine-art-printing/' ) ); ?>">Back to Fine Art Printing</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
