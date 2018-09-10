<?php

/**
 * Enqueue scripts and styles.
 */
function brandwill_scripts() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('bootstrap-theme', get_template_directory_uri() . '/bootstrap/css/bootstrap-theme.min.css');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome-4.6.3/css/font-awesome.min.css' );
    wp_enqueue_style('color-olive', get_template_directory_uri() . '/css/color-olive.css');
    wp_enqueue_style('color-turquoise', get_template_directory_uri() . '/css/color-turquoise.css');
    wp_enqueue_style('retina', get_template_directory_uri() . '/css/retina.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style('colors-header', get_template_directory_uri() . '/css/colors-header.css');
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/fonts/font-awesome-4.6.3/css/font-awesome.min.css');
    wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,700%7CPlayfair+Display:400,700&subset=latin,latin-ext');
    //Masterslider
    wp_enqueue_style('masterslider', get_template_directory_uri() . '/masterslider/style/masterslider.css');
    wp_enqueue_style('masterslider-skins', get_template_directory_uri() . '/css/masterslider-skins/ms-skin-custom-style-1.css');
    
    wp_enqueue_style('fatNav', get_template_directory_uri() . '/css/jquery.fatNav.min.css');
    //Menu Style
	
	//Portfolio
	if ( is_page_template('page-portfolio.php') ) {
		wp_enqueue_style('magnific', get_template_directory_uri() . '/css/magnific-popup.css');
	}
    
	
    wp_enqueue_style('multi-level-menu', get_template_directory_uri() . '/css/multi-level-menu.css');
	
    //Main Stylesheet
    wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css');
   
   
    //JavaScripts
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-2.1.4.min.js', array(), '', true );
    
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '', true );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/jquery.scripts.min.js', array('jquery'), '', true );
	
	//Home Page
    if ( is_page_template('homepage.php') ) {
        wp_enqueue_style('odometer', get_template_directory_uri() . '/css/odometer.min.css');
        wp_enqueue_script( 'masterslider', get_template_directory_uri() . '/masterslider/masterslider.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'easing', get_template_directory_uri() . '/masterslider/jquery.easing.min.js', array('jquery'), '', true );
        wp_enqueue_script( 'odometer', get_template_directory_uri() . '/js/odometer.min.js', array('jquery'), '', true );
    }
	
	//Portfolio
	if ( is_page('portfolio') ) {
		wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '', true );
		wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '', true );
		wp_enqueue_script( 'magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array(), '', true );
	}
	
	//Contact Page
	if ( is_page('contact') ) {
		wp_enqueue_script( 'googleApi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBab2pn0CAnxWmLaaHiVvRTHGzeEk_bQBw&callback=initMap', array('jquery'), '', true );
		wp_enqueue_script( 'fatNav', get_template_directory_uri() . '/js/jquery.fatNav.js', array('jquery'), '', true );
		wp_enqueue_script( 'ui-map', get_template_directory_uri() . '/js/jquery.ui.map.full.min.js', array('jquery'), '', true );
	}
	
	
	wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js', array('jquery'), '', true );
    wp_enqueue_script( 'multi-level-menu', get_template_directory_uri() . '/js/multi-level-menu.js', array('jquery'), '', true );
    wp_enqueue_script( 'retina', get_template_directory_uri() . '/js/jquery-retina.js', array('jquery'), '', true );
    wp_enqueue_script( 'volcanno', get_template_directory_uri() . '/js/volcanno.include.js', array(), '', true );
    
    

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'brandwill_scripts' );
