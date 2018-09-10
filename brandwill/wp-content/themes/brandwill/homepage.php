<?php
/**
 * Template Name: Home Page
 *
 */
?>
<?php get_header(); ?>


<!-- SLIDER -->
<div id="projects-masterslider" class="master-slider ms-skin-custom-style-1 bkg-transparent">
	<div class="open-thumbs-bar-button">
		<div class="thumbs-icon">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	
	<?php query_posts(array('post_type' => 'home_slider','orderby' => 'rand')); if(have_posts()) : while(have_posts()) : the_post();?>
		<div class="ms-slide pi-project-slide dark" style="background: <?php echo the_field('first_color'); ?>;">
	
			<div class="ms-thumb">
				
				<?php echo get_the_post_thumbnail($post->ID);  ?>
				<div class="thumbs-content">
					<h6><?php echo get_post_meta( $post->ID, 'client', true) ?></h6>
				</div>
			</div>
			<h1 class="ms-layer pi-mega-heading" 
				style="top: 405px; left: 50px;"
				data-type="text"
				data-effect="right(150)"
				data-duration="2000"
				data-ease="easeOutQuint"
				data-parallax="-4"
				data-delay="300"
				data-resize="false"
				>
				<?php echo the_field('category'); ?>
			</h1>
			<img class="ms-layer project-image" src="./masterslider/style/blank.gif" data-src="<?php echo get_the_post_thumbnail_url($post->ID);  ?>" alt="Restless - App Landing Page HTML Template"
			 style="right: 0; top: 40px;"
			 data-type="image"
			 data-effect="right(40)"
			 data-duration="2500"
			 data-ease="easeOutExpo"
			 data-parallax="20"
			 data-delay="0"
			 data-resize="false"
			 />
			 <h4 class="ms-layer pi-small-heading" 
				style="top: 460px; left: 70px;"
				data-type="text"
				data-effect="left(80)"
				data-duration="2000"
				data-ease="easeOutQuint"
				data-parallax="2"
				data-delay="500"
				data-resize="false"
				>
				<?php echo the_field('client'); ?>
			</h4>
			<h2 class="ms-layer pi-big-heading-02" 
				style="top: 500px; left: 70px;"
				data-type="text"
				data-effect="left(80)"
				data-duration="2000"
				data-ease="easeOutQuint"
				data-parallax="3"
				data-delay="700"
				data-resize="false"
				>
				<?php echo str_replace('|','<br />',get_the_title()); ?>
			</h2>
			<!-- slide text layer -->
			<p class="ms-layer pi-text"
			   style="top: 705px; left: 70px; width: 520px;"
			   data-type="text"
			   data-effect="left(80)"
			   data-duration="2000"
			   data-ease="easeOutQuint"
			   data-parallax="5"
			   data-delay="1000"
			   data-resize="false"
			   >
				<?php remove_filter ('the_content', 'wpautop'); the_content(); ?>
			</p>
			<!-- slide link -->
			<a href="<?php echo the_field('portfolio_link'); ?>" class="ms-layer pi-link"
			   style="top: 825px; left: 70px;"
			   data-type="text"
			   data-effect="left(80)"
			   data-duration="2000"
			   data-ease="easeOutQuint"
			   data-parallax="5"
			   data-delay="1200"
			   data-resize="false"
			   >
				Read More
			</a>
		</div>
	<?php endwhile; endif; wp_reset_query(); ?>


</div>
<!-- END SLIDER -->

<a href="#slide-to-section" class="btn-slide-down btn-slide-down-style-02 triggerAnimation animated centered fadeInDown" data-animate="fadeInDown">
    <span class="icon-container">
        <img src="<?php echo get_template_directory_uri(); ?>/img/svg/down-arrow02.svg" alt="Restless logo"/>
    </span>
</a>

<!-- WELCOME -->
<div id="slide-to-section" class="page-content custom-background color-background bkg-lightgrey pt-120 pb-120 mb-120">
    <div class="container">
        <div class="row mb-0">
            <div class="col-md-1 hidden-sm hidden-xs"></div>
            <div class="col-md-10 col-xs-12 mb-0 centered">
                <h4 class="heading-h4 h-serif-font"><?php the_field('welcome'); ?></h4>
            </div>
            <div class="col-md-1 hidden-sm hidden-xs"></div>
        </div>
    </div>
</div>
<!-- END WELCOME -->

<div class="page-content pb-120">
    <div class="container">
        <div class="row mb-0">
            <div class="row mb-70">
                <div class="col-md-12">
                    <div class="heading-subtitle-bottom h-center h-serif-font with-separator">
                        <h2><strong>FROM IDEA TO CODE</strong></h2>
                        <p>We produce high quality designs & light weight coded websites.</p>
                    </div>
                </div>
            </div>
            <div class="row mb-70">
                <div class="col-md-4">
                    <div class="service-box-icon icon-center icon-large triggerAnimation animated" data-animate="fadeInUp">
                        <div class="icon-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/svg/icon10.svg" class="svg-red  triggerAnimation animated" data-animate="zoomIn" alt="Restless icon"/>
                        </div>
                        <a href="#"><h3> profound research</h3></a>
                        <p>We’ll research your industry and find the best solution for your needs.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-box-icon icon-center icon-large triggerAnimation animated" data-animate="fadeInUp">
                        <div class="icon-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/svg/icon11.svg" class="svg-red  triggerAnimation animated" data-animate="zoomIn" alt="Restless icon"/>
                        </div>
                        <a href="#"><h3>quality design</h3></a>
                        <p>Clean and clear web, graphic and app design powered by UX best practices.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-box-icon icon-center icon-large triggerAnimation animated" data-animate="fadeInUp">
                        <div class="icon-container">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/svg/icon12.svg" class="svg-red  triggerAnimation animated" data-animate="zoomIn" alt="Restless icon"/>
                        </div>
                        <a href="#"><h3>lightweight code</h3></a>
                        <p>Clean and clear web, graphic and app design powered by UX best practices.</p>
                    </div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-12 h-center mb-0">
                    <a href="#" class="read-more">EXPLORE OUR SERVICES</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content custom-background image-background dark bkg-img12">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <blockquote class="blockquote-simple blockquote-left">
                    <p class="top-title">How we do it?</p>
                    <p>We create pleasurable user experience focusing on content that you can really use and which by the way looks amazing.</p>
                    <p class="cite">Jeffrey Collins, UX & Art Director</p>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<div class="page-content pt-120">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-subtitle-bottom h-center h-serif-font with-separator">
                    <h2><strong>SELECTED PROJECTS</strong></h2>
                    <p>We’ve done some amazing projects for some amazing clients</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content light container-no-padding mb-0">
    <div class="container-fluid">
        <div class="row mb-0">
            <ul class="portfolio-grid portfolio-hover">
                <?php
                    $portfolio = array( 'post_type' => 'portfolio', 'posts_per_page' => 9, 'post__not_in' => array(335, 176, 295, 171) );
                    $loop = new WP_Query( $portfolio );
                    while ($loop->have_posts()) : $loop->the_post(); ?>
                    
                    <li class="portfolio-item col-md-4 col-sm-6 col-xs-12">
                        <figure class="portfolio-item-container">
                            <div class="block-image">
                                <?php the_post_thumbnail(); ?>
                                <a href="<?php echo get_permalink(); ?>">
                                    <div class="mask" style="background-color:<?php the_field('hover_color'); ?>"></div>
                                    </a>
                            </div>
                            <figcaption>
                                <div class="block-tag"><?php the_category(); ?></div>
                                <a href="<?php echo get_permalink(); ?>" class="block-title"><?php the_title(); ?></a>
                                <a href="<?php echo get_permalink(); ?>" class="read-more-icon">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/img/svg/link-arrow-light.svg' ?>" alt=""/>
                                </a>
                            </figcaption>
                        </figure>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>

<div class="page-content custom-background color-background bkg-lightgrey pt-120 pb-120 mb-120">
    <div class="container">
        <div class="row mb-80">
            <div class="col-md-12">
                <div class="heading-subtitle-bottom h-center h-serif-font with-separator">
                    <h2><strong>MADE FOR REAL PEOPLE</strong></h2>
                    <p>Come and meet some of them & become one of them</p>
                </div>
            </div>
        </div>
        <div class="row mb-30">
           <div class="client-items">
            <?php
                $clients = array( 'post_type' => 'clients', 'posts_per_page' => 8, 'orderby' => 'date', 'order' => 'ASC' );
                $clientloop = new WP_Query( $clients );
                while ($clientloop->have_posts()) : $clientloop->the_post(); ?>
                    
                    
                        <div class="col-md-3 col-sm-6 mb-30">
                            <div class="client-item">
                                <a href="<?php the_field('clients_link'); ?>" target="_blank"><?php the_post_thumbnail(); ?></a>
                            </div>
                        </div>
                    
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<div class="page-content custom-background color-background pb-120 pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-subtitle-bottom h-center h-serif-font with-separator">
                    <h2><strong>BEHIND THE SCENES</strong></h2>
                    <p>We never stop learning, working, playing and having fun along the way</p>
                </div>
            </div>
        </div>
        <div class="row mb-80">
            <div class="col-md-12 mb-0">
                <ul class="latest-blog-posts blog-posts clearfix mb-0">
                    <?php
                    $query = new WP_Query( 'cat=-3,-8' );
                    while ($query->have_posts()) : $query->the_post(); ?>
                    
                    <li class="blog-post col-md-4 col-sm-4 col-xs-12 single-image-post">
                        <div class="blog-post-item-inner">
                            <div class="post-media">
                                <span class="post-media-overlay"></span>
                                <a href=""><?php the_post_thumbnail(); ?></a>
                                <div class="post-meta">
                                    <div class="post-share"><i class="fa fa-heart-o"></i>
                                        <a class="count" href="#">245</a>
                                    </div>
                                </div>
                            </div>
                            <article class="post-body">
                                <div class="post-date">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/img/svg/clock-icon.svg' ?>" alt=""><span><?php the_time('F j, Y'); ?></span>
                                </div>
                                <a href="<?php echo get_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                                <?php the_content( '[...]', TRUE ); ?>
                            </article>
                            <div class="post-footer">
                                <div class="post-author">
                                    <a href="#">
                                        <div class="post-author-thumbnail">
                                        <?php echo get_avatar( get_the_author_meta( 'ID' ) , 32 ); ?>
                                        </div>
                                        <p>by <?php the_author(); ?></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php endwhile; ?>
                </ul>
            </div>
        </div>
        <div class="row mb-0">
            <div class="col-md-12 mb-0">
                <div class="btn-wrapper btn-centered triggerAnimation animated" data-animate="fadeInUp">
                    <a href="<?php echo get_permalink(); ?>" class="btn btn-medium btn-white btn-dark-shadow">view more</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content custom-background image-background dark bkg-img13 pt-150 pb-150 centered">
    <div class="container">
        <div class="row mb-0">
            <div class="col-md-12 mb-0">
                <h3 class="heading-h3 h-serif-font mb-30 triggerAnimation animated" data-animate="fadeInUp">
                    Let’s create something amazing together
                </h3>
                <div class="btn-wrapper btn-center triggerAnimation animated" data-animate="fadeInUp">
                    <a href="#" class="btn btn-medium btn-dark-shadow">get in touch</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>


<script>
	/* <![CDATA[ */
	jQuery(document).ready(function($) {
		'use strict';

		// MASTER SLIDER START
		var slider = new MasterSlider();
		slider.setup('projects-masterslider', {
			width: 1920, // slider standard width
			height: 1080, // slider standard height
			space: 0,
			view: "basic",
			layout: "autofill",
			parallaxMode: "swipe",
			speed: 15,
			centerControls: false,
			loop: true,
			//instantStartLayers: true,
			autoplay: false
			// more slider options goes here...
			// check slider options section in documentation for more options.
		});
		// adds Arrows navigation control to the slider.
		slider.control('arrows', {
			autohide: false
		});
		slider.control('thumblist', {
			autohide: false,
			dir: 'v'
		});
		MSScrollParallax.setup(slider, 50, 80, true);

	});
	/* ]]> */
</script>