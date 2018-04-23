<?php
function syrup_scripts() {
    wp_enqueue_script('typekit', 'https://use.typekit.net/jdt3avc.js', '', '', false);
	wp_enqueue_style('style', get_template_directory_uri() . '/dist/css/app.css');
	wp_enqueue_script('app', get_template_directory_uri() . '/dist/js/app.js', '', '', true);
    wp_enqueue_script('classie', get_template_directory_uri() . '/dist/js/classie.js', '', '', true);
}
add_action('wp_enqueue_scripts', 'syrup_scripts');
