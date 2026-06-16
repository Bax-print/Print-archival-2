<?php
/**
 * Print Archival Theme Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$print_archival_includes = array(
	'inc/setup.php',
	'inc/enqueue.php',
	'inc/theme-functions.php',
	'inc/template-tags.php',
	'inc/archive-content.php',
);

foreach ( $print_archival_includes as $print_archival_include ) {
	$print_archival_file = get_template_directory() . '/' . $print_archival_include;

	if ( file_exists( $print_archival_file ) ) {
		require_once $print_archival_file;
	}
}

/**
 * Print Archival intake form system.
 */
$print_archival_intake_file = get_template_directory() . '/inc/intake-form.php';

if ( file_exists( $print_archival_intake_file ) ) {
	require_once $print_archival_intake_file;
}
