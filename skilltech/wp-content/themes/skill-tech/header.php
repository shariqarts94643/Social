<!doctype html>
<html <?php language_attributes(); ?>>

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        <?php wp_title( '|', true, 'right' ); ?>
    </title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div id="wrapper" class="clearfix">

        <!-- preloader -->
        <div id="preloader">
            <div id="spinner">
                <img alt="" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/preloaders/5.gif' ?>">
            </div>
            <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
        </div>

        <!-- Header -->
        <header id="header" class="header">

            <div class="header-top bg-theme-colored2 sm-text-center hidden-xs hidden-sm">
                <div class="container">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="widget text-white">
                                <ul class="list-inline xs-text-center text-white">
                                    <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-phone text-white"></i> +91 9888844355</a> </li>
                                    <li class="m-0 pl-10 pr-10">
                                        <a href="#" class="text-white"><i class="fa fa-envelope-o text-white mr-5"></i> skilltechstudy@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-4 pr-0">
                            <div class="widget">
                                <ul class="styled-icons icon-sm pull-right flip sm-pull-none sm-text-center mt-5">
                                    <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <ul class="list-inline sm-pull-none sm-text-center text-right text-white mb-sm-20 mt-10">
                                <li class="m-0 pl-10"> <a href="ajax-load/login-form.html" class="text-white ajaxload-popup"><i class="fa fa-user-o mr-5 text-white"></i> Login /</a> </li>
                                <li class="m-0 pl-0 pr-10">
                                    <a href="ajax-load/register-form.html" class="text-white ajaxload-popup"><i class="fa fa-edit mr-5"></i>Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-nav">
                <div class="header-nav-wrapper navbar-scrolltofixed bg-white nav-lg">
                    <div class="container">
                        <nav id="menuzord-right" class="menuzord default no-bg">
                           <a class="showhide" onclick="myMenu()"><em></em><em></em><em></em></a>
                            <a class="menuzord-brand switchable-logo pull-left flip" href="#">
                        <img class="logo-default" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo-wide.png'; ?>" alt="">
                        <img class="logo-scrolled-to-fixed" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/logo-wide.png'; ?>" alt="">
                        </a>

                            <?php
                        wp_nav_menu( array( 
                            'theme_location' => 'primary', 
                            'container_class' => 'custom-menu-class',
                            'menu_class'        =>  'menuzord-menu menuzord-right menuzord-indented scrollable'
                        ) ); 
                        ?>

                        </nav>
                    </div>
                </div>
            </div>

        </header>

        