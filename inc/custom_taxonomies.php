<?php
/**
 * Custom post types for this theme.
 *
 * @package WP_Ogitive
 */

// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Taxonomies', 'Taxonomy General Name', 'wpog' ),
		'singular_name'              => _x( 'Taxonomy', 'Taxonomy Singular Name', 'wpog' ),
		'menu_name'                  => __( 'Taxonomy', 'wpog' ),
		'all_items'                  => __( 'All Items', 'wpog' ),
		'parent_item'                => __( 'Parent Item', 'wpog' ),
		'parent_item_colon'          => __( 'Parent Item:', 'wpog' ),
		'new_item_name'              => __( 'New Item Name', 'wpog' ),
		'add_new_item'               => __( 'Add New Item', 'wpog' ),
		'edit_item'                  => __( 'Edit Item', 'wpog' ),
		'update_item'                => __( 'Update Item', 'wpog' ),
		'view_item'                  => __( 'View Item', 'wpog' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'wpog' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'wpog' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wpog' ),
		'popular_items'              => __( 'Popular Items', 'wpog' ),
		'search_items'               => __( 'Search Items', 'wpog' ),
		'not_found'                  => __( 'Not Found', 'wpog' ),
		'items_list'                 => __( 'Items list', 'wpog' ),
		'items_list_navigation'      => __( 'Items list navigation', 'wpog' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'taxonomy', array( 'post' ), $args );

}
//add_action( 'init', 'custom_taxonomy', 0 );