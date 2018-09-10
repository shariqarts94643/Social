<?php get_header(); ?>

    <div class="page-content custom-background dark image-background page-title page-title-clean page-title-22 page-title-centered" style="background-image: url('<?php echo the_field('header_image'); ?>');">
      
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   
                    <?php
                        while ( have_posts() ) : the_post(); ?>
                           
                            <h1 class="triggerAnimation animated" data-animate="fadeInUp">
                            <?php the_title(); ?></h1>
                            <h4 class="triggerAnimation animated" data-animate="fadeInUp"><?php the_excerpt(); ?></h4>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-content">
        <div class="container">
            <div class="row mb-110">
                <div class="col-md-8">
                    <?php the_content(); ?>
                </div>
                <div class="col-md-4">
                    <ul class="details-list">
                        <li>
                            <h5>Client</h5>
                            <p><?php the_field('client'); ?></p>
                        </li>
                        <li>
                            <h5>type of work</h5>
                            <p><?php the_field('type_of_work'); ?></p>
                        </li>
                        <li>
                            <h5>Date</h5>
                            <p><?php the_field('date'); ?></p>
                        </li>    
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-content mb-30">
        <div class="container">
            <div class="row mb-30">
                <ul class="vertical-stack-gallery">
                    <?php
                        //Get the images ids from the post_metadata
                        $images = acf_photo_gallery('gallery', $post->ID);
                        //Check if return array has anything in it
                        if(count($images)) :
                            //Cool, we got some data so now let's loop over it
                            foreach($images as $image) :
                                $id = $image['id']; // The attachment id of the media
                                $title = $image['title']; //The title
                                $caption= $image['caption']; //The caption
                                $full_image_url= $image['full_image_url'];
                                $thumbnail_image_url= $image['thumbnail_image_url'];
                                $url= $image['url']; //Goto any link when clicked
                                $target= $image['target']; //Open normal or new tab
                                $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
                                $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
                                ?>
                                <li class="triggerAnimation animated" data-animate="fadeIn">
                                    <?php if( !empty($url) ){ ?><a href="<?php echo $url; ?>" <?php echo ($target == 'true' )? 'target="_blank"': ''; ?>><?php } ?>
                                    <img src="<?php echo $full_image_url; ?>" alt="<?php echo $title; ?>" title="<?php echo $title; ?>">
                                    <?php if( !empty($url) ){ ?></a><?php } ?>
                                </li>

                            <?php endforeach; endif; ?>
					<li class="triggerAnimation animated" data-animate="fadeIn"><?php the_field('video'); ?></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="page-content portfolio-blog-nav-hover mb-0">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-md-4 col-sm-4 col-xs-12 portfolio-blog-nav-btn-wrapper nav-prev">
                    <?php previous_post_link('%link', '<div clsss="portfolio-blog-nav-btn-inner"><span>Prev project</span><p>%title</p></div>'); ?>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 portfolio-blog-nav-btn-wrapper nav-back">
                    <a class="portfolio-blog-nav-btn" href="<?php echo home_url('portfolio') ?>">
                        <div class="portfolio-blog-nav-btn-inner">
                            <span>Back to all projects</span>
                            <p>Come and see the wonder</p>
                        </div>
                    </a>

                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 portfolio-blog-nav-btn-wrapper nav-next">
                    <?php next_post_link('%link', '<div clsss="portfolio-blog-nav-btn-inner"><span>Next project</span><p>%title</p></div>'); ?>
                </div>
            </div>
        </div>
    </div>
    
    
     <?php
    
        


        endwhile; // End of the loop.
        ?>
        
<?php get_footer(); ?>
