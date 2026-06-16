<?php
/**
 * Theme helper functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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
	$filename    = ltrim( $filename, '/' );
	$asset_path  = get_template_directory() . '/assets/images/' . $filename;
	$asset_url   = get_template_directory_uri() . '/assets/images/' . $filename;
	$legacy_path = get_template_directory() . '/' . $filename;
	$legacy_url  = get_template_directory_uri() . '/' . $filename;

	if ( file_exists( $asset_path ) ) {
		return esc_url( $asset_url );
	}

	if ( file_exists( $legacy_path ) ) {
		return esc_url( $legacy_url );
	}

	return esc_url( $asset_url );
}
