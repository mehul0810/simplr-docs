<?php
/**
 * SimplrDocs - Frontend Actions.
 *
 * @package WordPress
 * @subpackage SimplrDocs
 * @since 1.0.0
 */

namespace SimplrDocs\Includes;

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
		add_action( 'init', [ $this, 'init_docs' ] );
	}

	/**
	 * Init Docs.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function init_docs() {
		$this->register_post_type();
		$this->register_taxonomy();
	}

	/**
	 * Register Post Type.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function register_post_type() {
		$post_type_slug = 'simplrdocs_docs';

		$labels = [
            'name'                  => _x( 'Docs', 'Post type general name', 'simplrdocs' ),
			'singular_name'         => _x( 'Doc', 'Post type singular name', 'simplrdocs' ),
			'menu_name'             => _x( 'SimplrDocs', 'Admin Menu text', 'simplrdocs' ),
			'name_admin_bar'        => _x( 'Doc', 'Add New on Toolbar', 'simplrdocs' ),
			'add_new'               => __( 'Add New', 'simplrdocs' ),
			'add_new_item'          => __( 'Add New Doc', 'simplrdocs' ),
			'new_item'              => __( 'New Doc', 'simplrdocs' ),
			'edit_item'             => __( 'Edit Doc', 'simplrdocs' ),
			'view_item'             => __( 'View Doc', 'simplrdocs' ),
			'all_items'             => __( 'All Docs', 'simplrdocs' ),
			'search_items'          => __( 'Search Docs', 'simplrdocs' ),
			'parent_item_colon'     => __( 'Parent Docs:', 'simplrdocs' ),
			'not_found'             => __( 'No Docs found.', 'simplrdocs' ),
			'not_found_in_trash'    => __( 'No Docs found in Trash.', 'simplrdocs' ),
			'featured_image'        => _x( 'Doc Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'simplrdocs' ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'simplrdocs' ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'simplrdocs' ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'simplrdocs' ),
			'archives'              => _x( 'Doc archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'simplrdocs' ),
			'insert_into_item'      => _x( 'Insert into Doc', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'simplrdocs' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this Doc', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'simplrdocs' ),
			'filter_items_list'     => _x( 'Filter Docs list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'simplrdocs' ),
			'items_list_navigation' => _x( 'Docs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'simplrdocs' ),
			'items_list'            => _x( 'Docs list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'simplrdocs' ),
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => apply_filters( 'simplrdocs_docs_rewrite', [
				'slug'       => $post_type_slug,
				'with_front' => false,
			] ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'show_in_rest'       => true,
			'supports'           => [
				'title',
				'editor',
				'author',
				'thumbnail',
			],
		];

		// Register Post Type.
		register_post_type( $post_type_slug, $args );

		// Unset the variables.
		unset( $labels );
		unset( $args );
	}

	/**
	 * Register Taxonomy.
	 *
	 * @since  1.0.0
	 * @access public
	 *
	 * @return void
	 */
	public function register_taxonomy() {
		$labels = [
			'name'                       => _x( 'Sections', 'taxonomy general name', 'simplrdocs' ),
			'singular_name'              => _x( 'Section', 'taxonomy singular name', 'simplrdocs' ),
			'search_items'               => __( 'Search Sections', 'simplrdocs' ),
			'popular_items'              => __( 'Popular Sections', 'simplrdocs' ),
			'all_items'                  => __( 'All Sections', 'simplrdocs' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => __( 'Edit Section', 'simplrdocs' ),
			'update_item'                => __( 'Update Section', 'simplrdocs' ),
			'add_new_item'               => __( 'Add New Section', 'simplrdocs' ),
			'new_item_name'              => __( 'New Section Name', 'simplrdocs' ),
			'separate_items_with_commas' => __( 'Separate Sections with commas', 'simplrdocs' ),
			'add_or_remove_items'        => __( 'Add or remove Sections', 'simplrdocs' ),
			'choose_from_most_used'      => __( 'Choose from the most used Sections', 'simplrdocs' ),
			'not_found'                  => __( 'No Sections found.', 'simplrdocs' ),
			'menu_name'                  => __( 'Sections', 'simplrdocs' ),
		];

		$args = [
			'hierarchical'          => false,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'show_in_rest'          => true,
			'rewrite'               => [
				'slug' => apply_filters( 'simplrdocs_section_slug', 'section' ),
			],
		];

		register_taxonomy( 'simplrdocs_sections', 'simplrdocs_docs', $args );

		unset( $labels );
		unset( $args );
	}
}
