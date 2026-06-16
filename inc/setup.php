<?php
/**
 * Theme setup and widget registration.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme setup.
 */
function print_archival_setup() {

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable featured images.
	add_theme_support( 'post-thumbnails' );

	// Enable responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Prepare WooCommerce to use the theme's existing header, footer, typography, and product media features.
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 640,
			'single_image_width'    => 960,
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'max_rows'        => 6,
				'default_columns' => 3,
				'min_columns'     => 1,
				'max_columns'     => 4,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	// Enable HTML5 markup support.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Enable custom logo support.
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 120,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	// Register navigation menus.
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'print-archival' ),
			'footer'  => __( 'Footer Menu', 'print-archival' ),
		)
	);
}
add_action( 'after_setup_theme', 'print_archival_setup' );

/**
 * Register widget areas.
 */
function print_archival_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer Widgets', 'print-archival' ),
			'id'            => 'footer-widgets',
			'description'   => __( 'Widgets shown in the footer.', 'print-archival' ),
			'before_widget' => '<section id="%1$s" class="footer-widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="footer-widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'print_archival_widgets_init' );
