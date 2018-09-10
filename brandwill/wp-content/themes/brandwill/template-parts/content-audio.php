<li class="blog-post col-lg-3 col-md-4 col-sm-6 col-xs-12 audio-post isotope-item tuts development">
	<div class="blog-post-item-inner">
		<article id="post-<?php the_ID(); ?>" class="post-body" <?php post_class(); ?>>

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