<?php
/**
 * Header template for Print Archival.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary">
	<?php esc_html_e( 'Skip to content', 'print-archival' ); ?>
</a>

<header class="site-header">
	<div class="site-header__inner">

		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					Print Archival
				</a>
			<?php endif; ?>

			<p class="site-tagline">
				The Archive of Contemporary Canadian Print
			</p>
		</div>

		<button 
			class="menu-toggle" 
			type="button" 
			aria-controls="primary-menu" 
			aria-expanded="false"
		>
			<span class="menu-toggle__label">Menu</span>
			<span class="menu-toggle__icon" aria-hidden="true">
				<span></span>
				<span></span>
			</span>
		</button>

		<nav class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'print-archival' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_class'     => 'primary-menu',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'fallback_cb'    => 'print_archival_fallback_menu',
				)
			);
			?>
		</nav>

	</div>
</header>