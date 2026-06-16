<?php
/**
 * Template for The Canadian Archive Project page.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-main">

	<section class="page-hero page-hero--archive">
		<div class="page-hero__inner">
			<p class="eyebrow">The Archive / The Canadian Archive Project</p>

			<h1>A national initiative to document, preserve, and publish contemporary Canadian artwork.</h1>

			<p class="hero-copy">
				The Canadian Archive Project connects artists with archival print production, public documentation, and carefully presented edition releases within The Archive.
			</p>
		</div>
	</section>

	<section class="content-section">
		<div class="section-header">
			<div>
				<p class="eyebrow">The Initiative</p>
				<h2>Building a durable public record of artists and the work they are making now.</h2>
			</div>
		</div>

		<div class="three-column-grid">
			<article>
				<h3>Documentation</h3>
				<p>Record artist information, artwork context, release details, and the production history connected to each selected work.</p>
			</article>

			<article>
				<h3>Preservation</h3>
				<p>Use archival print processes to give digital and physical artwork a stable, edition-ready form that can be collected and revisited.</p>
			</article>

			<article>
				<h3>Public Presentation</h3>
				<p>Introduce artists and editioned prints through a curated public-facing archive rather than a general printing catalogue.</p>
			</article>
		</div>
	</section>

	<section class="content-section content-section--muted">
		<div class="two-column">
			<div>
				<p class="eyebrow">Artist Participation</p>
				<h2>A growing archive shaped by artists across disciplines and regions.</h2>
			</div>

			<div>
				<p>The project can include painters, illustrators, tattoo artists, photographers, printmakers, digital artists, and independent visual creators working across Canada.</p>

				<ul class="contact-checklist">
					<li>Artist and artwork documentation</li>
					<li>File and reproduction review</li>
					<li>Artist proofs and edition planning</li>
					<li>Curated Archive profiles and release context</li>
					<li>Long-term preservation of production details</li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-section">
		<div class="two-column">
			<div>
				<p class="eyebrow">Participate in the Project</p>
				<h2>Submit work for consideration with enough context to understand the artist and the piece.</h2>
			</div>

			<div>
				<p>Include the strongest available artwork file, artist biography, location, project context, and any proposed edition or release details.</p>

				<div class="hero-actions">
					<a class="button" href="<?php echo esc_url( home_url( '/submit-your-work/' ) ); ?>">Submit Your Work</a>
					<a class="button button-secondary" href="<?php echo esc_url( home_url( '/the-archive/' ) ); ?>">Back to The Archive</a>
				</div>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
