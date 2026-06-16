<?php
/**
 * Print Archival Theme Functions
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

function print_archival_fallback_menu() {
	?>
	<ul class="primary-menu">
		<li><a href="<?php echo esc_url( home_url( '/the-archive/' ) ); ?>">The Archive</a></li>
		<li><a href="<?php echo esc_url( home_url( '/fine-art-printing/' ) ); ?>">Fine Art Printing</a></li>
		<li><a href="<?php echo esc_url( home_url( '/tattoo-archival/' ) ); ?>">Tattoo Archival</a></li>
		<li><a href="<?php echo esc_url( home_url( '/materials/' ) ); ?>">Materials</a></li>
		<li><a href="<?php echo esc_url( home_url( '/artists/' ) ); ?>">Artists</a></li>
		<li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li>
		<li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
	</ul>
	<?php
}

/**
 * Return theme image URL.
 */
function print_archival_image_url( $filename ) {
	return esc_url( get_template_directory_uri() . '/assets/images/' . $filename );
}

/**
 * Print Archival intake form system.
 */
$print_archival_intake_file = get_template_directory() . '/inc/intake-form.php';

if ( file_exists( $print_archival_intake_file ) ) {
	require_once $print_archival_intake_file;
}