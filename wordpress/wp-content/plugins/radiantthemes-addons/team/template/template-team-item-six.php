<?php
/**
 * Template Style Six for Team
 *
 * @package RadiantThemes
 */

$output .= '<!-- team-item -->' . "\r";
$output .= '<div class="team-item matchHeight ' . $rt_animation . '" ' . $time . '>';
    $output .= '<div class="holder">';
        $output .= '<img src="' . plugins_url( 'radiantthemes-addons/team/images/blank-image-100x108.png' ) . '" alt="Blank Image" width="100" height="108">';
        $output .= '<div class="pic" style="background-image:url(' . get_the_post_thumbnail_url( get_the_ID(), 'large' ) . ');"></div>';
        if ( 'yes' === $shortcode['team_enable_link'] ) {
            $output .= '<a class="pic" href="' . get_the_permalink() . '">';
        } else {
            $output .= '<div class="data">';
        }
            $output .= '<div class="table">';
                $output .= '<div class="table-cell">';
                    $output .= '<p class="title">' . get_the_title() . '</p>';
                    $terms = get_the_terms( get_the_ID(), 'profession' );
                    if ( ! empty( $terms ) ) {
                    	foreach ( $terms as $term ) {
                    		$output .= '<p class="designation">' . $term->name . '</p>';
                    	}
                    }
                $output .= '</div>';
            $output .= '</div>';
        if ( 'yes' === $shortcode['team_enable_link'] ) {
            $output .= '</a>';
        } else {
            $output .= '</div>';
        }
    $output .= '</div>';
$output .= '</div>';
$output .= '<!-- team-item -->' . "\r";
