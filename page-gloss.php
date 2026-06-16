<?php
/**
 * Template for Gloss materials page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Materials / Gloss</p>

			<h1>A high-impact finish for saturated colour, crisp detail, and bold presentation.</h1>

			<p class="hero-copy">
				Gloss brings depth and intensity to artwork that depends on strong colour, sharp contrast, and a polished photographic surface.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Surface Character</p>
				<h2>Designed for visual impact and clean, precise reproduction.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Saturated Colour</h3>
				<p>Gloss supports rich blacks, vivid colour, and strong tonal separation, making it especially effective for artwork with a bold palette.</p>
			</article>

			<article>
				<h3>Sharp Detail</h3>
				<p>The smooth surface helps fine lines, crisp edges, photographic detail, and carefully rendered textures remain clear.</p>
			</article>

			<article>
				<h3>Polished Finish</h3>
				<p>The reflective surface creates a clean, high-impact presentation suited to display pieces and edition-ready prints.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Best Suited For</p>
				<h2>Work that benefits from intensity, contrast, and a sharp finish.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Tattoo flash and bold illustration</li>
					<li>Photography with strong colour or deep contrast</li>
					<li>Graphic artwork and saturated digital work</li>
					<li>Prints intended for a crisp, contemporary presentation</li>
					<li>Premium editions where surface impact is part of the work</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Choosing Gloss</p>
				<h2>Consider the display environment as well as the artwork.</h2>
			</div>

			<div>
				<p>
					Gloss surfaces can reflect windows and direct lighting. They work best when the display position can be planned to control glare while preserving the finish's depth and colour intensity.
				</p>

				<p>
					Submit the original file with the intended print size and any colour-critical notes so the image and surface can be reviewed together.
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
