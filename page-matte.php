<?php
/**
 * Template for Matte materials page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Materials / Matte</p>

			<h1>A softer fine art surface for considered colour, detail, and gallery-style presentation.</h1>

			<p class="hero-copy">
				Matte paper offers a refined, low-reflection finish with a tactile fine art character suited to illustration, drawing, photography, and edition work.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Surface Character</p>
				<h2>A quiet finish that keeps attention on the artwork.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Fine Art Feel</h3>
				<p>The paper surface gives prints a tactile, substantial quality associated with traditional drawing and printmaking papers.</p>
			</article>

			<article>
				<h3>Soft Reflection</h3>
				<p>Low surface glare makes matte prints comfortable to view across a wider range of gallery, studio, and residential lighting.</p>
			</article>

			<article>
				<h3>Subtle Detail</h3>
				<p>Matte supports delicate tonal transitions, line work, texture, and restrained palettes without adding a reflective sheen.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Best Suited For</p>
				<h2>Artwork that calls for a softer, gallery-oriented presentation.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Illustration, drawing, and detailed line work</li>
					<li>Fine art and documentary photography</li>
					<li>Muted, natural, or carefully balanced colour palettes</li>
					<li>Gallery displays and framed presentation</li>
					<li>Limited editions and artist release work</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Choosing Matte</p>
				<h2>Match the paper's character to the mood of the work.</h2>
			</div>

			<div>
				<p>
					Matte is a strong choice when the print should feel tactile and understated rather than glossy or highly reflective. Its softer surface can support both intimate work and formal edition presentation.
				</p>

				<p>
					Send the largest available source file and note the intended size, framing approach, and any important shadow or highlight detail.
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
