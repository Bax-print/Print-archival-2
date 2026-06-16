<?php
/**
 * Template for Print Care page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Materials / Print Care</p>

			<h1>Handle, frame, and store archival prints with their long-term condition in mind.</h1>

			<p class="hero-copy">
				Thoughtful handling and display choices help protect the surface, colour, and physical stability of an archival print over time.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Everyday Handling</p>
				<h2>Protect the print surface from oils, pressure, and abrasion.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Clean Hands</h3>
				<p>Wash and dry hands before handling. For valuable editions or frequent handling, use clean cotton or nitrile gloves.</p>
			</article>

			<article>
				<h3>Support the Print</h3>
				<p>Hold paper prints by their edges with two hands and support larger works from beneath to prevent bends, dents, or creases.</p>
			</article>

			<article>
				<h3>Protect the Surface</h3>
				<p>Avoid rubbing, wiping, stacking unprotected prints, or placing objects directly on the printed image.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Framing and Display</p>
				<h2>Use stable materials and avoid harsh environmental exposure.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Use archival, acid-free mounting and backing materials</li>
					<li>Keep the printed surface from resting directly against glazing</li>
					<li>Avoid direct sunlight and strong, continuous artificial light</li>
					<li>Keep prints away from moisture, condensation, and rapid humidity changes</li>
					<li>Do not display prints directly above heat sources or in damp rooms</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Storage</p>
				<h2>Keep unframed work clean, flat, dry, and properly separated.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Use Archival Protection</h3>
				<p>Store prints in acid-free folders, sleeves, boxes, or interleaving materials appropriate for the print surface.</p>
			</article>

			<article>
				<h3>Choose a Stable Space</h3>
				<p>A cool, dry interior location with steady temperature and humidity is preferable to basements, attics, garages, or exterior walls.</p>
			</article>

			<article>
				<h3>Avoid Pressure</h3>
				<p>Store work flat where possible and avoid heavy stacking, tight rolling, or pressure that can mark the surface or distort the sheet.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Questions About Care</p>
				<h2>Plan handling and presentation around the material you choose.</h2>
			</div>

			<div>
				<p>
					Surface, size, mounting, and display conditions can affect the best care approach. Include presentation details with your project when you need material-specific guidance.
				</p>

				<div class="hero-actions">
					<a class="button" href="<?php echo esc_url( home_url( '/submit-your-work/' ) ); ?>">Submit Your Work</a>
					<a class="button button-secondary" href="<?php echo esc_url( home_url( '/materials/' ) ); ?>">Back to Materials</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
