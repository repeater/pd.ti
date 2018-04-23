<?php
function syrup_wp_title($title) {
	if (is_feed()) {
		return $title;
	}
	if (is_front_page()) {
		$title = get_bloginfo('name');
	} else {
		$title .= '&nbsp;&#8211;&nbsp;'.get_bloginfo('name');
	}
	return $title;
}
add_filter('wp_title', 'syrup_wp_title', 10);

function syrup_title() {
	if (is_home()) {
		if (get_option('page_for_posts', true)) {
			return 'Blog';
		} else {
			return null;
		}
	} elseif (is_archive()) {
		$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		if ($term) {
			return apply_filters('single_term_title', $term->name);
		} elseif (is_post_type_archive()) {
			return apply_filters('the_title', get_queried_object()->labels->name);
		} elseif (is_day()) {
			return sprintf(__('Daily Archives: %s', 'syrup'), get_the_date());
		} elseif (is_month()) {
			return sprintf(__('Monthly Archives: %s', 'syrup'), get_the_date('F Y'));
		} elseif (is_year()) {
			return sprintf(__('Yearly Archives: %s', 'syrup'), get_the_date('Y'));
		} elseif (is_author()) {
			$author = get_queried_object();
			return sprintf(__('Author Archives: %s', 'syrup'), $author->display_name);
		} else {
			return single_cat_title('', false);
		}
	} elseif (is_search()) {
		return sprintf(__('Search Results for %s', 'syrup'), get_search_query());
	} elseif (is_404()) {
		return __('Not Found', 'syrup');
	} else {
		return get_the_title();
	}
}
