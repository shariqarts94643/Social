<?php
/**
 * Template for Blog Item Eleven.
 *
 * @package RadiantThemes
 */

$output .= '<article class="blog-item ' . $rt_animation . '" ' . $time . '>';
$output .= '<div class="holder matchHeight">';
$output .= '<div class="data">';
$output .= '<p class="date">' . get_the_date() . '</p>';
$output .= '<h4><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
$output .= '<p>' . wp_trim_words( get_the_excerpt(), 20, '...' ) . '</p>';
$output .= '</div>';
$output .= '<div class="author">';
$output .= '<div class="author-thumbnail">';
$output .= get_avatar( get_the_author_meta( 'email' ), '150' );
$output .= '</div>';
$output .= '<p>' . esc_html__( 'By', 'radiantthemes-addons' ) . ' ' . get_the_author_link() . '</p>';
$output .= '</div>';
$output .= '</div>';
$output .= '</article>';
