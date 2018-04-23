<?php
// Resources
add_action( 'init', 'register_cpt_resources' );

function register_cpt_resources() {

    $labels = array(
        'name' => _x( 'Resources', 'resources' ),
        'singular_name' => _x( 'Resource', 'resources' ),
        'add_new' => _x( 'Add New', 'resources' ),
        'all_items' => _x( 'Resources', 'resources' ),
        'add_new_item' => _x( 'Add New Resource', 'resources' ),
        'edit_item' => _x( 'Edit Resource', 'resources' ),
        'new_item' => _x( 'New Resource', 'resources' ),
        'view_item' => _x( 'View Resource', 'resources' ),
        'search_items' => _x( 'Search Resources', 'resources' ),
        'not_found' => _x( 'No Resources found', 'resources' ),
        'not_found_in_trash' => _x( 'No Resources found in Trash', 'resources' ),
        'parent_item_colon' => _x( 'Parent Resource:', 'resources' ),
        'menu_name' => _x( 'Resources', 'resources' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'taxonomies' => array('resource_cats'),
        'supports' => array('title','editor','thumbnail', 'author'),
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-chart-pie',
        'rewrite' => array('slug' => 'resources','with_front' => true),
    );

    register_post_type( 'resources', $args );

    register_taxonomy( 'resource_cats', array( 'resources' ), array(
        'hierarchical' => true,
        'label' => __( 'Resource Categories' ),
        'rewrite' => array( 'slug' => 'resource-categories', 'with_front' => false )
    ));

}



// Testimonials
add_action( 'init', 'register_cpt_testimonials' );

function register_cpt_testimonials() {

    $labels = array(
        'name' => _x( 'Testimonials', 'testimonials' ),
        'singular_name' => _x( 'Testimonial', 'testimonials' ),
        'add_new' => _x( 'Add New', 'testimonials' ),
        'all_items' => _x( 'All Testimonials', 'testimonials' ),
        'add_new_item' => _x( 'Add New Testimonial', 'testimonials' ),
        'edit_item' => _x( 'Edit Testimonial', 'testimonials' ),
        'new_item' => _x( 'New Testimonial', 'testimonials' ),
        'view_item' => _x( 'View Testimonial', 'testimonials' ),
        'search_items' => _x( 'Search Testimonials', 'testimonials' ),
        'not_found' => _x( 'No Testimonials found', 'testimonials' ),
        'not_found_in_trash' => _x( 'No Testimonials found in Trash', 'testimonials' ),
        'parent_item_colon' => _x( 'Parent Testimonials:', 'testimonials' ),
        'menu_name' => _x( 'Testimonials', 'testimonials' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'taxonomies' => array('testimonial_cats'),
        'supports' => array('title','editor','thumbnail'),
        'show_in_menu' => true,
        'menu_icon' => 'dashicons-format-quote',
        'rewrite' => array('slug' => 'testimonials','with_front' => true),
    );

    register_post_type( 'testimonials', $args );

    register_taxonomy( 'testimonial_cats', array( 'testimonials' ), array(
        'hierarchical' => true,
        'label' => __( 'Testimonial Categories' ),
        'rewrite' => array( 'slug' => 'testimonial-categories', 'with_front' => false )
    ));

}




// Products
add_action( 'init', 'register_cpt_products' );

function register_cpt_products() {

    $labels = array(
        'name' => _x( 'Products', 'products' ),
        'singular_name' => _x( 'Product', 'products' ),
        'add_new' => _x( 'Add New', 'products' ),
        'all_items' => _x( 'Products', 'products' ),
        'add_new_item' => _x( 'Add New Product', 'products' ),
        'edit_item' => _x( 'Edit Product', 'products' ),
        'new_item' => _x( 'New Product', 'products' ),
        'view_item' => _x( 'View Product', 'products' ),
        'search_items' => _x( 'Search Products', 'products' ),
        'not_found' => _x( 'No Products found', 'products' ),
        'not_found_in_trash' => _x( 'No Products found in Trash', 'products' ),
        'parent_item_colon' => _x( 'Parent Product:', 'products' ),
        'menu_name' => _x( 'Products', 'products' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => false,
        'has_archive' => false,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'taxonomies' => array('product_cats','product_sub_cats'),
        'supports' => array('title','editor','thumbnail'),
        'menu_icon' => 'dashicons-products',
        'show_in_menu' => true
    );

    register_post_type( 'products', $args );

    register_taxonomy( 'product_cats', array( 'products' ), array(
        'hierarchical' => true,
        'label' => __( 'Product Categories' )
    ));

    register_taxonomy( 'product_sub_cats', array( 'products' ), array(
        'hierarchical' => true,
        'label' => __( 'Product Sub Categories' )
    ));

}


// Leadership
add_action( 'init', 'register_cpt_leadership' );

function register_cpt_leadership() {

    $labels = array(
        'name' => _x( 'Leadership', 'leadership' ),
        'singular_name' => _x( 'Person', 'leadership' ),
        'add_new' => _x( 'Add New', 'leadership' ),
        'all_items' => _x( 'People', 'leadership' ),
        'add_new_item' => _x( 'Add New Person', 'leadership' ),
        'edit_item' => _x( 'Edit Person', 'leadership' ),
        'new_item' => _x( 'New Person', 'leadership' ),
        'view_item' => _x( 'View Person', 'leadership' ),
        'search_items' => _x( 'Search People', 'leadership' ),
        'not_found' => _x( 'No People found', 'leadership' ),
        'not_found_in_trash' => _x( 'No People found in Trash', 'leadership' ),
        'parent_item_colon' => _x( 'Parent Person:', 'leadership' ),
        'menu_name' => _x( 'Leadership', 'leadership' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => false,
        'has_archive' => false,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-groups',
        'show_in_menu' => true
    );

    register_post_type( 'leadership', $args );

}


// News
add_action( 'init', 'register_cpt_news' );

function register_cpt_news() {

    $labels = array(
        'name' => _x( 'News', 'news' ),
        'singular_name' => _x( 'News Collection', 'news' ),
        'add_new' => _x( 'Add New', 'news' ),
        'all_items' => _x( 'News', 'news' ),
        'add_new_item' => _x( 'Add New News Collection', 'news' ),
        'edit_item' => _x( 'Edit News Collection', 'news' ),
        'new_item' => _x( 'New News Collection', 'news' ),
        'view_item' => _x( 'View News Collection', 'news' ),
        'search_items' => _x( 'Search News', 'news' ),
        'not_found' => _x( 'No News found', 'news' ),
        'not_found_in_trash' => _x( 'No News found in Trash', 'news' ),
        'parent_item_colon' => _x( 'Parent News Collection:', 'news' ),
        'menu_name' => _x( 'News', 'news' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => false,
        'has_archive' => false,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-megaphone',
        'show_in_menu' => true
    );

    register_post_type( 'news', $args );

    register_taxonomy( 'news_type', array( 'news' ), array(
        'hierarchical' => true,
        'label' => __( 'News Type' ),
        'rewrite' => array( 'slug' => 'news-type', 'with_front' => false )
    ));

}

// integrations
add_action( 'init', 'register_cpt_integrations' );

function register_cpt_integrations() {

    $labels = array(
        'name' => _x( 'Integrations', 'integrations' ),
        'singular_name' => _x( 'Integrations Collection', 'integrations' ),
        'add_new' => _x( 'Add New', 'integrations' ),
        'all_items' => _x( 'Integrations', 'integrations' ),
        'add_new_item' => _x( 'Add New Integrations Collection', 'integrations' ),
        'edit_item' => _x( 'Edit Integrations Collection', 'integrations' ),
        'new_item' => _x( 'New Integrations Collection', 'integrations' ),
        'view_item' => _x( 'View Integrations Collection', 'integrations' ),
        'search_items' => _x( 'Search Integrations', 'integrations' ),
        'not_found' => _x( 'No Integrations found', 'integrations' ),
        'not_found_in_trash' => _x( 'No Integrations found in Trash', 'integrations' ),
        'parent_item_colon' => _x( 'Parent Integrations Collection:', 'integrations' ),
        'menu_name' => _x( 'Integrations', 'integrations' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-layout',
        'show_in_menu' => true
    );

    register_post_type( 'integrations', $args );

    register_taxonomy( 'integrations_type', array( 'integrations' ), array(
        'hierarchical' => true,
        'label' => __( 'Integrations Type' ),
        'rewrite' => array( 'slug' => 'integrations-type', 'with_front' => false )
    ));

}

// Flushing the permalinks is sometimes needed when making changes.
// Uncomment and load wp-admin once as needed.


add_action( 'init', 'flush_perm' );

function flush_perm(){
    flush_rewrite_rules(true);
}
