<?php
/*
==========================================
SOCIAL MEDIA
==========================================
*/
function ct_brandwill_social_array() {

	$social_sites = array(
		'twitter'       => 'brandwill_twitter_profile',
		'facebook'      => 'brandwill_facebook_profile',
		'google-plus'   => 'brandwill_googleplus_profile',
		'linkedin'      => 'brandwill_linkedin_profile',
		'youtube'       => 'brandwill_youtube_profile',
		'vimeo'         => 'brandwill_vimeo_profile',
		'instagram'     => 'brandwill_instagram_profile',
		'behance'       => 'brandwill_behance_profile'
	);

	return apply_filters( 'ct_brandwill_social_array_filter', $social_sites );
}
function my_add_customizer_sections( $wp_customize ) {

	$social_sites = ct_brandwill_social_array();

	// set a priority used to order the social sites
	$priority = 5;

	// section
	$wp_customize->add_section( 'ct_brandwill_social_media_icons', array(
		'title'       => __( 'Social Media Icons', 'brandwill' ),
		'priority'    => 25,
		'description' => __( 'Add the URL for each of your social profiles.', 'brandwill' )
	) );

	// create a setting and control for each social site
	foreach ( $social_sites as $social_site => $value ) {

		$label = ucfirst( $social_site );

		if ( $social_site == 'google-plus' ) {
			$label = 'Google Plus';
		} elseif ( $social_site == 'rss' ) {
			$label = 'RSS';
		} elseif ( $social_site == 'soundcloud' ) {
			$label = 'SoundCloud';
		} elseif ( $social_site == 'slideshare' ) {
			$label = 'SlideShare';
		} elseif ( $social_site == 'codepen' ) {
			$label = 'CodePen';
		} elseif ( $social_site == 'stumbleupon' ) {
			$label = 'StumbleUpon';
		} elseif ( $social_site == 'deviantart' ) {
			$label = 'DeviantArt';
		} elseif ( $social_site == 'hacker-news' ) {
			$label = 'Hacker News';
		} elseif ( $social_site == 'whatsapp' ) {
			$label = 'WhatsApp';
		} elseif ( $social_site == 'qq' ) {
			$label = 'QQ';
		} elseif ( $social_site == 'vk' ) {
			$label = 'VK';
		} elseif ( $social_site == 'wechat' ) {
				$label = 'WeChat';
		} elseif ( $social_site == 'tencent-weibo' ) {
			$label = 'Tencent Weibo';
		} elseif ( $social_site == 'paypal' ) {
			$label = 'PayPal';
		} elseif ( $social_site == 'email-form' ) {
			$label = 'Contact Form';
		}
		// setting
		$wp_customize->add_setting( $social_site, array(
			'sanitize_callback' => 'esc_url_raw'
		) );
		// control
		$wp_customize->add_control( $social_site, array(
			'type'     => 'url',
			'label'    => $label,
			'section'  => 'ct_brandwill_social_media_icons',
			'priority' => $priority
		) );
		// increment the priority for next site
		$priority = $priority + 5;
	}
}
add_action( 'customize_register', 'my_add_customizer_sections' );


function my_social_icons_output() {
	$social_sites = ct_brandwill_social_array();
	foreach ( $social_sites as $social_site => $profile ) {
		if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
			$active_sites[ $social_site ] = $social_site;
		}
	}

	if ( ! empty( $active_sites ) ) {
		echo '<ul class="social-links social-square-icons social-dark outlined-dark align-left social-small social-no-shadow natural-hover">';
		foreach ( $active_sites as $key => $active_site ) { 
		$class = 'fa fa-' . $active_site; ?>
		<li>
		<a class="<?php echo esc_attr( $active_site ); ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $key ) ); ?>">
		<i class="<?php echo esc_attr( $class ); ?>" title="<?php echo esc_attr( $active_site ); ?>"></i>
		</a>
		</li>
		<?php } 
		echo "</ul>";
	}
} 