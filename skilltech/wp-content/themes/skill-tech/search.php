<?php get_header(); ?>


<div class="main-content">
   
    <section class="inner-header divider layer-overlay overlay-theme-colored-7" data-bg-img="<?php the_post_thumbnail_url(); ?>">
        <div class="container pt-120 pb-60">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-6">
                        <h2 class="text-theme-colored2 font-36">Search Certificates</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
                
    <div class="container mt-20">
          <?php dynamic_sidebar( 'search' ); ?>
        <table class="table table-bordered">
           <thead>
               <tr><td>Name</td><td>Roll No.</td><td>Certificate one</td><td>Certificate two</td></tr>
           </thead>
            <?php if (have_posts()) :
    while (have_posts()) :
    the_post(); ?>
    
        <tr>
            <td><b><?php the_title(); ?></b></td>
            <td><?php the_field('roll_number'); ?></td>
            <td>
                <a href="" data-toggle="modal" data-target="#certi1">
                    <img class="certificate" src="<?php the_field('certificate_1'); ?>" alt="">
                </a>
            </td>
            <td>
                <a href="" data-toggle="modal" data-target="#certi2"><img class="certificate" src="<?php the_field('certificate_2'); ?>" alt="">
                </a>
            </td>
        </tr>
        
        
        
    

    <?php
    endwhile;
            wp_reset_postdata();
    endif; ?>
       
       </table>
        
    </div>

    

</div>

<div class="modal fade" id="certi1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <img class="img-responsive" src="<?php the_field('certificate_1'); ?>" alt="">
            </div>
        </div>
        
        <div class="modal fade" id="certi2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <img class="img-responsive" src="<?php the_field('certificate_2'); ?>" alt="">
            </div>
        </div>




<?php get_footer(); ?>