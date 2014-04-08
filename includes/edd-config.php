<?php
// Easy Digital Downloads specific settings / functions
if( function_exists('edd_get_settings') ) {
	
	/************************************************
	* Constants
	************************************************/	
	
	// use this to set the slug to something other than "downloads"
	//define('EDD_SLUG', 'products');	
	
	// set this to TRUE in order to disable the "download" post type archive
	//define('EDD_DISABLE_ARCHIVE', true);	
	
	/************************************************
	* Post Type Labels
	************************************************/
	
	function edds_set_download_labels($labels) {
		$labels = array(
			'name' => _x('Products', 'post type general name', 'smartshop'),
			'singular_name' => _x('Product', 'post type singular name', 'smartshop'),
			'add_new' => __('Add New', 'smartshop'),
			'add_new_item' => __('Add New Product', 'smartshop'),
			'edit_item' => __('Edit Product', 'smartshop'),
			'new_item' => __('New Product', 'smartshop'),
			'all_items' => __('All Products', 'smartshop'),
			'view_item' => __('View Product', 'smartshop'),
			'search_items' => __('Search Products', 'smartshop'),
			'not_found' =>  __('No Products found', 'smartshop'),
			'not_found_in_trash' => __('No Products found in Trash', 'smartshop'), 
			'parent_item_colon' => '',
			'menu_name' => __('Products', 'smartshop')
		);
		return $labels;
	}
	// uncomment the following line to enable the labels above
	//add_filter('edd_download_labels', 'edds_set_download_labels');
	
	/************************************************
	* Taxonomy Labels
	************************************************/
	
	function edds_set_category_labels($labels) {
		$labels = array(
			'name' => _x( 'Types', 'taxonomy general name', 'smartshop' ),
			'singular_name' => _x( 'Type', 'taxonomy singular name', 'smartshop' ),
			'search_items' =>  __( 'Search Types', 'smartshop'  ),
			'all_items' => __( 'All Types', 'smartshop'  ),
			'parent_item' => __( 'Parent Type', 'smartshop'  ),
			'parent_item_colon' => __( 'Parent Type:', 'smartshop'  ),
			'edit_item' => __( 'Edit Type', 'smartshop'  ), 
			'update_item' => __( 'Update Type', 'smartshop'  ),
			'add_new_item' => __( 'Add New Type', 'smartshop'  ),
			'new_item_name' => __( 'New Type', 'smartshop'  ),
			'menu_name' => __( 'Types', 'smartshop'  ),
		);
		return $labels;
	}
	// uncomment the following line to enable the labels above
	//add_filter('edd_download_category_labels', 'edds_set_category_labels');
	
	function edds_set_tag_labels($labels) {
		$labels = array(
			'name' => _x( 'Features', 'taxonomy general name', 'smartshop' ),
			'singular_name' => _x( 'Feature', 'taxonomy singular name', 'smartshop' ),
			'search_items' =>  __( 'Search Features', 'smartshop'  ),
			'all_items' => __( 'All Features', 'smartshop'  ),
			'parent_item' => __( 'Parent Feature', 'smartshop'  ),
			'parent_item_colon' => __( 'Parent Feature:', 'smartshop'  ),
			'edit_item' => __( 'Edit Feature', 'smartshop'  ), 
			'update_item' => __( 'Update Feature', 'smartshop'  ),
			'add_new_item' => __( 'Add New Feature', 'smartshop'  ),
			'new_item_name' => __( 'New Feature', 'smartshop'  ),
			'menu_name' => __( 'Features', 'smartshop'  ),
		);
		return $labels;
	}
	// uncomment the following line to enable the labels above
	//add_filter('edd_download_tag_labels', 'edds_set_tag_labels');
	
	/************************************************
	* Post Type Support Options (extras)
	************************************************/	
	
	// add comment support to products
	function edds_set_edd_product_supports($supports) {
		$supports[] = 'comments';
		return $supports;	
	}
	add_filter('edd_download_supports', 'edds_set_edd_product_supports');
	
	/************************************************
	* Scripts
	************************************************/	
	
	// uncomment the following line to remove and deactivate all styling included with EDD
	//remove_action('wp_enqueue_scripts', 'edd_register_styles');
	
	/************************************************
	* Misc
	************************************************/	
	
	// remove the automatic purchase link
	remove_filter('the_content', 'edd_append_purchase_link');
}
?>