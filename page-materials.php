<?php
/**
 * Template for Materials page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Materials</p>

			<h1>Archival papers, canvas, pigment ink, and edition-ready production.</h1>

			<p class="hero-copy">
				Our materials are selected for visual impact, longevity, and professional presentation across artwork, photography, and tattoo-based print releases.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Material Options</p>
				<h2>Three core surfaces for different visual outcomes.</h2>
			</div>
		</div>

		<div class="three-column-grid material-grid">

			<article class="material-card">
				<img 
					src="<?php echo print_archival_image_url( 'materials-gloss.jpg' ); ?>" 
					alt="Gloss archival print material close-up"
				>

				<h3>Gloss</h3>
				<p>
					A high-impact surface suited to saturated artwork, tattoo flash, bold illustration, and photographic contrast.
				</p>
			</article>

			<article class="material-card">
				<img 
					src="<?php echo print_archival_image_url( 'materials-matte.jpeg' ); ?>" 
					alt="Matte fine art paper material close-up"
				>

				<h3>Matte</h3>
				<p>
					A refined fine art surface with a softer finish, ideal for gallery-style prints, drawings, photography, and premium editions.
				</p>
			</article>

			<article class="material-card">
				<img 
					src="<?php echo print_archival_image_url( 'materials-canvas.jpeg' ); ?>" 
					alt="Canvas archival print material close-up"
				>

				<h3>Canvas</h3>
				<p>
					A textured archival canvas for larger works, statement pieces, and display-oriented releases.
				</p>
			</article>

		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Choosing a Surface</p>
				<h2>Different artwork benefits from different materials.</h2>
			</div>

			<div>
				<p>
					Gloss is best when colour intensity and contrast matter. Matte is best when the work needs a softer fine art presentation. Canvas is best for larger display pieces and textured statement prints.
				</p>

				<p>
					We help artists choose the right surface based on colour, detail, intended display setting, edition size, and retail price.
				</p>

				<a class="button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Ask About Materials</a>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">File Preparation</p>
				<h2>Good archival printing starts before the file reaches the printer.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Send the largest available file whenever possible</li>
					<li>Use clean, uncropped artwork files when available</li>
					<li>Include your intended print size and quantity</li>
					<li>Let us know whether the work is for display, resale, or an edition</li>
					<li>Ask us before heavily sharpening, resizing, or compressing the file</li>
				</ul>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();