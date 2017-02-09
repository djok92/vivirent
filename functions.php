<?php

/**
 * WP_Ogitive functions and definitions
 *
 * @package WP_Ogitive
 */
if (!function_exists('wpog_setup')) :

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
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
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
    }

endif; // wpog_setup
add_action('after_setup_theme', 'wpog_setup');

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wpog_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'wpog'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
}

add_action('widgets_init', 'wpog_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function wpog_scripts() {

    wp_enqueue_style('wpog-style', get_stylesheet_uri());
    wp_enqueue_style('wpog-plugins', get_template_directory_uri() . '/dist/css/plugins.css');
    wp_enqueue_style('wpog-main', get_template_directory_uri() . '/dist/css/main.css');
    wp_enqueue_style('wpog-customcss', get_template_directory_uri() . '/custom.css');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    wp_enqueue_script('wpog-js', get_template_directory_uri() . '/dist/js/all.min.js', " ", 1.0, true);
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
    if (!is_admin()) {

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
//add_image_size( 'cat-thumb', 300, 200, true );


/**
 *
 * Aktivacija THEME OPTIONS kroz ACF
 *
 */
if (function_exists('acf_add_options_page')) {

    $page = acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'position' => '999',
        'icon_url' => 'dashicons-index-card',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Sidebar Settings',
        'menu_title' => 'Sidebar',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Settings',
        'menu_title' => 'Footer',
        'parent_slug' => 'theme-general-settings',
    ));
}
