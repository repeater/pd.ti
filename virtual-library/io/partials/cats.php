<?php
$post_type = (!empty($_GET['post_type']) ? $_GET['post_type'] : get_post_type());
if ($post_type == 'resources') {
    $taxonomy = 'resource_cats';
    $cat_menu = 'resource_categories';
    $show_tags = false;
} elseif ($post_type == 'integrations') {
    $taxonomy = 'integration_cats';
    $cat_menu = 'integration_categories';
    $show_tags = false;
} else {
    $taxonomy = 'category';
    $cat_menu = 'insights_categories';
    $show_tags = true;
}

// top menu
$top_menu_args = array(
    'theme_location'  => $cat_menu,
    'echo'            => true,
    'menu_class'       => 'no-bullets',
    'container'      => 'div',
//    'items_wrap'      => '%3$s'
);

// search
$search_query = get_search_query();
$search_terms = (!empty($search_query) ? $search_query : '');
$post_type = (!empty($_GET['post_type']) ? $_GET['post_type'] : $post_type);

echo '<div id="filters">';
    echo '<div class="page-sub-nav">';
        echo '<div class="row align-middle align-center">';
            echo '<div class="columns small-12 large-9">';
                wp_nav_menu($top_menu_args);
            echo '</div>';
            echo '<div class="columns small-12 medium-6 large-3">';
                echo '<form role="search" method="get" id="searchform" action="'.home_url( '/' ).'">';
                    echo '<input type="hidden" name="post_type" value="'.$post_type.'">';
                    echo '<div class="input-group">';
                        echo '<input type="text" class="input-group-field" value="'.$search_terms.'" name="s" id="s" placeholder="search...">';
                        echo '<div class="input-group-button">';
                            echo '<input type="submit" value="Go">';
                        echo '</div>';
                    echo '</div>';
                echo '</form>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
echo '</div>';
