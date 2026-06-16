<?php
/**
 * Footer template for Print Archival.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<footer class="site-footer">
	<div class="site-footer__newsletter" aria-label="<?php esc_attr_e( 'Newsletter signup', 'print-archival' ); ?>">
		<div class="site-footer__newsletter-inner">
			<div>
				<p class="eyebrow">Print Archival Newsletter</p>
				<h2>Follow new releases, artist features, materials notes, and archival print updates.</h2>
			</div>

			<a class="button button-secondary site-footer__newsletter-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
				<?php esc_html_e( 'Join the List', 'print-archival' ); ?>
			</a>
		</div>
	</div>

	<div class="site-footer__inner site-footer__inner--full">

		<div class="site-footer__brand">
			<h2>Print Archival</h2>
			<p>Archival printing, artist editions, and contemporary Canadian artwork in print.</p>
			<p>Canadian owned and operated.</p>
			<address>
				Print Archival<br>
				Edmonton, Alberta<br>
				Canada
			</address>
			<p>
				<a href="mailto:hello@printarchival.ca">hello@printarchival.ca</a>
			</p>
			<ul class="site-footer__social-links">
				<li><a href="https://www.instagram.com/printarchival/" target="_blank" rel="noopener noreferrer">Instagram</a></li>
				<li><a href="https://www.facebook.com/Printarchival/" target="_blank" rel="noopener noreferrer">Facebook</a></li>
			</ul>
		</div>

		<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Print Archival footer links', 'print-archival' ); ?>">
			<h3><?php esc_html_e( 'Print Archival', 'print-archival' ); ?></h3>
			<ul class="footer-menu">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
				<li><a href="<?php echo esc_url( home_url( '/materials/' ) ); ?>">Materials</a></li>
				<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li>
				<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
			</ul>
		</nav>

		<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'The Archive footer links', 'print-archival' ); ?>">
			<h3><?php esc_html_e( 'The Archive', 'print-archival' ); ?></h3>
			<ul class="footer-menu">
				<li><a href="<?php echo esc_url( home_url( '/the-archive/' ) ); ?>">The Archive</a></li>
				<li><a href="<?php echo esc_url( home_url( '/the-archive/the-canadian-archive-project/' ) ); ?>">The Canadian Archive Project</a></li>
				<li><a href="<?php echo esc_url( home_url( '/the-archive/available-works/' ) ); ?>">Available Works</a></li>
				<li><a href="<?php echo esc_url( home_url( '/submit-your-work/' ) ); ?>">Submit Your Work</a></li>
			</ul>
		</nav>

		<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Tattoo Archival footer links', 'print-archival' ); ?>">
			<h3><?php esc_html_e( 'Tattoo Archival', 'print-archival' ); ?></h3>
			<ul class="footer-menu">
				<li><a href="<?php echo esc_url( home_url( '/tattoo-archival/' ) ); ?>">Tattoo Archival</a></li>
				<li><a href="<?php echo esc_url( home_url( '/tattoo-archival/initial-print-package/' ) ); ?>">Initial Print Package</a></li>
				<li><a href="<?php echo esc_url( home_url( '/tattoo-archival/flash-sheet-printing/' ) ); ?>">Flash Sheet Printing</a></li>
				<li><a href="<?php echo esc_url( home_url( '/tattoo-archival/convention-print-packages/' ) ); ?>">Convention Print Packages</a></li>
			</ul>
		</nav>

		<div class="site-footer__hours">
			<h3><?php esc_html_e( 'Hours', 'print-archival' ); ?></h3>
			<p>Project intake and print production by appointment.</p>
			<p>For current studio availability, contact Print Archival directly.</p>
		</div>

	</div>

	<div class="site-footer__bottom">
		<p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> Print Archival. All rights reserved.</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>