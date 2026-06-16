<?php
/**
 * Theme asset loading.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue theme styles and scripts.
 */
function print_archival_enqueue_assets() {

	// Main theme stylesheet required by WordPress.
	wp_enqueue_style(
		'print-archival-style',
		get_stylesheet_uri(),
		array(),
		wp_get_theme()->get( 'Version' )
	);

	// Main visual stylesheet.
	wp_enqueue_style(
		'print-archival-main',
		get_template_directory_uri() . '/assets/css/main.css',
		array( 'print-archival-style' ),
		wp_get_theme()->get( 'Version' )
	);

	if ( class_exists( 'WooCommerce' ) ) {
		wp_enqueue_style(
			'print-archival-woocommerce',
			get_template_directory_uri() . '/assets/css/woocommerce.css',
			array( 'print-archival-main' ),
			wp_get_theme()->get( 'Version' )
		);
	}

	// Main JS file.
	wp_enqueue_script(
		'print-archival-main',
		get_template_directory_uri() . '/assets/js/main.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'print_archival_enqueue_assets' );
