<?php
/*
Plugin Name: Mindmeister Shortcodes
Description: Embed easily a Mindmeister graph in any blog post.
Author: Oncle Tom
Version: 1.0
Author URI: http://case.oncle-tom.net/
Plugin URI: http://case.oncle-tom.net/code/wordpress/

  This plugin is released under version 3 of the GPL:
  http://www.opensource.org/licenses/gpl-3.0.html
*/

define('MINDMEISTER_URL_PATTERN', '#^http://www.mindmeister.com/\D*(\d+)(?:\D|$)#siU');

if (!function_exists('mindmeister_shortcode_display')):
/**
 * Handles the display of a [mindmeister] shortcode
 * 
 * @see		http://core.trac.wordpress.org/browser/tags/3.0.1/wp-includes/shortcodes.php
 * @param 	$attributes	Array	Associative array of arguments within the shortcode string
 * @param 	$value Integer[optional]	ID a Mindmeister mindmap
 * @return	String	HTML output, can also be an error message if shortcode is invalid
 */
function mindmeister_shortcode_display($attributes, $value = null)
{
	$id = '';
	$attributes = shortcode_atts(array(
		'id' => '',
		'height' => 400,
		'url' => '',
		'width' => 600,
		'zoom' => 0,
	), $attributes);
	extract($attributes);
	$url = trim($url);

	/*
	 * Overwrite the URL if specified as content
	 */
	if ($value)
	{
		$id = $value;
	}
	
	/*
	 * Check if any URL
	 */
	if ('' === $id && '' === $url)
	{
		new WP_Error('shortcode', 'URL empty for Mindmeister shortcode instance.', $attributes);
		return __('URL empty for Mindmeister shortcode instance.', 'mindeister-shortcode');
	}
	
	/*
	 * Extract ID
	 */
	if ('' === $id && !preg_match(MINDMEISTER_URL_PATTERN, $url, $matches))
	{
		new WP_Error('shortcode', 'No mindmap ID found in Mindmeister URL.', $url);
		return __('No mindmap ID found in Mindmeister URL.', 'mindeister-shortcode');
	}

	$id = '' === $id ? $matches[1] : $id;

	/*
	 * Outputs iframe
	 */
	return sprintf('<iframe width="%2$s" height="%3$s" frameborder="0" scrolling="no" class="mindmeister-presentation mindmeister-presentation-id-%1$s" src="http://www.mindmeister.com/maps/public_map_shell/%s?width=%d&height=%d&zoom=%d"></iframe>',
		$id,
		$width,
		$height,
		$zoom
	);
}
endif;

add_shortcode('mindmeister', 'mindmeister_shortcode_display');