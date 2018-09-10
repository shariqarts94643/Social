<?php

@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
add_filter( 'posts_distinct', 'cf_search_distinct' );

if ( ! function_exists( 'skilltech_setup' ) ) :

function skilltech_setup() {
 
    add_theme_support( 'automatic-feed-links' );
 
    add_theme_support( 'post-thumbnails' );
    
    add_theme_support( 'html5', array( 'search-form' ) );
 
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'skilltech' ),
        'secondary' => __('Secondary Menu', 'skilltech' )
    ) );
 
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
}
endif; // myfirsttheme_setup
add_action( 'after_setup_theme', 'skilltech_setup' );

/** Style Enqueue **/
require get_template_directory() . '/inc/scripts.php';

function skilltech_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer One',
		'id'            => 'footer_1',
		'before_widget' => '<div class="widget dark">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title double-line-bottom-theme-colored-2">',
		'after_title'   => '</h4>',
	) );
    
    register_sidebar( array(
		'name'          => 'Footer Two',
		'id'            => 'footer_2',
		'before_widget' => '<div class="widget dark">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title line-bottom-theme-colored-2">',
		'after_title'   => '</h4>',
	) );
    
    register_sidebar( array(
		'name'          => 'Footer Three',
		'id'            => 'footer_3',
		'before_widget' => '<div class="widget dark">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title line-bottom-theme-colored-2">',
		'after_title'   => '</h4>',
	) );
    
    register_sidebar( array(
		'name'          => 'Footer Four',
		'id'            => 'footer_4',
		'before_widget' => '<div class="widget dark">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title line-bottom-theme-colored-2">',
		'after_title'   => '</h4>',
	) );
    
    register_sidebar( array(
		'name'          => 'Search',
		'id'            => 'search_widget',
		'before_widget' => '<div class="widget dark mt-20">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

}
add_action( 'widgets_init', 'skilltech_widgets_init' );

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
                $output .= "\t<a";
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


require get_template_directory() . '/inc/cpt.php';


add_filter( 'pre_get_posts', 'tgm_io_cpt_search' );
/**
 * This function modifies the main WordPress query to include an array of 
 * post types instead of the default 'post' post type.
 *
 * @param object $query  The original query.
 * @return object $query The amended query.
 */
function tgm_io_cpt_search( $query ) {
	
    if ( $query->is_search ) {
	$query->set( 'post_type', array( 'certificates' ) );
    }
    
    return $query;
    
}

/**
 * Extend WordPress search to include custom fields
 *
 * https://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}


