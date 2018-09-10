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

        