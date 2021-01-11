<?php
/**
 * SimplrDocs - Admin Actions.
 *
 * @package WordPress
 * @subpackage SimplrDocs
 * @since 1.0.0
 */

namespace SimplrDocs\Admin;

// Bailout, if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Actions {

	/**
	 * Constructor.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function __construct() {
		add_action( 'admin_menu', [ $this, 'register_menu' ] );
	}

	/**
	 * Register Menu's.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function register_menu() {
		// Register Settings Page.
		add_submenu_page(
			'edit.php?post_type=simplrdocs_docs',
			esc_html__( 'Settings', 'simplrdocs' ),
			esc_html__( 'Settings', 'simplrdocs' ),
			'manage_options',
			'simplrdocs_settings',
			[ $this, 'render_settings_page' ]
		);
	}

	/**
	 * Render Settings Page.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function render_settings_page() {
		ob_start();
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Settings', 'simplrdocs' ); ?></h1>
		</div>
		<?php
		echo ob_get_clean();
	}
}
