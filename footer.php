<?php
/**
 * Footer template for Print Archival.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<footer class="site-footer">
	<div class="site-footer__inner">

		<div class="site-footer__brand">
			<h2>Print Archival</h2>
			<p>Archival printing, artist editions, and contemporary Canadian artwork in print.</p>
		</div>

		<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer menu', 'print-archival' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_class'     => 'footer-menu',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>

		<div class="site-footer__contact">
			<p>
				<a href="mailto:hello@printarchival.ca">hello@printarchival.ca</a>
			</p>
			<p>Edmonton, Alberta</p>
		</div>

	</div>

	<div class="site-footer__bottom">
		<p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> Print Archival. All rights reserved.</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>