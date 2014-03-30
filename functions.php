<?php

$edds_options = get_option('SS_THEME_settings');

if (!defined('SS_THEME_DIR')) {
    define('SS_THEME_DIR', dirname(__FILE__));
}
if (!defined('SS_THEME_URL')) {
    define('SS_THEME_URL', get_template_directory_uri());
}


// extra theme files
include(SS_THEME_DIR . '/includes/scripts.php');
include(SS_THEME_DIR . '/includes/edd-config.php');


/* Include plugin activation file to install plugins */
include get_template_directory() . '/includes/plugin-activation/plugin-details.php';

// customizer addition
require get_template_directory() . '/includes/customizer.php';

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

if (function_exists('register_sidebar')) {

    register_sidebars(1, array(
        'name' => 'Sidebar Right',
        'id' => 'sidebar_right',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>'
    ));

    register_sidebar(array(
        'name' => 'Shop Sidebar',
        'id' => 'sidebar_shop',
        'description' => esc_html__('Appears in the sidebar on shops except the optional Front Page template, which has its own widgets', 'quark'),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));


    register_sidebar(array(
        'name' => 'Header Widget',
        'id' => 'header_widget',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="header-widget %2$s">',
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => 'Home Featured',
        'id' => 'home-featured',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>'
    ));
    register_sidebar(array(
        'name' => 'Home CTA',
        'id' => 'home_cta',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="home-cta-widget %2$s">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name' => 'Home Sidebar',
        'id' => 'home_sidebar',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>'
    ));

    register_sidebar(array(
        'name' => 'Home #1',
        'id' => 'home_one',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="home-widget %2$s">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name' => 'Home #2',
        'id' => 'home_two',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="home-widget %2$s">',
        'after_widget' => '</div>'
    ));
    register_sidebar(array(
        'name' => 'Home #3',
        'id' => 'home_three',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="home-widget %2$s">',
        'after_widget' => '</div>'
    ));

    register_sidebars(1, array(
        'name' => 'Footer #1',
        'id' => 'footer_one',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>'
    ));
    register_sidebars(1, array(
        'name' => 'Footer #2',
        'id' => 'footer_two',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s"class="widget %2$s">',
        'after_widget' => '</div>'
    ));
    register_sidebars(1, array(
        'name' => 'Footer #3',
        'id' => 'footer_three',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>'
    ));
}

// set up custom nav menus
if (function_exists('register_nav_menus')) {
    register_nav_menus(
            array(
                'main_nav' => 'Main Nav',
            )
    );
}

//adds post thumbnail support - new in Wordpress 2.9
add_theme_support('post-thumbnails');

if (!function_exists('smartshop_image_sizes')) {

    function smartshop_image_sizes() {
        set_post_thumbnail_size(716, 400, true); // default post thumbnail size
        add_image_size('product-image', 368, 200, true); // product thumbnail
        add_image_size('product-image-large', 716, 400, true); // main product image
        add_image_size('home-slider', 1140, 450, true); //home slider image size
        add_image_size('post-thumb', 220, 180, true); // custom thumbnail for post
    }

}
add_action('init', 'smartshop_image_sizes');

add_action('wp_enqueue_scripts', 'smartshop_load_fonts');

function smartshop_load_fonts() {
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Open+Sans:300,700|Merriweather:300,700');


    // Register and enqueue our icon font
    // We're using the awesome Font Awesome icon font. http://fortawesome.github.io/Font-Awesome
    wp_register_style('fontawesome', trailingslashit(get_template_directory_uri()) . 'css/font-awesome.min.css', array(), '4.0.3', 'all');
    wp_enqueue_style('fontawesome');
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
        return ' <a class="read-more" href="' . get_permalink(get_the_ID()) . '">Read More</a>';
    }
}
add_filter('excerpt_more', 'smartshop   _excerpt_more');