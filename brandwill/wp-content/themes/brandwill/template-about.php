<?php
/**
 * Template Name: About Page
 *
 */
?>
<?php get_header(); ?>
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	echo '<div class="page-content custom-background image-background dark page-title page-title-fullscreen page-title-12 page-title-centered mb-120" style="background-image: url('. $url.');">';
?>
	<div class="intro-hero-overlay"></div>
	<div class="page-title-container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 mb-0">
					<div class="heading-subtitle-bottom h-serif-font h-center with-separator">
						<h1><?php the_post_thumbnail_caption(); ?></h1>
						<p><?php echo get_post(get_post_thumbnail_id())->post_title; ?></p>
					</div>
				</div>
				<a href="#slide-to-section" class="btn-slide-down triggerAnimation animated centered fadeInDown" data-animate="fadeInDown">
					<span class="icon-container">
						<img src="<?php echo get_template_directory_uri() . '/img/svg/down-arrow.svg' ?>" alt="">
					</span>
				</a>
			</div>
		</div>
	</div>
</div>

<div id="slide-to-section" class="page-content">
	<div class="container">
		<div class="row mb-80">
			<div class="col-md-12">
				<div class="heading-subtitle-bottom h-center h-serif-font with-separator">
					<?php
						if(have_posts()) {
							while(have_posts()) {
								the_post();
								the_content();
							}
						}
					?>
				</div>
			</div>
		</div>
		<div class="row mb-80">
			<div class="col-md-6 mb-0">
				<p><?php the_field('left-column'); ?></p>
			</div>
			<div class="col-md-6 mb-0">
				<p><?php the_field('right-column'); ?></p>
			</div>
		</div>
	</div>
</div>

<div class="page-content custom-background image-background dark bkg-img17 pt-120 pb-120 mb-120">
	<div class="container">
		<div class="row mb-0">
			<div class="col-md-8 col-sm-12 mb-0">
				<blockquote class="blockquote-simple blockquote-left">
					<p class="top-title">How we do it?</p>
					<?php the_field('quote'); ?>
				</blockquote>
			</div>
		</div>
	</div>
</div>

<div class="page-content custom-background color-background bkg-white mb-120 pt-0">
	<div class="container">
		<div class="row mb-80">
			<div class="col-md-12">
				<div class="heading-subtitle-bottom h-center h-serif-font with-separator">
					<h2 class="triggerAnimation animated" data-animate="fadeInUp"><strong>OUR PROUD AND GLORY</strong></h2>
					<p class="triggerAnimation animated" data-animate="fadeInUp">We worked for some amazing clients. Become one of them!</p>
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
		<div class="row mb-0">
			<div class="col-md-12 mb-0">
				<div class="btn-wrapper btn-centered triggerAnimation animated" data-animate="fadeInUp" style="opacity: 1;">
					<a href="#" class="btn btn-white btn-dark-shadow">let’s work together</a>
				</div>
			</div>
		</div>
	</div>
</div>



<?php get_footer(); ?>

