<?php
/**
 * Template for Fine Art Printing for Artists page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Fine Art Printing / For Artists</p>

			<h1>Archival printing that carries artwork from the studio into finished editions.</h1>

			<p class="hero-copy">
				Professional print production for painters, illustrators, digital artists, mixed-media artists, and creators preparing individual works or edition releases.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Artist Services</p>
				<h2>A practical production path for physical artwork and digital originals.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Artwork Reproduction</h3>
				<p>Translate paintings, drawings, illustrations, and mixed-media work into carefully prepared archival prints.</p>
			</article>

			<article>
				<h3>Digital Originals</h3>
				<p>Produce polished physical editions from digital painting, illustration, collage, and other screen-based work.</p>
			</article>

			<article>
				<h3>Edition Releases</h3>
				<p>Plan artist proofs, limited runs, launch quantities, and repeatable production for ongoing releases.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Project Planning</p>
				<h2>Make production choices that support the work and the way it will be sold or displayed.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Material and surface recommendations</li>
					<li>Print sizing and proportion review</li>
					<li>Artist proofs and edition planning</li>
					<li>Gallery-ready and portfolio presentation</li>
					<li>Consistent production for repeat releases</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Start an Artist Project</p>
				<h2>Send the strongest available file and describe the finished print you have in mind.</h2>
			</div>

			<div>
				<p>Include the intended dimensions, quantity, material preference, release plan, and any colour or detail that needs particular attention.</p>

				<div class="hero-actions">
					<a class="button" href="<?php echo esc_url( home_url( '/submit-your-work/' ) ); ?>">Submit Your Work</a>
					<a class="button button-secondary" href="<?php echo esc_url( home_url( '/fine-art-printing/' ) ); ?>">Back to Fine Art Printing</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
