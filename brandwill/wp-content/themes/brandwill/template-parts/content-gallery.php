<li class="blog-post col-lg-3 col-md-4 col-sm-6 col-xs-12 gallery-post isotope-item inspiration">
	<div class="blog-post-item-inner">
		<div class="post-media">
			<span class="post-media-overlay"></span>
			<div class="blog-post-gallery nivo-wrapper">
				<div id="blog-post-gallery" class="nivoSlider">
					
				</div>
			</div>
			<div class="post-meta">
				<div class="post-author">
					<a href="#">
						<div class="post-author-thumbnail">
							<?php echo get_avatar( get_the_author_meta( 'ID' ) , 37 ); ?>
						</div>
						<p>by <?php the_author(); ?></p>
					</a>
				</div>
				<div class="post-share">
					<i class="fa fa-heart-o"></i>
					<a class="count" href="#">245</a>
				</div>
			</div>
		</div>
		
		<article id="post-<?php the_ID(); ?>" class="post-body" <?php post_class(); ?>>
			
			<div class="post-date">
				<img src="<?php echo get_template_directory_uri() . '/img/svg/clock-icon.svg'; ?>" alt="posted date">
				<?php brandwill_posted_on(); ?>
			</div>

			<div class="post-audio-player-wrapper">
				<div class="audio-player">
					<div id="jquery_jplayer_1" class="jp-jplayer">
						<?php the_content(); ?>
					</div>
				</div>
			</div>

			<div class="post-date">
				<img src="<?php echo get_template_directory_uri() . '/img/svg/clock-icon.svg'; ?>" alt="posted date">
				<span><?php brandwill_posted_on(); ?></span>
			</div>

			<?php
		if ( is_singular() ) :
			the_title( '<h4>', '</h4>' );
		else :
			the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><h4>', '</h4></a>' );
		endif;
	?>

		</article>


		<div class="post-footer">
			<ul class="post-meta">
				<li class="post-tags">
					<img src="<?php echo get_template_directory_uri() . '/img/svg/tag-icon.svg' ?>" alt="Tag Icon">
					<?php the_tags(); ?>
				</li>
				<li class="post-comments">
					<img src="<?php echo get_template_directory_uri() . '/img/svg/comment-icon.svg' ?>" alt="Comment Icon">
					<?php the_comment(); ?>
				</li>
			</ul>

		</div>


	</div>

</li>