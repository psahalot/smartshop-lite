<?php

$edds_options = get_option('SS_THEME_settings');

if (!defined('SS_THEME_DIR')) {
    define('SS_THEME_DIR', dirname(__FILE__));
}
if (!defined('SS_THEME_URL')) {
    define('SS_THEME_URL', get_template_directory_uri());
}

include(SS_THEME_DIR . '/includes/edd-config.php');


/* Include plugin activation file to install plugins */
include get_template_directory() . '/includes/plugin-activation/plugin-details.php';

// customizer addition
require get_template_directory() . '/includes/customizer.php';

if (!function_exists('smartshop_theme_setup')) {

    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     * If you're building a theme based on Tatva, use a find and replace
     * to change 'tatva' to the name of your theme in all the template files
     */
    load_theme_textdomain('smartshop', trailingslashit(get_template_directory_uri()) . 'languages');

    function smartshop_theme_setup() {
        // Set content width 
        if (!isset($content_width))
            $content_width = 716;

        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style();

        add_theme_support('automatic-feed-links');

        /*
         * This theme supports all available post formats by default.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
        ));


        // Enable support for Custom Backgrounds
        add_theme_support('custom-background', array(
            // Background color default
            'default-color' => '222',
            // Background image default
            'default-image' => '',
            'header-text' => 'true',
            'flex-height' => 'true',
            'flex-width' => 'true'
        ));


        // Enable support for Custom Headers (or in our case, a custom logo)
        add_theme_support('custom-header', array(
            // Header image default
            'default-image' => '',
            // Header text display default
            'header-text' => false,
            // Header text color default
            'default-text-color' => '000',
            // Flexible width
            'flex-width' => true,
            // Header image width (in pixels)
            'width' => 300,
            // Flexible height
            'flex-height' => true,
            // Header image height (in pixels)
            'height' => 80
        ));

        //adds post thumbnail support - new in Wordpress 2.9
        add_theme_support('post-thumbnails');

        set_post_thumbnail_size(716, 400, true); // default post thumbnail size
        add_image_size('product-image', 368, 200, true); // product thumbnail
        add_image_size('product-image-large', 716, 400, true); // main product image
        add_image_size('home-slider', 1140, 450, true); //home slider image size
        add_image_size('post-thumb', 220, 180, true); // custom thumbnail for post              
        
        // set up custom nav menus
        register_nav_menus( array( 'main_nav' => __('Main Navigation','smartshop') ));
        
    }

}
add_action('after_setup_theme', 'smartshop_theme_setup');

function smartshop_load_scripts() {

    if (is_singular()) {
        wp_enqueue_script('comment-reply');
    }
        wp_enqueue_script('smartshop-media-queries', SS_THEME_URL . '/assets/js/css3-mediaqueries.js');

        // Adds JavaScript for handling the navigation menu hide-and-show behavior.
        wp_enqueue_script('smartshop-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0', true);

        // styles
        wp_enqueue_style('smartshop-style', SS_THEME_URL . '/style.css');
}

add_action('wp_enqueue_scripts', 'smartshop_load_scripts');

add_action('wp_enqueue_scripts', 'smartshop_load_fonts');

function smartshop_load_fonts() {
    wp_enqueue_style('smartshop-google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,700');
    
    // Register and enqueue our icon font
    // We're using the awesome Font Awesome icon font. http://fortawesome.github.io/Font-Awesome
    wp_enqueue_style('font-awesome', trailingslashit(get_template_directory_uri()) . 'assets/css/font-awesome.min.css', array(), '4.0.3', 'all');
}

if (function_exists('register_sidebar')) {

    register_sidebars(1, array(
        'name' => __('Sidebar Right', 'smartshop'),
        'id' => 'sidebar_right',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>'
    ));

    register_sidebar(array(
        'name' => __('Shop Sidebar', 'smartshop'),
        'id' => 'sidebar_shop',
        'description' => esc_html__('Appears in the sidebar on shop/product pages.', 'smartshop'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));


    register_sidebar(array(
        'name' => __('Header Widget', 'smartshop'),
        'id' => 'header_widget',
        'before_title' => '<h3 class="widget_title">',
        'description' => esc_html__('Appears in the top right section of header', 'smartshop'),
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="header-widget %2$s">',
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => __('Home Featured', 'smartshop'),
        'id' => 'home-featured',
        'description' => esc_html__('Appears on the front page below navigation. Apt for adding featured slider', 'smartshop'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => __('Home CTA', 'smartshop'),
        'id' => 'home_cta',
        'description' => esc_html__('Appears on the front page above featured posts and products listing', 'smartshop'),
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="home-cta-widget %2$s">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name' => __('Home Sidebar', 'smartshop'),
        'id' => 'home_sidebar',
        'description' => esc_html__('Appears on the right of featured posts on front page', 'smartshop'),
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>'
    ));

    register_sidebar(array(
        'name' => __('Home #1', 'smartshop'),
        'id' => 'home_one',
        'description' => esc_html__('Appears below the front page featured widget area.', 'smartshop'),
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="home-widget %2$s">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name' => __('Home #2', 'smartshop'),
        'id' => 'home_two',
        'description' => esc_html__('Appears below the front page featured widget area.', 'smartshop'),
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="home-widget %2$s">',
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => __('Home #3', 'smartshop'),
        'id' => 'home_three',
        'description' => esc_html__('Appears below the front page featured widget area.', 'smartshop'),
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="home-widget %2$s">',
        'after_widget' => '</div>'
    ));

    register_sidebars(1, array(
        'name' => __('Footer #1', 'smartshop'),
        'id' => 'footer_one',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>'
    ));
    register_sidebars(1, array(
        'name' => __('Footer #2', 'smartshop'),
        'id' => 'footer_two',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s"class="widget %2$s">',
        'after_widget' => '</div>'
    ));
    register_sidebars(1, array(
        'name' => __('Footer #3', 'smartshop'),
        'id' => 'footer_three',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>'
    ));
}

function smartshop_excerpt_length($length) {
    if (is_archive() || is_front_page()) {
        return 15;
    } else {
        return 50;
    }
}

add_filter('excerpt_length', 'smartshop_excerpt_length', 999);

function smartshop_excerpt_more($more) {
    if (is_front_page()) {
        return '...';
    } else {
        return ' <a class="read-more" href="' . get_permalink(get_the_ID()) . '">' . __('Read More', 'smartshop') . '</a>';
    }
}

add_filter('excerpt_more', 'smartshop_excerpt_more');
