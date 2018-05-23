<?php
/**
 * Custom post types for this theme.
 *
 * @package WP_Ogitive
 */

// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Apartmani', 'Post Type General Name', 'wpog' ),
		'singular_name'       => _x( 'Apartman', 'Post Type Singular Name', 'wpog' ),
		'menu_name'           => __( 'Apartmani', 'wpog' ),
		'parent_item_colon'   => __( 'Apartman parent:', 'wpog' ),
		'all_items'           => __( 'All Items', 'wpog' ),
		'view_item'           => __( 'View items', 'wpog' ),
		'add_new_item'        => __( 'Add New Item', 'wpog' ),
		'add_new'             => __( 'Add Item', 'wpog' ),
		'edit_item'           => __( 'Edit Item', 'wpog' ),
		'update_item'         => __( 'Update Item', 'wpog' ),
		'search_items'        => __( 'Search Item', 'wpog' ),
		'not_found'           => __( 'Item is not found', 'wpog' ),
		'not_found_in_trash'  => __( 'Item is not found in trash', 'wpog' ),
	);
	$args = array(
		'label'               => __( 'apartman', 'wpog' ),
		'description'         => __( 'Description', 'wpog' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'vila' ),	
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-home',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'apartman', $args );
       
       
        
        
        
        // Custom post type - - Aktuelnosti
        
        
        $labels = array(
		'name'                  => _x( 'Aktuelnosti', 'Post Type General Name', 'wpog' ),
		'singular_name'         => _x( 'Aktuelnost', 'Post Type Singular Name', 'wpog' ),
		'menu_name'             => __( 'Aktuelnosti', 'wpog' ),
		'name_admin_bar'        => __( 'Aktuelnosti', 'wpog' ),
		'archives'              => __( 'Item Archives', 'wpog' ),
		'attributes'            => __( 'Item Attributes', 'wpog' ),
		'parent_item_colon'     => __( 'Parent Item:', 'wpog' ),
		'all_items'             => __( 'All Items', 'wpog' ),
		'add_new_item'          => __( 'Add New Item', 'wpog' ),
		'add_new'               => __( 'Add New', 'wpog' ),
		'new_item'              => __( 'New Item', 'wpog' ),
		'edit_item'             => __( 'Edit Item', 'wpog' ),
		'update_item'           => __( 'Update Item', 'wpog' ),
		'view_item'             => __( 'View Item', 'wpog' ),
		'view_items'            => __( 'View Items', 'wpog' ),
		'search_items'          => __( 'Search Item', 'wpog' ),
		'not_found'             => __( 'Not found', 'wpog' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'wpog' ),
		'featured_image'        => __( 'Featured Image', 'wpog' ),
		'set_featured_image'    => __( 'Set featured image', 'wpog' ),
		'remove_featured_image' => __( 'Remove featured image', 'wpog' ),
		'use_featured_image'    => __( 'Use as featured image', 'wpog' ),
		'insert_into_item'      => __( 'Insert into item', 'wpog' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'wpog' ),
		'items_list'            => __( 'Items list', 'wpog' ),
		'items_list_navigation' => __( 'Items list navigation', 'wpog' ),
		'filter_items_list'     => __( 'Filter items list', 'wpog' ),
	);
	$args = array(
		'label'                 => __( 'Aktuelnost', 'wpog' ),
		'description'           => __( 'Post Type Description', 'wpog' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-pressthis',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	//register_post_type( 'aktuelnosti', $args );
}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );
