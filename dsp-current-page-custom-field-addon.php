<?php
/**
 * Plugin Name: Display Posts Shortcode, Current Page Custom Field Add-On
 * Plugin URI: https://github.com/itamaro/dps-currrent-page-custom-field-addon
 * Description: Allow parsing "current" as the current page ID when using the display posts shortcode plugin to query custom fields using the meta_key and meta_value attributes.
 * Version: 1.0
 * Author: Itamar Ostricher
 * Author URI: https://github.com/itamaro/
 *
 * Copyright 2014 Itamar Ostricher
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 */

/**
 * Filter the DPS Query Args 
 *
 * @param array $args, query arguments
 * @param array $atts, original shortcode attributes
 * @return array $args
 */
function io_dps_page_link_query( $args, $atts ) {
	// do something only if `meta_is_id` is set to "true",
	//  and `meta_value` is set to "current".
	if( isset( $args['meta_value'] ) &&
			isset( $atts['meta_is_id'] ) &&
			( 'true' == $atts['meta_is_id'] ) &&
			( 'current' == $args['meta_value'] ) ) {
		$args['meta_value'] = get_the_ID();
	}
	return $args;
}
add_filter( 'display_posts_shortcode_args', 'io_dps_page_link_query', 10, 2 );
