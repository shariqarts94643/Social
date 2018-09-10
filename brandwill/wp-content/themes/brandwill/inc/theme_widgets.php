<?php 

//Register widget area.
function brandwill_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Social', 'brandwill' ),
		'id'            => 'social',
		'description'   => esc_html__( 'Add widgets here.', 'brandwill' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'brandwill' ),
		'id'            => 'footer_1',
		'description'   => esc_html__( 'Add widgets here.', 'brandwill' ),
		'before_widget' => '<li id="%1$s" class="widget widget-text">',
		'after_widget'  => '</li>',
		'before_title'  => '<div class="title hide"><h3>',
		'after_title'   => '</h3></div>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'brandwill' ),
		'id'            => 'footer_2',
		'description'   => esc_html__( 'Add widgets here.', 'brandwill' ),
		'before_widget' => '<li id="%1$s" class="widget widget-text">',
		'after_widget'  => '</li>',
		'before_title'  => '<div class="title"><h3>',
		'after_title'   => '</h3></div>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'brandwill' ),
		'id'            => 'footer_3',
		'description'   => esc_html__( 'Add widgets here.', 'brandwill' ),
		'before_widget' => '<li id="%1$s" class="widget widget-text">',
		'after_widget'  => '</li>',
		'before_title'  => '<div class="title"><h3>',
		'after_title'   => '</h3></div>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Four', 'brandwill' ),
		'id'            => 'footer_4',
		'description'   => esc_html__( 'Add widgets here.', 'brandwill' ),
		'before_widget' => '<li id="%1$s" class="widget widget_newsletterwidget clearfix">',
		'after_widget'  => '</li>',
		'before_title'  => '<div class="title"><h3>',
		'after_title'   => '</h3></div>',
	) );
}
add_action( 'widgets_init', 'brandwill_widgets_init' );