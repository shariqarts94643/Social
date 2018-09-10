<?php

//Home Slider
function custom_home_slider() {

	$labels = array(
		'name'                  => _x( 'Home Slider', 'Post Type General Name'),
		'singular_name'         => _x( 'Home Slide', 'Post Type Singular Name'),
		'menu_name'             => __( 'Home Slider', 'admin_menu' ),
		'name_admin_bar'        => __( 'Home Slide', 'add new on admin_menu' ),
		'add_new'               => __( 'Add New', 'Slide' ),
        'add_new_item'          => __( 'Name' ),
        'new_item'              => __( 'New Slide' ),
        'edit_item'             => __( 'Edit Slide' ),
		'view_item'             => __( 'View Slide' ),
        'all_items'             => __( 'All Slides'),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Slide:'),
        'not_found'             => __( 'No Slide found.' ),
        'not_found_in_trash'    => __( 'No Slide found in Trash.' ),
	);
	$args = array(
		'labels'                => $labels,
        'menu_icon'	            => 'dashicons-slides',
		'description'           => __( 'Description.'),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => true,
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => true,
        'menu_position'      => null,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		
	);
	register_post_type( 'home_slider', $args );

}
add_action( 'init', 'custom_home_slider');

//Portfolio
function custom_portfolio() {

	$labels = array(
		'name'                  => _x( 'Portfolio', 'Post Type General Name'),
		'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name'),
		'menu_name'             => __( 'Portfolio', 'admin_menu' ),
		'name_admin_bar'        => __( 'Portfolio', 'add new on admin_menu' ),
		'add_new'               => __( 'Add New', 'Slide' ),
        'add_new_item'          => __( 'Name' ),
        'new_item'              => __( 'New Slide' ),
        'edit_item'             => __( 'Edit Portfolio' ),
		'view_item'             => __( 'View Portfolio' ),
        'all_items'             => __( 'All Portfolio'),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Slide:'),
        'not_found'             => __( 'No Slide found.' ),
        'not_found_in_trash'    => __( 'No Slide found in Trash.' ),
	);
	$args = array(
		'labels'                => $labels,
        'menu_icon'	            => 'dashicons-star-half',
		'description'           => __( 'Description.'),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => true,
        'capability_type'       => 'post',
        'has_archive'           => false,
        'hierarchical'          => true,
        'menu_position'      => null,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		
	);
	register_post_type( 'portfolio', $args );
	flush_rewrite_rules();

}
add_action( 'init', 'custom_portfolio');

//Services
function custom_services() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name'),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name'),
		'menu_name'             => __( 'Services', 'admin_menu' ),
		'name_admin_bar'        => __( 'Services', 'add new on admin_menu' ),
		'add_new'               => __( 'Add New', 'Service' ),
        'add_new_item'          => __( 'Name' ),
        'new_item'              => __( 'New Service' ),
        'edit_item'             => __( 'Edit Services' ),
		'view_item'             => __( 'View Services' ),
        'all_items'             => __( 'All Services'),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Slide:'),
        'not_found'             => __( 'No Service found.' ),
        'not_found_in_trash'    => __( 'No Service found in Trash.' ),
	);
	$args = array(
		'labels'                => $labels,
        'menu_icon'	            => 'dashicons-admin-generic',
		'description'           => __( 'Description.'),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => true,
        'capability_type'       => 'post',
        'has_archive'           => false,
        'hierarchical'          => true,
        'menu_position'      => null,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		
	);
	register_post_type( 'services', $args );
	flush_rewrite_rules();

}
add_action( 'init', 'custom_services');


//Clients
function custom_clients() {

	$labels = array(
		'name'                  => _x( 'Clients', 'Post Type General Name'),
		'singular_name'         => _x( 'Client', 'Post Type Singular Name'),
		'menu_name'             => __( 'Clients', 'admin_menu' ),
		'name_admin_bar'        => __( 'Clients', 'add new on admin_menu' ),
		'add_new'               => __( 'Add New', 'Client' ),
        'add_new_item'          => __( 'Name' ),
        'new_item'              => __( 'New Client' ),
        'edit_item'             => __( 'Edit Clients' ),
		'view_item'             => __( 'View Clients' ),
        'all_items'             => __( 'All Clients'),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Slide:'),
        'not_found'             => __( 'No Service found.' ),
        'not_found_in_trash'    => __( 'No Service found in Trash.' ),
	);
	$args = array(
		'labels'                => $labels,
        'menu_icon'	            => 'dashicons-products',
		'description'           => __( 'Description.'),
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => true,
        'capability_type'       => 'post',
        'has_archive'           => false,
        'hierarchical'          => true,
        'menu_position'      => null,
		'supports'              => array( 'title', 'thumbnail', ),
		
	);
	register_post_type( 'clients', $args );
	flush_rewrite_rules();

}
add_action( 'init', 'custom_clients');