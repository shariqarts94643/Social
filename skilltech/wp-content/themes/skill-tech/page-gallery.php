<?php
/**
 * Template Name: Gallery Page
 */

get_header(); ?>

    <!-- Start main-content -->
    <div class="main-content">
        
        <?php

        if (have_posts()) :
           while (have_posts()) :
              the_post(); ?>
                
                <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="<?php the_post_thumbnail_url(); ?>">
                    <div class="container pt-120 pb-60">
                        <div class="section-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2 class="text-theme-colored2 font-36"><?php the_title(); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
        
        <?php   endwhile;
        endif;

        ?>

        

<!-- Section: Gallery -->
<section>
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portfolio-filter">
                        <a href="#" class="active" data-filter="*">All</a>
                        <?php wp_list_categories( array(
                            'title_li' => '',
                            'walker' => new Custom_Walker_Category(),
                        ) ); ?>
                    </div>
                    <!-- End Gallery Filter -->
                    
                    <!-- Portfolio Gallery Grid -->
                    <div id="grid" class="gallery-isotope default-animation-effect grid-3 gutter clearfix">
                        <!-- Portfolio Item Start -->
                        <?php
                        $gallery = array( 'post_type' => 'gallery', 'posts_per_page' => 10 );
                        $loop = new WP_Query( $gallery ); 
                        while ($loop->have_posts()) : $loop->the_post(); ?>
                           <?php
                                $categories = get_the_category();
                                $cls = '';

                                if ( ! empty( $categories ) ) {
                                  foreach ( $categories as $cat ) {
                                    $cls .= $cat->slug . ' ';
                                  }
                                }
                                ?>
                            <div class="gallery-item <?php echo $cls; ?>">
                                <div class="thumb">
                                    <?php the_post_thumbnail('full', array('class' => 'img-fullwidth')); ?>
                                    <div class="overlay-shade"></div>
                                    <div class="icons-holder">
                                        <div class="icons-holder-inner">
                                            <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                                                <a data-lightbox="image" href="<?php the_post_thumbnail_url(); ?>"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

       
    </div>

    <?php get_footer(); ?>