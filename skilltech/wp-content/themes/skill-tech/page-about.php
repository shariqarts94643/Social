<?php
/**
 * Template Name: About Page
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
        
<!-- Section About -->
<section>
    <div class="container pt-70 pb-40">
        <div class="section-title">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-uppercase mt-0">About <span class="text-theme-colored2">Skill Tech</span></h3>
                    <div class="double-line-bottom-theme-colored-2"></div>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

        



       
    </div>

    <?php get_footer(); ?>