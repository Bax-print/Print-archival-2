<?php
/**
 * Template for File Preparation page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Materials / File Preparation</p>

			<h1>Prepare artwork files for a cleaner, more predictable archival print.</h1>

			<p class="hero-copy">
				The strongest print results begin with a well-prepared source file. Use these guidelines before submitting artwork, photography, or edition files to Print Archival.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">File Essentials</p>
				<h2>Start with the best available version of your work.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>File Types</h3>
				<p>
					TIFF and PSD files are preferred for high-quality artwork and layered production files. High-quality JPEG, JPG, and PNG files are also accepted when they are the largest available originals.
				</p>
			</article>

			<article>
				<h3>Resolution</h3>
				<p>
					Aim for 300 pixels per inch at the intended print size. Files below that target may still print well depending on viewing distance, image detail, and final dimensions, but they should be reviewed before production.
				</p>
			</article>

			<article>
				<h3>Original Quality</h3>
				<p>
					Send the original export or largest available file. Avoid screenshots, social-media downloads, repeated JPEG saves, and unnecessary compression whenever a better source exists.
				</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Sizing Guidance</p>
				<h2>Tell us the intended print dimensions before resizing the artwork.</h2>
			</div>

			<div>
				<p>
					Include the desired width and height, quantity, material, and whether the work will be sold as an edition, displayed privately, or used as a proof. Dimensions can be provided in inches or centimetres.
				</p>

				<p>
					Keep the original proportions unless cropping is intentional. If the artwork does not match a standard paper ratio, note whether you prefer a custom crop, a visible border, or the full image printed with additional paper around it.
				</p>

				<p>
					Do not enlarge, sharpen, or resample a smaller file solely to reach 300 PPI. Send the original and let us assess the most appropriate production size.
				</p>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Colour and Profiles</p>
				<h2>Preserve the colour information already attached to the file.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Embedded Profiles</h3>
				<p>
					Keep the file's embedded ICC colour profile when exporting. Common RGB profiles such as Adobe RGB, sRGB, and Display P3 provide useful colour information for print preparation.
				</p>
			</article>

			<article>
				<h3>Screen Differences</h3>
				<p>
					Backlit screens can appear brighter and more saturated than paper. Review important work on a calibrated display when possible, and mention any colours, shadows, or skin tones that require particular attention.
				</p>
			</article>

			<article>
				<h3>Conversions</h3>
				<p>
					Do not convert between RGB and CMYK simply to prepare a submission unless a specific production workflow requires it. Retaining the original colour space usually gives us the best starting point.
				</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Edges and Borders</p>
				<h2>Protect important details near the finished edge.</h2>
			</div>

			<div>
				<p>
					Keep signatures, text, faces, and other essential elements comfortably inside the intended trim or image edge. Small variations can occur during trimming, mounting, or framing.
				</p>

				<p>
					For borderless or full-bleed work, include extra image area beyond the final dimensions whenever possible. For bordered prints, specify the preferred border width and whether it should be equal on all sides.
				</p>

				<ul class="contact-checklist">
					<li>Keep critical details away from trim edges</li>
					<li>Include bleed for artwork intended to run fully to the edge</li>
					<li>State whether borders are part of the artwork or should be added in production</li>
					<li>Leave crop marks and printer marks out unless specifically requested</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Ready to Submit</p>
				<h2>Send the file with enough project context for a useful review.</h2>
			</div>

			<div>
				<p>
					Include your intended size, quantity, material preference, deadline, and any colour or cropping concerns. If you are unsure about any specification, submit the original file and describe the result you want.
				</p>

				<a class="button" href="<?php echo esc_url( home_url( '/submit-your-work/' ) ); ?>">Submit Your Work</a>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
