<?php get_header(); ?>

<div class="page-content custom-background image-background light page-title page-title-clean page-title-6 page-title-centered mb-70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="triggerAnimation animated" data-animate="fadeInUp">Our Portfolio</h1>
                <h4 class="triggerAnimation animated" data-animate="fadeInUp">We have no philosophical statement to offer. We let our work speak for us.</h4>
            </div>
        </div>
    </div>
</div>

<div class="page-content light centered">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-md-12">
                <ul id="filters" class="button-group filters-button-group triggerAnimation animated" data-animate="fadeInUp">
					<li class="filter-button is-checked" data-filter="*">All</li>

                    <?php wp_list_categories( array(
                        'title_li' => '',
                        'walker' => new Custom_Walker_Category(),
                    ) ); ?>
                </ul>
            
            </div>
        </div>
    </div>
</div>

<div class="page-content light mb-70">
    <div class="container-fluid">
        <div class="row mb-0">
            <ul class="portfolio-masonry portfolio-hover portfolio-padding">
                <?php 
                    $portfolio = array( 'post_type' => 'portfolio', 'posts_per_page' => 20 );
                    $loop = new WP_Query( $portfolio );
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
                    <li class="portfolio-item col-md-4 col-sm-6 col-xs-12 isotope-item <?php echo $cls; ?> <?php the_field('double_width'); ?>">
                        <figure class="portfolio-item-container">
                            <div class="block-image">
                                <?php the_post_thumbnail(); ?>
                                <a href="<?php echo get_permalink(); ?>"><div class="mask" style="background-color:<?php the_field('hover_color'); ?>"></div></a>
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
                    
                   <?php endwhile;
                ?>
            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>