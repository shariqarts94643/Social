<?php
function skilltech_theme_scripts() {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
    wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.min.css' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css' );
    wp_enqueue_style( 'collections', get_template_directory_uri() . '/assets/css/css-plugin-collections.css' );
    wp_enqueue_style( 'menuzord', get_template_directory_uri() . '/assets/css/menuzord-megamenu.css' );
    wp_enqueue_style( 'menuzord-menu-skins', get_template_directory_uri() . '/assets/css/menuzord-skins/menuzord-boxed.css' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style-main.css' );
    wp_enqueue_style( 'preloader', get_template_directory_uri() . '/assets/css/preloader.css' );
    wp_enqueue_style( 'custom-bootstrap', get_template_directory_uri() . '/assets/css/custom-bootstrap-margin-padding.css' );
    wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css' );
    wp_enqueue_style( 'settings', get_template_directory_uri() . '/assets/js/revolution-slider/css/settings.css' );
    wp_enqueue_style( 'layers', get_template_directory_uri() . '/assets/js/revolution-slider/css/layers.css' );
    wp_enqueue_style( 'navigation', get_template_directory_uri() . '/assets/js/revolution-slider/css/navigation.css' );
    wp_enqueue_style( 'skin-color-set2', get_template_directory_uri() . '/assets/css/colors/theme-skin-color-set2.css' );
    
    /*wp_enqueue_style( 'utility', get_template_directory_uri() . '/assets/css/utility-classes.css' );
    wp_enqueue_style( 'awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
    wp_enqueue_style( 'awesome-animation', get_template_directory_uri() . '/assets/css/font-awesome-animation.min' ); */
    
    
    
    //JavaScripts
    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-2.2.4.min.js', array (), 1.1, false);
    wp_enqueue_script( 'jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array (), 1.1, false);
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array (), 1.1, false);
    wp_enqueue_script( 'collection', get_template_directory_uri() . '/assets/js/jquery-plugin-collection.js', array (), 1.1, false);
    
    wp_enqueue_script( 'tools', get_template_directory_uri() . '/assets/js/revolution-slider/js/jquery.themepunch.tools.min.js', array (), 1.1, false);
    wp_enqueue_script( 'revolution', get_template_directory_uri() . '/assets/js/revolution-slider/js/jquery.themepunch.revolution.min.js', array (), 1.1, false);
    
    wp_enqueue_script( 'html5shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js' );
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
    wp_enqueue_script( 'respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js' );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );
    
    
    if(is_page('coming-soon')) {
        wp_enqueue_style( 'classycountdown', get_template_directory_uri() . '/assets/js/classycountdown/css/jquery.classycountdown.css' );
        wp_enqueue_script( 'knob', get_template_directory_uri() . '/assets/js/classycountdown/js/jquery.knob.js', array (), 1.1, true);
        wp_enqueue_script( 'throttle', get_template_directory_uri() . '/assets/js/classycountdown/js/jquery.throttle.js', array (), 1.1, true);
        wp_enqueue_script( 'classycountdown', get_template_directory_uri() . '/assets/js/classycountdown/js/jquery.classycountdown.js', array (), 1.1, true);
        
    }
    
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array (), 1.1, true);
    
    if(is_page(home)) {
        wp_enqueue_script( 'actions', get_template_directory_uri() . '/assets/js/revolution-slider/js/extensions/revolution.extension.actions.min.js', array (), 1.1, true);
        wp_enqueue_script( 'carousel', get_template_directory_uri() . '/assets/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js', array (), 1.1, true);
        wp_enqueue_script( 'kenburn', get_template_directory_uri() . '/assets/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js', array (), 1.1, true);
        wp_enqueue_script( 'layeranimation', get_template_directory_uri() . '/assets/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js', array ( 'jquery' ), 1.1, true);
        wp_enqueue_script( 'migration', get_template_directory_uri() . '/assets/js/revolution-slider/js/extensions/revolution.extension.migration.min.js', array (), 1.1, true);
        wp_enqueue_script( 'navigation', get_template_directory_uri() . '/assets/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js', array (), 1.1, true);
        wp_enqueue_script( 'parallax', get_template_directory_uri() . '/assets/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js', array (), 1.1, true);
        wp_enqueue_script( 'slideanims', get_template_directory_uri() . '/assets/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js', array (), 1.1, true);
        wp_enqueue_script( 'revolution.extension.video', get_template_directory_uri() . '/assets/js/revolution-slider/js/extensions/revolution.extension.video.min.js', array (), 1.1, true);
    }
    
}
add_action( 'wp_enqueue_scripts', 'skilltech_theme_scripts' );