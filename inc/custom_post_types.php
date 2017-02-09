<?php
/**
 * Custom post types for this theme.
 *
 * @package WP_Ogitive
 */

// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Slider', 'Post Type General Name', 'wpog' ),
		'singular_name'       => _x( 'Slide', 'Post Type Singular Name', 'wpog' ),
		'menu_name'           => __( 'Slider', 'wpog' ),
		'parent_item_colon'   => __( 'Slide parent:', 'wpog' ),
		'all_items'           => __( 'All slides', 'wpog' ),
		'view_item'           => __( 'View slide', 'wpog' ),
		'add_new_item'        => __( 'Add New Slide', 'wpog' ),
		'add_new'             => __( 'Add Slide', 'wpog' ),
		'edit_item'           => __( 'Edit slide', 'wpog' ),
		'update_item'         => __( 'Update slide', 'wpog' ),
		'search_items'        => __( 'Search slide', 'wpog' ),
		'not_found'           => __( 'Slide is not found', 'wpog' ),
		'not_found_in_trash'  => __( 'Slide is not found in trash', 'wpog' ),
	);
	$args = array(
		'label'               => __( 'slider', 'wpog' ),
		'description'         => __( 'Slider description', 'wpog' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		// 'taxonomies'          => array( 'custom_taxnomy' ),	
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 100,
		'menu_icon'           => 'dashicons-slides',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'slajder', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );