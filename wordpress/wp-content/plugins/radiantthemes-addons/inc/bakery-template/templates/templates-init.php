<?php
/**
 * Template-init.php
 *
 * @package radiantthemes-addon
 */

require_once dirname( __FILE__ ) . '/templates.php';

/**
 * Function radiantthemes_reset_templates
 *
 * @param [type] $data Description.
 */
function radiantthemes_reset_templates( $data ) {
	return array();
}
add_filter( 'vc_load_default_templates', 'radiantthemes_reset_templates' );

/**
 * Function radiantthemes_add_templates
 */
function radiantthemes_add_templates() {
	$templates = getTemplatesFile();
	return array_map( 'vc_add_default_templates', $templates );
}
radiantthemes_add_templates();
