<?php
/**
 * @package WordPress
 * @subpackage syrup
 */
get_header();
if (is_single()) {
    get_template_part('partials/loop', 'single');
} else {
    get_template_part('partials/loop', 'index');
}
get_footer(); ?>