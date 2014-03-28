<?php

if(!function_exists('edds_load_scripts')) {
	function edds_load_scripts() {
	
		// scripts
		wp_enqueue_script('jquery');
		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );		
		wp_enqueue_script('scripts', SS_THEME_URL . '/js/css3-mediaqueries.js');
		
		// Adds JavaScript for handling the navigation menu hide-and-show behavior.
		wp_enqueue_script( 'smartshop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );
	
		// styles
		wp_enqueue_style('styles', SS_THEME_URL . '/style.css');
		
	}
}
add_action('wp_enqueue_scripts', 'edds_load_scripts');