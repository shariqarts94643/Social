<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brandwill
 */

?>


    
    <div class="container-fluid">
       
        <div class="row mb-30">
          
            <ul id="blog-masonry" class="blog-posts">
               
                <li class="blog-post col-lg-3 col-md-4 col-sm-6 col-xs-12 single-image-post isotope-item design-ux">
                    <div class="blog-post-item-inner">
                       
                        <div class="post-media">
                            <span class="post-media-overlay"></span>
                            <a href="#"> <?php brandwill_post_thumbnail(); ?></a>
                            <div class="post-meta">
                                <div class="post-author">
                                    <a href="#">
                                        <div class="post-author-thumbnail">
                                            <?php echo get_avatar( get_the_author_meta( 'ID' ) , 37 ); ?>
                                        </div>
                                        <p>by <?php the_author(); ?></p>
                                    </a>
                                </div>
                                <div class="post-share">
                                    <i class="fa fa-heart-o"></i>
                                    <a class="count" href="#">245</a>
                                </div>
                                
                            </div>
                            
                        </div><!-- .post-media end -->
                        
                        <article class="post-body">
                            <div class="post-date">
                                <img src="<?php echo get_template_directory_uri() . '/img/svg/clock-icon.svg'; ?>" alt="posted date">
                                <?php brandwill_posted_on(); ?>
                            </div>
                            <?php
                                if ( is_singular() ) :
                                    the_title( '<h4>', '</h4>' );
                                else :
                                    the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h4>', '</h4></a>' );
                                endif;
                            ?>
                            <?php
                                the_content( sprintf(
                                    wp_kses(
                                        /* translators: %s: Name of current post. Only visible to screen readers */
                                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'brandwill' ),
                                        array(
                                            'span' => array(
                                                'class' => array(),
                                            ),
                                        )
                                    ),
                                    get_the_title()
                                ) );

                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'brandwill' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                        </article>
                        <div class="post-footer">
                            <?php brandwill_entry_footer(); ?>
                        </div>
                        
                        <header class="entry-header">
		
        <?php 

		if ( 'post' === get_post_type() ) : ?>
		<?php
		endif; ?>
	</header><!-- .entry-header -->

           

            <div class="entry-content">
                
            </div><!-- .entry-content -->

                    </div>
                    
                    
                    
                    
                </li>
                
                
            
                
            </ul>
           

        </div><!-- end row -->
        
    </div><!-- end container-fluid -->
