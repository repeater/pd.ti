<?php
function syrup_setup() {
	register_nav_menus(array(
		'utility_navigation' => __('Utility Navigation', 'syrup'),
        'primary_navigation' => __('Primary Navigation', 'syrup'),
		'footer_1_navigation' => __('Footer Navigation 1', 'syrup'),
		'footer_2_navigation' => __('Footer Navigation 2', 'syrup'),
		'footer_3_navigation' => __('Footer Navigation 3', 'syrup'),
		'footer_4_navigation' => __('Footer Navigation 4', 'syrup'),
        'footer_5_navigation' => __('Footer Navigation 5', 'syrup'),
        'footer_badge' => __('Footer Badge', 'syrup'),
        'footer_social' => __('Footer Social', 'syrup'),
		'products_navigation' => __('Products Navigation', 'syrup'),
		'insights_categories' => __('Highlighted Insight Categories', 'syrup'),
		'resource_categories' => __('Highlighted Resrouce Categories', 'syrup'),
		'integration_categories' => __('Highlighted Integration Categories', 'syrup'),
		'legal_1_navigation' => __('Legal 1', 'syrup'),
		'legal_2_navigation' => __('Legal 2', 'syrup'),
		'legal_3_navigation' => __('Legal 3', 'syrup'),
	));
}
add_action('after_setup_theme', 'syrup_setup');

add_theme_support( 'post-thumbnails' );
add_image_size( 'x_large', 1400, 1000, false);
//add_image_size( 'medium_square', 400, 400, true);
//add_image_size( 'team_crop', 706, 800, true);
// add_image_size( 'industry_crop', 1050, 600, true);
// add_image_size( 'home_about_crop', 725, 500, true);
// add_image_size( 'home_project_crop', 1280, 720, true);
// add_image_size( 'standard_crop', 725, 500, true);
// add_image_size( 'logo_crop', 300, 200, true);
// add_image_size( 'employee_crop', 400, 400, true);
/* extras not needed
function syrup_widgets_init() {
	register_sidebar(array (
		'name' 				=> __('Sidebar', 'syrup'),
		'id' 					=> 'sidebar',
		'before_widget' 	=> '<aside id="%1$s" class="widget well %2$s" role="complementary">',
		'after_widget' 	=> "</aside>",
		'before_title' 	=> '<h4 class="widget-title">',
		'after_title' 		=> '</h4>',
	));
}
add_action('init', 'syrup_widgets_init');

function remove_thumbnail_dimensions($html, $post_id, $post_image_id) {
	return preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
}
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3);


function button_icon_shortcode() {
	return ' <i class="fa fa-chevron-right text-warning"></i>';
}
add_shortcode('icon', 'button_icon_shortcode');
*/
