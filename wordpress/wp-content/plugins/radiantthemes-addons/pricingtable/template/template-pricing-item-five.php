<?php
/**
 * Template Style Five Pricing Table
 *
 * @package RadiantThemes
 */

$output .= '<div class="holder">';
if ( $shortcode['pricing_table_image'] !== '' ) {
    $output .= '<div class="icon">';
    $output .= wp_get_attachment_image( $shortcode['pricing_table_image'], 'full' );
    $output .= '</div>';
}
$output .= '<div class="heading">';
if ( ! empty( $shortcode['pricing_table_title'] ) ) {
	$output .= '<p class="title">' . $shortcode['pricing_table_title'] . '</p>';
}
if ( ! empty( $shortcode['pricing_table_subtitle'] ) ) {
	$output .= '<p class="subtitle">' . $shortcode['pricing_table_subtitle'] . '</p>';
}
$output .= '</div>';
$output .= '<div class="pricing">';
if ( ! empty( $shortcode['pricing_table_price'] ) ) {
	$output .= '<p class="price"><sup>' . $shortcode['pricing_table_currency_symbol'] . '</sup>' . $shortcode['pricing_table_price'] . '<sub>' . $shortcode['pricing_table_period'] . '</sub></p>';
}
if ( ! empty( $shortcode['pricing_table_tagline'] ) ) {
	$output .= '<p class="tagline">' . $shortcode['pricing_table_tagline'] . '</p>';
}
$output .= '</div>';
$content = preg_replace('~</?p[^>]*>~', '', $content);
$output .= '<div class="list">' . $content . '</div>';
$output .= '<div class="more">';
$output .= '<a class="btn" href="' . $shortcode['pricing_table_button_link'] . '">' . $shortcode['pricing_table_button'] . '</a>';
$output .= '</div>';
$output .= '</div>';
