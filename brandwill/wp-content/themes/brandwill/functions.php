<?php
if ( ! function_exists( 'brandwill_setup' ) ) :
	function brandwill_setup() {
        
		//Make theme available for translation.
		load_theme_textdomain( 'brandwill', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		//Let WordPress manage the document title.
		add_theme_support( 'title-tag' );
		
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') );

		//Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'brandwill' ),
		) );

		//Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'brandwill_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		//Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'brandwill_setup' );

//Set the content width in pixels, based on the theme's design and stylesheet.
function brandwill_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'brandwill_content_width', 640 );
}
add_action( 'after_setup_theme', 'brandwill_content_width', 0 );

require get_template_directory() . '/inc/theme_widgets.php';

function posts_link_next_class($format){
     $format = str_replace('href=', 'class="portfolio-blog-nav-btn" href=', $format);
     return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
     $format = str_replace('href=', 'class="portfolio-blog-nav-btn" href=', $format);
     return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');


class Custom_Walker_Category extends Walker_Category {

    function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
                extract($args);
                $cat_name = esc_attr( $category->name );
                $cat_name = apply_filters( 'list_cats', $cat_name, $category );
                $link .= $cat_name;
                if ( !empty($feed_image) || !empty($feed) ) {
                        $link .= ' ';
                        if ( empty($feed_image) )
                                $link .= '(';
                        $link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $feed_type ) ) . '"';
                        if ( empty($feed) ) {
                                $alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
                        } else {
                                $title = ' title="' . $feed . '"';
                                $alt = ' alt="' . $feed . '"';
                                $name = $feed;
                                $link .= $title;
                        }
                        $link .= '>';
                        if ( empty($feed_image) )
                                $link .= $name;
                        else
                                $link .= "<img src='$feed_image'$alt$title" . ' />';
                        $link .= '</a>';
                        if ( empty($feed_image) )
                                $link .= ')';
                }
                if ( !empty($show_count) )
                        $link .= ' (' . intval($category->count) . ')';
                if ( 'list' == $args['style'] ) {
                        $output .= "\t<li";
                        $class = 'filter-button';


                        // YOUR CUSTOM CLASS
                        if ($depth)
                            $class .= ' sub-'.sanitize_title_with_dashes($category->name);


                        if ( !empty($current_category) ) {
                                $_current_category = get_term( $current_category, $category->taxonomy );
                                if ( $category->term_id == $current_category )
                                        $class .=  ' current-cat';
                                elseif ( $category->term_id == $_current_category->parent )
                                        $class .=  ' current-cat-parent';
                        }
                        $output .=  ' class="' . $class . '"' . ' data-filter="' . '.' . strtolower($category->name) . '"';
                        $output .= ">$link\n";
                } else {
                        $output .= "\t$link<br />\n";
                }
        } // function start_el

} // class Custom_Walker_Category

//Client Gallery
function my_gallery_shortcode( $attr ) {

    $post = get_post();
    if ( ! empty( $attr['ids'] ) ) {
        $attr['include'] = $attr['ids'];
    }

    extract( shortcode_atts( array(
        'order'      => 'ASC',
        'orderby'    => 'post__in',
        'id'         => $post->ID,
        'columns'    => 3,
        'size'       => 'large',
        'include'    => '',
    ), $attr));

    $id = (int) $id;
    $columns = (int) $columns;

    if ( 'RAND' == $order ) {
        $orderby = 'none';
    }

    if ( ! empty( $include ) ) {
        $_attachments = get_posts( array( 'include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if ( empty( $attachments ) ) {
        return '';
    }

    $output = '<div class="client-items">';

    foreach ( $attachments as $id => $attachment ) {
        $thumb = wp_get_attachment_image_src( $id, 'large', false );

        $output .= '<div class="col-md-3 col-sm-6 mb-30"><div class="client-item"><a href="#"><img src="' . $thumb[0] . '" width="' . $thumb[1] . '" height="' . $thumb[2] . '" alt="' . get_post_meta( $id, '_wp_attachment_image_alt', true ) . '" /></a></div></div>';
    }

    $output .= '</div>';
    return $output;
}
add_shortcode( 'gallery', 'my_gallery_shortcode' );


require get_template_directory() . '/inc/social_media.php';

require get_template_directory() . '/inc/scripts.php';

require get_template_directory() . '/inc/cpt.php';

//Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';

//Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

//Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

//Customizer additions.
require get_template_directory() . '/inc/customizer.php';

//Load Jetpack compatibility file.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Enable ACF 5 early access
 * Requires at least version ACF 4.4.12 to work
 */
define('ACF_EARLY_ACCESS', '5');
