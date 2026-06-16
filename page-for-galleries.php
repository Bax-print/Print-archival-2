<?php
/**
 * Template for Fine Art Printing for Galleries page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero">
		<div class="page-hero__inner">
			<p class="eyebrow">Fine Art Printing / For Galleries</p>

			<h1>Consistent archival production for exhibitions, artist editions, and gallery releases.</h1>

			<p class="hero-copy">
				Print support for galleries, studios, and represented artists preparing artist proofs, edition runs, exhibitions, and repeatable release programs.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">Gallery Production</p>
				<h2>A dependable workflow from approved proof to finished release.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Edition Printing</h3>
				<p>Produce limited editions and gallery releases with documented sizes, materials, and repeatable production specifications.</p>
			</article>

			<article>
				<h3>Artist Proofs</h3>
				<p>Review scale, colour, surface, and presentation before approving a broader production run.</p>
			</article>

			<article>
				<h3>Exhibition Support</h3>
				<p>Coordinate print requirements for exhibitions, installation schedules, replacement works, and display deadlines.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Consistent Production</p>
				<h2>Keep artist and gallery releases aligned across time and quantity.</h2>
			</div>

			<div>
				<ul class="contact-checklist">
					<li>Artist proof and approval stages</li>
					<li>Edition quantities and release scheduling</li>
					<li>Consistent materials, dimensions, and file versions</li>
					<li>Gallery and studio production coordination</li>
					<li>Reorders and phased production where appropriate</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Request Gallery Production</p>
				<h2>Provide the artwork files and project specifications for a production review.</h2>
			</div>

			<div>
				<p>Include artist names, intended dimensions, quantities, materials, proofing requirements, exhibition dates, and any release schedule that affects production.</p>

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
