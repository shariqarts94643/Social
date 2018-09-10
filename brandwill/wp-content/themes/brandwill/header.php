<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div  id="left_menu" class="header-wrapper left-menu dark custom-background color-background bkg-darkgrey-3 off">
        <header id="header">
            <div class="main-nav">
               
                <nav class="navbar navbar-default nav-left">
                   
                    <div class="left-menu-top-content">
                        <div class="navbar-header">
                            <div class="logo">
                                <?php
                                    if ( function_exists( 'the_custom_logo' ) ) {
                                        the_custom_logo();
                                    }
                                ?>
                            </div>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                    </div>
                    
                    <div class="menu-container">
                        <div id="ml-menu" class="menu">
                            <div class="menu__wrap">
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'menu-1',
                                        'menu_class'        =>  'menu__level',
                                        'container'         => 'ul',
                                        'items_wrap'        =>  '<ul class="%2$s" data-menu="main">%3$s</ul>'
                                    ) );
                                ?>
                            </div>
                        </div>
                    </div>
                    
                 </nav>
                 
                 <div class="menu-footer">
                   
                   
				<?php
					
					 echo my_social_icons_output();
				?>
                    <!-- .social-links start 
                    <ul class="social-links social-square-icons social-dark outlined-dark align-left social-small social-no-shadow natural-hover">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
                    </ul>-->
                    <p><?php echo '©' . ' ' . date("Y",strtotime("-1 year")) . '-' . date("Y"); ?> <br />Brandwill. All rights reserved.</p>
                </div>
                

            </div><!-- .site-branding -->

        </header><!-- #masthead -->

    </div>
    
    <button id="menuBtn" type="button" onclick="toggleChevron(this)" class="btn btn-default" data-toggle="left_menu">
        <span class="glyphicon glyphicon-menu-hamburger"></span>
    </button>

    
	
	<div id="content" class="content-wrapper off">
