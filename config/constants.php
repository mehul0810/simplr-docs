<?php
// Bailout, if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define plugin version in SemVer format.
if ( ! defined( 'SIMPLRDOCS_VERSION' ) ) {
	define( 'SIMPLRDOCS_VERSION', '1.3.0' );
}

// Define plugin root File.
if ( ! defined( 'SIMPLRDOCS_PLUGIN_FILE' ) ) {
	define( 'SIMPLRDOCS_PLUGIN_FILE', dirname( dirname( __FILE__ ) ) . '/simplrdocs.php' );
}

// Define plugin basename.
if ( ! defined( 'SIMPLRDOCS_PLUGIN_BASENAME' ) ) {
	define( 'SIMPLRDOCS_PLUGIN_BASENAME', plugin_basename( SIMPLRDOCS_PLUGIN_FILE ) );
}

// Define plugin directory Path.
if ( ! defined( 'SIMPLRDOCS_PLUGIN_DIR' ) ) {
	define( 'SIMPLRDOCS_PLUGIN_DIR', plugin_dir_path( SIMPLRDOCS_PLUGIN_FILE ) );
}

// Define plugin directory URL.
if ( ! defined( 'SIMPLRDOCS_PLUGIN_URL' ) ) {
	define( 'SIMPLRDOCS_PLUGIN_URL', plugin_dir_url( SIMPLRDOCS_PLUGIN_FILE ) );
}
