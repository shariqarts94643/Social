<?php get_header(); ?>

<div class="main-content">
    
   
            
            <section>
                <div class="container pt-70 pb-40">
                    <div class="section-content">
                        <div class="row multi-row-clearfix">
                            
                             <?php
                                if (have_posts()) :
                                    while (have_posts()) : the_post(); ?>
                            <div class="col-sm-6 col-md-4">
                                <article class="post clearfix mb-30">
                                    <div class="entry-header">
                                        <div class="post-thumb thumb">
                                            <?php the_post_thumbnail('full', array('class' => 'img-responsive img-fullwidth')); ?>
                                        </div>
                                        <div class="entry-date media-left text-center flip bg-theme-colored border-top-theme-colored2-3px pt-5 pr-15 pb-5 pl-15">
                                            <ul>
                                                <li class="font-16 text-white font-weight-600">28</li>
                                                <li class="font-12 text-white text-uppercase">Feb</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="entry-content p-15">
                                        <div class="entry-meta media no-bg no-border mt-0 mb-10">
                                            <div class="media-body pl-0">
                                                <div class="event-content pull-left flip">
                                                    <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h4>
                                                    <ul class="list-inline">
                                                        <li><i class="fa fa-user-o mr-5 text-theme-colored2"></i>By <?php the_author(); ?></li>
                                                        <li><i class="fa fa-thumbs-o-up mr-5 text-theme-colored2"></i>Likes</li>
                                                        <li><i class="fa fa-share-alt mr-5 text-theme-colored2"></i> 895 Likes</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-5"><?php the_content(); ?></p>
                                        <a class="btn btn-default btn-flat font-12 mt-10 ml-5" href="<?php echo esc_url(get_permalink()); ?>"> View Details</a>

                                    </div>
                                </article>
                            </div>
                            <?php endwhile; endif; ?>
                            
                        </div>
                    </div>
                </div>
            </section>
            
        
    
</div>

                            
<?php get_footer(); ?>