<?php
/**
 * Template for Canvas materials page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Materials / Canvas</p>

			<h1>A textured archival presentation for larger work, statement pieces, and premium editions.</h1>

			<p class="hero-copy">
				Canvas adds physical texture and display presence to artwork intended to hold space at a larger scale or stand as a finished presentation piece.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Surface Character</p>
				<h2>Texture, scale, and depth for display-oriented work.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Visible Texture</h3>
				<p>The woven surface adds dimension and a tactile quality that can complement expressive marks, layered colour, and painterly imagery.</p>
			</article>

			<article>
				<h3>Larger Scale</h3>
				<p>Canvas is well suited to work designed for substantial wall presence, where material character remains visible from both near and far.</p>
			</article>

			<article>
				<h3>Finished Presence</h3>
				<p>The surface supports statement works, premium editions, and display pieces that need to feel distinct from a traditional paper print.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Best Suited For</p>
				<h2>Work intended to carry texture and visual weight.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Larger statement works and display pieces</li>
					<li>Painterly, expressive, or heavily textured artwork</li>
					<li>Premium artist editions and special releases</li>
					<li>Photography that benefits from a physical surface</li>
					<li>Work planned for stretched or mounted presentation</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Planning a Canvas Print</p>
				<h2>Allow for the relationship between image, edge, and final display.</h2>
			</div>

			<div>
				<p>
					Canvas projects should be planned around final dimensions and presentation. Important details need comfortable space from edges, especially when the work will be stretched, wrapped, or mounted.
				</p>

				<p>
					Include the intended size, display method, and whether the edge should show artwork, a mirrored extension, or a solid treatment when submitting the file for review.
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
