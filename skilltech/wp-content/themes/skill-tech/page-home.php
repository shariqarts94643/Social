<?php
/**
 * Template Name: Home Page
 */
?>
    <?php define( 'WP_USE_THEMES', false ); get_header(); ?>


    <!-- Start main-content -->
    <div class="main-content">

        <!-- Section: home -->
        <section id="home">
            <div class="container-fluid p-0">

                <?php include('inc/home_slider.php'); ?>

            </div>
        </section>

        <!-- Divider: Call To Action -->
        <section class="layer-overlay overlay-theme-colored2-9 border-bottom">
            <div class="container pt-20 pb-5">
                <div class="row">
                    <div class="call-to-action">

                        <?php the_field('reservation_form'); ?>

                    </div>
                </div>
            </div>
        </section>

        <!-- Section: About -->
        <section id="about">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-uppercase text-gray-darkgray mb-15">In 2016 We Start Our Journey</h5>
                            <div class="double-line-bottom-theme-colored-2"></div>
                            <h3 class="font-weight-500 font-30 font- mt-10">SkillTech Computer And Coaching Institute</h3>
                            <p>
                                <?php the_field('about_text'); ?>
                            </p>
                            <div><a href="#" class="btn btn-theme-colored mb-sm-30 mt-10">Read More</a></div>
                        </div>
                        <div class="col-md-6">
                            <div class="box-hover-effect about-video">
                                <div class="effect-wrapper">
                                    <div class="thumb">
                                        <img class="img-responsive img-fullwidth" src="<?php echo the_field('video_poster') ?>" alt="">
                                    </div>
                                    <div class="video-button"></div>
                                    <a class="hover-link" data-lightbox-gallery="youtube-video" href="<?php the_field('home_page_video'); ?>" title="Youtube Video">Youtube Video</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Section: Courses -->
        <section id="courses" class="bg-silver-deep">
            <div class="container pb-40">
                <div class="section-title">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-uppercase title">Popular <span class="text-theme-colored2">Courses</span></h2>
                            <p class="text-uppercase mb-0">Choose Your Desired Course</p>
                            <div class="double-line-bottom-theme-colored-2"></div>
                        </div>
                    </div>
                </div>

                <div class="row mtli-row-clearfix">
                    <div class="owl-carousel-3col owl-carousel owl-theme owl-loaded owl-drag" data-nav="true">
                        <?php query_posts(array('post_type' => 'skilltech_courses','orderby' => 'rand')); if(have_posts()) : while(have_posts()) : the_post();?>
                        <div class="item">
                            <div class="course-single-item bg-white border-1px clearfix mb-30">
                                <div class="course-thumb">
                                    <?php the_post_thumbnail('full', array('class' => 'img-fullwidth')); ?>
                                </div>
                                <div class="course-details clearfix p-20 pt-15">
                                    <div class="course-top-part pull-left mr-40">
                                        <a href="">
                                            <h4 class="mt-0 mb-10">
                                                <?php the_title(); ?>
                                            </h4>
                                        </a>
                                    </div>
                                    <div class="clearfix"></div>
                                    <p class="course-description mt-10">
                                        <?php the_content(); ?>
                                    </p>
                                    <ul class="list-inline course-meta mt-15">
                                        <li>
                                            <h6><?php the_field('course_duration'); ?></h6>
                                            <span> Course</span>
                                        </li>
                                        <li>
                                            <h6><?php the_field('class_size'); ?></h6>
                                            <span> Class Size</span>
                                        </li>
                                        <li>
                                            <h6><span class="course-time"><?php the_field('class_duration'); ?></span></h6>
                                            <span> Class Duration</span>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- Divider: Why Choose Us -->
        <section>
            <div class="container pt-30 pb-0">
                <div class="row">
                    <div class="col-md-5">
                        <img class="img-fullwidth" src="<?php the_field('why_choose_us_photo'); ?>">
                    </div>
                    <div class="col-md-7 pt-20">
                        <div class="row mtli-row-clearfix">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h2>Why <span class="text-theme-colored2">Choose</span> Us?</h2>
                                <div class="double-line-bottom-theme-colored-2 mb-30"></div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="icon-box left media p-0 mb-40">
                                    <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-note2 text-theme-colored2 font-weight-600"></i></a>
                                    <div class="media-body">
                                        <h4 class="media-heading heading mb-10">
                                            <?php the_field('heading_one'); ?>
                                        </h4>
                                        <p>
                                            <?php the_field('body_one'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="icon-box left media p-0 mb-40">
                                    <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-notebook text-theme-colored2 font-weight-600"></i></a>
                                    <div class="media-body">
                                        <h4 class="media-heading heading mb-10">
                                            <?php the_field('heading_two'); ?>
                                        </h4>
                                        <p>
                                            <?php the_field('body_two'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="icon-box left media p-0 mb-40">
                                    <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-diamond text-theme-colored2 font-weight-600"></i></a>
                                    <div class="media-body">
                                        <h4 class="media-heading heading mb-10">
                                            <?php the_field('heading_three'); ?>
                                        </h4>
                                        <p>
                                            <?php the_field('body_three'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="icon-box left media p-0 mb-40">
                                    <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-bell text-theme-colored2 font-weight-600"></i></a>
                                    <div class="media-body">
                                        <h4 class="media-heading heading mb-10">
                                            <?php the_field('heading_four'); ?>
                                        </h4>
                                        <p>
                                            <?php the_field('body_four'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="icon-box left media p-0 mb-40">
                                    <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-musiclist text-theme-colored2 font-weight-600"></i></a>
                                    <div class="media-body">
                                        <h4 class="media-heading heading mb-10">
                                            <?php the_field('heading_five'); ?>
                                        </h4>
                                        <p>
                                            <?php the_field('body_five'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="icon-box left media p-0 mb-40">
                                    <a class="media-left pull-left flip mr-20" href="#"><i class="pe-7s-global text-theme-colored2 font-weight-600"></i></a>
                                    <div class="media-body">
                                        <h4 class="media-heading heading mb-10">
                                            <?php the_field('heading_six'); ?>
                                        </h4>
                                        <p>
                                            <?php the_field('body_six'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section: Team -->
        <section id="team" class="bg-silver-deep">
            <div class="container pb-40">
                <div class="section-title">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-uppercase title">Qualified <span class="text-theme-colored2">Teachers</span></h2>
                            <p class="text-uppercase mb-0">We Have Highly Qualified Teachers</p>
                            <div class="double-line-bottom-theme-colored-2"></div>
                        </div>
                    </div>
                </div>

                <div class="row mtli-row-clearfix">
                   <div class="owl-carousel-4col owl-carousel owl-theme owl-loaded owl-drag" data-nav="true">
                       <?php query_posts(array('post_type' => 'teachers','orderby' => 'rand')); if(have_posts()) : while(have_posts()) : the_post();?>
                           <div class="item">
                               <div class="">
                                   <div class="team-members border-bottom-theme-colored2px text-center maxwidth400 mb-30">
                                       <div class="team-thumb">
                                           <?php the_post_thumbnail('full', array('class' => 'img-fullwidth')); ?>
                                           <div class="team-overlay"></div>
                                           <ul class="styled-icons team-social icon-sm">
                                                <li><a target="_blank" href="<?php the_field('teacher_email'); ?>"><i class="fa fa-envelope"></i></a></li>
                                                <li><a target="_blank" href="<?php the_field('teacher_facebook'); ?>"><i class="fa fa-facebook"></i></a></li>
                                                <li><a target="_blank" href="<?php the_field('teacher_instagram'); ?>"><i class="fa fa-instagram"></i></a></li>
                                                <li><a target="_blank" href="<?php the_field('teacher_skype'); ?>"><i class="fa fa-skype"></i></a></li>
                                            </ul>
                                       </div>
                                       <div class="team-details">
                                            <h4 class="text-uppercase text-theme-colored font-weight-600 m-5">
                                                <?php the_title(); ?>
                                            </h4>
                                            <h6 class="text-gray font-13 font-weight-400 line-bottom-centered mt-0">
                                                <?php the_field('teachers_position'); ?>
                                            </h6>
                                            <p class="hidden-md">
                                                <?php the_field('teacher_intro'); ?>
                                            </p>
                                        </div>
                                   </div>
                               </div>
                           </div>
                       <?php endwhile; endif; ?>
                   </div>
                </div>

            </div>
        </section>

        <!-- Section: Gallery -->
        <section id="gallery">
            <div class="container">

                <div class="section-title">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-uppercase title">Campus <span class="text-theme-colored2">Gallery</span></h2>
                            <p class="text-uppercase mb-0">See our gallery pictures</p>
                            <div class="double-line-bottom-theme-colored-2"></div>
                        </div>
                    </div>
                </div>

                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Works Filter -->
                            <div class="portfolio-filter font-alt align-center">
                                <a href="#" class="active" data-filter="*">All</a>
                                <?php wp_list_categories( array(
                                'title_li' => '',
                                'walker' => new Custom_Walker_Category(),
                            ) ); ?>
                            </div>
                            <!-- Portfolio Gallery Grid -->
                            <div id="grid" class="gallery-isotope default-animation-effect grid-4 gutter clearfix">
                                <?php
                            $gallery = array( 'post_type' => 'gallery', 'posts_per_page' => 12 );
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
                                                        <div class="styled-icons icon-sm icon-bordered icon-circled icon-theme-colored2">
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

        <!--start Funfacts Section-->
        <section class="parallax layer-overlay overlay-theme-colored-9" data-bg-img="<?php echo get_stylesheet_directory_uri() . '/assets/images/bg/bg1.jpg' ?>" data-parallax-ratio="0.4">
            <div class="container pt-70 pb-90">
                <div class="section-content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                            <div class="funfact text-center">
                                <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="5100" data-theme="minimal">0</div>
                                <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
                                <h5 class="text-white text-uppercase mb-0">Happy Students</h5>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                            <div class="funfact text-center">
                                <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="200" data-theme="minimal">0</div>
                                <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
                                <h5 class="text-white text-uppercase mb-0">Approved Courses</h5>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
                            <div class="funfact text-center">
                                <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="20" data-theme="minimal">0</div>
                                <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
                                <h5 class="text-white text-uppercase mb-0">Certified Teachers</h5>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-3 mb-md-0">
                            <div class="funfact text-center">
                                <div class="odometer-animate-number text-white font-weight-600 font-48" data-value="5" data-theme="minimal">0</div>
                                <div class="double-line-bottom-centered-theme-colored-2 mt-0 mb-25"></div>
                                <h5 class="text-white text-uppercase mb-0">Our Branches</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Divider: Testimonials -->
        <section class="bg-silver-deep">
            <div class="container pt-70 pb-30">
                <div class="section-title">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-uppercase title">What <span class="text-theme-colored2">People </span>Say</h2>
                            <p class="text-uppercase mb-0">Student and Parents Opinion</p>
                            <div class="double-line-bottom-theme-colored-2"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-30">
                            <div class="owl-carousel-2col boxed" data-dots="true">
                                <?php
                            $testimonial = array( 'post_type' => 'testimonial', 'posts_per_page' => 12 );
                            $loop = new WP_Query( $testimonial ); 
                            while ($loop->have_posts()) : $loop->the_post(); ?>

                                    <div class="item">
                                        <div class="testimonial pt-10">
                                            <div class="thumb pull-left mb-0 mr-0">
                                                <?php the_post_thumbnail('full', array('class' => 'img-thumbnail img-circle')); ?>
                                            </div>
                                            <div class="testimonial-content">
                                                <h4 class="mt-0 font-weight-300">
                                                    <?php the_content(); ?>
                                                </h4>
                                                <h5 class="mt-10 font-16 mb-0">
                                                    <?php the_title(); ?>
                                                </h5>
                                                <h6 class="mt-5">
                                                    <?php the_field('testimonial_position'); ?>
                                                </h6>
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


        <!-- Section: blog -->
        <section id="blog">
            <div class="container pb-40">
                <div class="section-title">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="text-uppercase title">Latest <span class="text-theme-colored2">News </span></h2>
                            <p class="text-uppercase mb-0">See All Time Latest News</p>
                            <div class="double-line-bottom-theme-colored-2"></div>
                        </div>
                    </div>
                </div>

                <div class="section-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="owl-demo" class="owl-carousel owl-carousel-3col owl-nav-top" data-nav="true">
                                <?php
                            $events = new WP_Query(array('post_type' => 'post'));
                            if ($events->have_posts()) {
                              while ($events->have_posts()) {
                                $events->the_post(); ?>

                                    <div class="item">
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
                                                            <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="#"><?php the_title(); ?></a></h4>
                                                            <ul class="list-inline">
                                                                <li><i class="fa fa-user-o mr-5 text-theme-colored2"></i>By <?php the_author(); ?></li>
                                                                <li><i class="fa fa-thumbs-o-up mr-5 text-theme-colored2"></i>Likes</li>
                                                                <li><i class="fa fa-share-alt mr-5 text-theme-colored2"></i> 895 Likes</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="mt-5"><?php the_content(); ?></p>
                                                <a class="btn btn-default btn-flat font-12 mt-10 ml-5" href="blog-single-left-sidebar.html"> View Details</a>
                                            </div>
                                            
                                        </article>
                                    </div>




                            
                            <?php   
                              }
                            }
                            ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

    </div>
    <?php get_footer(); ?>