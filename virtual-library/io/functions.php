<?php
/**
 * @package WordPress
 * @subpackage syrup
 */

require_once locate_template('/lib/utils.php');
require_once locate_template('/lib/init.php');
require_once locate_template('/lib/titles.php');
require_once locate_template('/lib/cleanup.php');
require_once locate_template('/lib/scripts.php');
require_once locate_template('/lib/custom.php');
require_once locate_template('/lib/vimeo.php');
require_once locate_template('/lib/youtube.php');
require_once locate_template('/lib/syrup-settings.php');
// require_once locate_template('/lib/html.php');
// require_once locate_template('/lib/nav_walker.php');
require_once locate_template('/lib/cpt.php');
require_once locate_template('/lib/simple-fields/simple-fields.php');
require_once locate_template('/lib/analytics.php');
require_once locate_template('/lib/post-meta.php');
require_once locate_template('/lib/social.php');
require_once locate_template('/lib/blog.php');



// Custom Excerpt function for Advanced Custom Fields
function custom_field_excerpt() {
	global $post;
	$text = get_template_part( 'partials/search' , 'flexible' ); 
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
        $text = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]&gt;', ']]&gt;', $text);
		$excerpt_length = 20; // 20 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
        
	}
	return apply_filters($text);
}