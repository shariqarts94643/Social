<?php
/**
 * Template Style Seven for Team
 *
 * @package RadiantThemes
 */

$output .= '<!-- team-item -->' . "\r";
$output .= '<div class="team-item matchHeight ' . $rt_animation . '" ' . $time . '>';
    $output .= '<div class="holder">';
        $output .= '<div class="pic">';
            $output .= '<img src="' . plugins_url( 'radiantthemes-addons/team/images/blank-image-100x138.png' ) . '" alt="Blank Image" width="100" height="138">';
            $output .= '<div class="pic-background"></div>';
            if ( 'yes' === $shortcode['team_enable_link'] ) {
                $output .= '<a class="pic-main" href="' . get_the_permalink() . '" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></a>';
            } else {
                $output .= '<div class="pic-main" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></div>';
            }
        $output .= '</div>';
        $output .= '<div class="data">';
            if ( 'yes' === $shortcode['team_enable_link'] ) {
                $output .= '<p class="title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></p>';
            } else {
                $output .= '<p class="title">' . get_the_title() . '</p>';
            }
            $terms = get_the_terms( get_the_ID(), 'profession' );
            if ( ! empty( $terms ) ) {
            	foreach ( $terms as $term ) {
            		$output .= '<p class="designation">' . $term->name . '</p>';
            	}
            }
        $output .= '</div>';
    $output .= '</div>';
$output .= '</div>';
$output .= '<!-- team-item -->' . "\r";
