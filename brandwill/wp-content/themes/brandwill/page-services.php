<?php get_header(); ?>


<div class="page-content custom-background image-background light page-title page-title-clean page-title-6 page-title-centered mb-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="triggerAnimation animated" data-animate="fadeInUp">OUR SERVICES</h1>
                <h4 class="triggerAnimation animated" data-animate="fadeInUp">Digital is everybody’s job But we have dedicated specialists.</h4>
            </div>
        </div>
    </div>
</div>


<?php 
$photoalign = the_field('photo_alignment');
$services = array( 'post_type' => 'services' );
$loop = new WP_Query( $services );
while ($loop->have_posts()) : $loop->the_post(); ?>

<div class="page-content custom-background column-img-bkg fullscreen-section pt-0">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-sm-12 col-xs-12 mb-0 full-height-column <?php the_field('photo_alignment'); ?>" style="background-image: url('<?php  echo get_the_post_thumbnail_url(); ?>'); background-size: cover;"></div>
			<div class="col-md-6 col-sm-12 col-xs-12 mb-0 custom-col-padding-both vertical-centered-container">
				<div class="vertical-centered">
					<div class="heading-h1 h-serif-font mb-60 triggerAnimation animated" data-animate="fadeInUp"> 
						<h1><?php the_title(); ?></h1>
					</div>
					<div class="triggerAnimation animated" data-animate="fadeInUp"><?php the_content(); ?></div>
					<a href="<?php the_field('post_link'); ?>" class="read-more link-with-icon triggerAnimation animated fadeInUp" data-animate="fadeInUp">
						<div class="icon-container">
							<img class="svg-turquoise" src="<?php echo get_stylesheet_directory_uri() . '/img/svg/next-arrow-dark.svg' ?>" alt="Restless icon">
						</div>
						<span><?php the_field('link_text'); ?></span>
					</a>


				</div>
			</div>
		</div>
	</div>
</div>


<?php endwhile; ?>

<div class="page-content custom-background color-background bkg-lightgrey pt-120 pb-120 centered">
    <div class="container">
        <div class="row mb-0">
            <div class="col-md-12">
                <div class="heading-subtitle-bottom h-center h-serif-font with-separator mb-80">
                    <h2><strong>Like what you see?<br>Let’s work together!</strong></h2>
                </div>
                <div class="btn-wrapper btn-center triggerAnimation animated fadeInUp mt-" data-animate="fadeInUp" style="opacity: 1;">
                    <a href="#" class="btn btn-medium btn-dark-shadow">get in touch</a>
                </div>
            </div>
        </div>
    </div>
</div>


	<?php get_footer(); ?>