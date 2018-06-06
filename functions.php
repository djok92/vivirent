<?php

/**
 * WP_Ogitive functions and definitions
 *
 * @package WP_Ogitive
 */
if(!function_exists('wpog_setup')) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wpog_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on WP_Ogitive, use a find and replace
		 * to change 'wpog' to the name of your theme in all the template files
		 */
		load_theme_textdomain('wpog', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		//add_theme_support( 'post-thumbnails' );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'primary' => __('Primary Menu', 'wpog'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */

		// add_theme_support( 'post-formats', array(
		// 	'aside', 'image', 'video', 'quote', 'link',
		// ) );
		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('wpog_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));
		remove_action('shutdown', 'wp_ob_end_flush_all', 1);
	}


endif; // wpog_setup
add_action('after_setup_theme', 'wpog_setup');


function custom_field_excerpt() {
	global $post;
	$text = get_sub_field('opis'); //Replace 'your_field_name'
	if('' != $text) {
		$text           = strip_shortcodes($text);
		$text           = apply_filters('the_content', $text);
		$text           = str_replace(']]&gt;', ']]&gt;', $text);
		$excerpt_length = 60; // 60 words
		$excerpt_more   = apply_filters('excerpt_more', '' . '...');
		$text           = wp_trim_words($text, $excerpt_length, $excerpt_more);
	}

	return apply_filters('the_excerpt', $text);
}


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wpog_widgets_init() {
	register_sidebar(array(
		'name'          => __('Sidebar', 'wpog'),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	));
}

add_action('widgets_init', 'wpog_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wpog_scripts() {

	//Css Paths
	$pathCss = get_template_directory() . '/dist/css/main.css';
	$urlCss  = get_template_directory_uri() . '/dist/css/main.css';

	//Js Paths
	$pathJs = get_template_directory() . '/dist/js/all.min.js';
	$urlJs  = get_template_directory_uri() . '/dist/js/all.min.js';

	wp_enqueue_style('wpog-style', get_stylesheet_uri());
	wp_enqueue_style('wpog-plugins', get_template_directory_uri() . '/dist/css/plugins.css');
	wp_enqueue_style('wpog-mainCss', $urlCss, '', filemtime($pathCss));
//	wp_enqueue_style('wpog-customCss', get_template_directory_uri() . '/custom.css');

	//wp_enqueue_script('google-map', 'https://maps.googleapis.com/maps/api/js?key=XXXXXXXX', array(), '3', true);
	//wp_enqueue_script('google-map-init', get_template_directory_uri() . '/gmap/gmap.js', array('google-map', 'jquery'), '0.1', true);
	wp_enqueue_script('wpog-js', $urlJs, '', filemtime($pathJs), true);


}

add_action('wp_enqueue_scripts', 'wpog_scripts');

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Google Fonts integration
 */
function child_styles() {
	if(!is_admin()) {

		// register styles
		wp_register_style('googlefont-raleway', 'https://fonts.googleapis.com/css?family=Raleway:300,400,700&amp;subset=latin-ext', array(), false, 'all');
		// wp_register_style('googlefont-robotocon', 'http://fonts.googleapis.com/css?family=Roboto+Condensed:400italic,400,300,700&subset=latin,latin-ext', array(), false, 'all');
		// wp_register_style('googlefont-robotosla', 'http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,700&subset=latin,latin-ext', array(), false, 'all');
		// wp_register_style('googlefont-scada', 'http://fonts.googleapis.com/css?family=Scada:400italic,400,700&subset=latin,latin-ext', array(), false, 'all');
		// enqueue styles
		wp_enqueue_style('googlefont-raleway');
		// wp_enqueue_style('googlefont-robotocon');
		// wp_enqueue_style('googlefont-robotosla');
		//wp_enqueue_style('googlefont-scada');
	}
}

add_action('wp_enqueue_scripts', 'child_styles');


/**
 * Load Custom Post Types and Taxonomies
 */
require get_template_directory() . '/inc/custom_post_types.php';
require get_template_directory() . '/inc/custom_taxonomies.php';

/**
 * Aktivacija thumbnailova i velicine
 */
add_theme_support('post-thumbnails');
add_image_size('full-width', 1920, 600, true);
add_image_size('archive-size', 455, 380, ['center', 'center']);
add_image_size('cat-thumb', 300, 200, true);


/**
 *
 * Brisanje nepotrebnih stvari iz titlova arhivnih strana
 */
add_filter('get_the_archive_title', function($title) {
	if(is_category()) {
		$title = single_cat_title('', false);
	} elseif(is_tag()) {
		$title = single_tag_title('', false);
	} elseif(is_archive()) {
		$title = post_type_archive_title('', false);
	} elseif(is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	}

	return $title;
});

/**
 *
 * Aktivacija THEME OPTIONS kroz ACF
 *
 */
if(function_exists('acf_add_options_page')) {

	$page = acf_add_options_page(array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Options',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'position'   => '999',
		'icon_url'   => 'dashicons-index-card',
		'redirect'   => false
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Theme Header Settings',
		'menu_title'  => 'Header',
		'parent_slug' => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Theme Sidebar Settings',
		'menu_title'  => 'Sidebar',
		'parent_slug' => 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title'  => 'Theme Footer Settings',
		'menu_title'  => 'Footer',
		'parent_slug' => 'theme-general-settings',
	));
}


add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup() {
	load_theme_textdomain('wpog', get_template_directory() . '/languages');
}
