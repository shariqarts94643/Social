<?php
// Register Custom Post Type
function course_post_type() {
    register_post_type( 'skilltech_courses',
    array(
      'labels' => array(
        'name' => __( 'Courses' ),
        'singular_name' => __( 'Course' )
      ),
        'public'            => true,
        'has_archive'       => true,
        'featured_image'    => true,
        'supports' => array('title','editor','author','thumbnail','excerpt')
    )
    );
    
    //Home Slider
    register_post_type( 'home_slider',
    array(
      'labels' => array(
        'name' => __( 'Home Slider' ),
        'singular_name' => __( 'Slider' )
      ),
        'public'            => true,
        'has_archive'       => true,
        'featured_image'    => true,
        'supports' => array('title','editor', 'thumbnail')
    )
  );
    
    //Gallery
    register_post_type( 'gallery',
    array(
      'labels' => array(
        'name' => __( 'Gallery' ),
        'singular_name' => __( 'Photo' )
      ),
        'public'            => true,
        'has_archive'       => true,
        'featured_image'    => true,
        'supports' => array('title','editor', 'thumbnail'),
        'taxonomies'          => array( 'category' ),
    )
  );
    
    //Teachers
    register_post_type( 'teachers',
    array(
      'labels' => array(
        'name' => __( 'Teachers' ),
        'singular_name' => __( 'Teacher' )
      ),
        'public'            => true,
        'has_archive'       => true,
        'featured_image'    => true,
        'supports' => array('title','editor', 'thumbnail')
    )
  );
    
    //Testimonial
    register_post_type( 'testimonial',
    array(
      'labels' => array(
        'name' => __( 'Testimonial' ),
        'singular_name' => __( 'Testimonial' )
      ),
        'public'            => true,
        'has_archive'       => true,
        'featured_image'    => true,
        'supports' => array('title','editor', 'thumbnail')
    )
  );

    //Certificates
    register_post_type( 'certificates',
    array(
      'labels' => array(
        'name' => __( 'Certificates' ),
        'singular_name' => __( 'Certificates' )
      ),
        'public'            => true,
        'publicly_queryable' => true,
        'query_var' => true,
        'has_archive'       => true,
        'featured_image'    => true,
        'supports' => array('title')
    )
  );
}
add_action( 'init', 'course_post_type' );


