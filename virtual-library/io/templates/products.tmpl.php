<?php
/**
 * Template Name: Products
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
get_template_part('partials/navigation','products');
$args = array(
	'post_type' => 'products',
	'posts_per_page' => -1,
	'tax_query' => array(
		array(
			'taxonomy' => 'product_cats',
			'field'    => 'slug',
			'terms'    => $post->post_name,
		),
	),
);
$product_query = new WP_Query( $args );
$products = $product_query->posts;
wp_reset_postdata();
$sub_categories = array();
for ($i = 0; $i < count($products); $i++) {
    $post_id = $products[$i]->ID;
    $terms = get_the_terms($post_id,'product_sub_cats');
    foreach ($terms as $term) {
        $term_id = $term->term_id;
        if(!in_array($term_id, $sub_categories)){
            $sub_categories[] = $term_id;
        }
    }
}
$sub_categories = array_reverse($sub_categories);
?>


<?php
echo '<div id="products">';
foreach ($sub_categories as $sub_cat) {
    $term_ob = get_term_by('id',absint($sub_cat),'product_sub_cats');
    $term_name = $term_ob->name;
	$term_description = $term_ob->description;
	$term_slug = $term_ob->slug;
    echo '<div class="row product-sub-cat align-center" id="'.$term_slug.'"><div class="columns large-8 medium-10 small-12">';
    echo '<h2>'.$term_name.'</h2>';
	if ($term_description) {
		echo '<p>'.$term_description.'</p>';
	}
    echo '</div></div>';
    $sub_args = array(
        'post_type' => 'products',
		'posts_per_page' => -1,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_sub_cats',
                'field'    => 'id',
                'terms'    => $sub_cat
            ),
            array(
                'taxonomy' => 'product_cats',
                'field'    => 'slug',
                'terms'    => $post->post_name,
            ),
        ),
    );
    $sub_query = new WP_Query($sub_args);
    $sub_products = $sub_query->posts;
    echo '<div class="row product-slides">';
    for ($i = 0; $i < count($sub_products); $i++) {
        $post_id = $sub_products[$i]->ID;
        $title = get_the_title($post_id);
        $products_item = simple_fields_fieldgroup('product_item',$post_id);
        $scroller = array();
        $product_scrollers = simple_fields_fieldgroup('product_scroller',$post_id);
        foreach ($product_scrollers as $product_scroller) {
            if (!empty($product_scroller['youtube'])) {
                $scroller[] = '<div class="product-slide"><div class="flex-video product-video widescreen">'.$product_scroller['youtube'].'</div></div>';
            } elseif (!empty($product_scroller['image'])) {
                $image = wp_get_attachment_image_src($product_scroller['image'],'large')[0];
                $scroller[] = '<div class="product-slide"><div class="product-image"><img src="'.$image.'"></div></div>';
            }
        }
        $content_1 = (!empty($products_item['content_left']) ? $products_item['content_left'] : '');
        $content_2 = (!empty($products_item['content_right']) ? $products_item['content_right'] : '');
        $featured_image = (has_post_thumbnail($post_id) ? wp_get_attachment_image_src(get_post_thumbnail_id($post_id),'medium')[0] : '');
        echo '<div class="medium-6 small-12 large-4 columns">';
        echo '<a
            href="#"
            data-product="'.$i.'"
            data-title="'.$title.'"
            data-content_1="'.htmlspecialchars($content_1).'"
            data-content_2="'.htmlspecialchars($content_2).'"
            data-scroller="'.htmlspecialchars(json_encode($scroller)).'"
            data-original="'.$featured_image.'"
            class="wow slide-in product-slide"
            >';
            echo '<h3>'.$title.'</h3>';
        echo '</a>';
        echo '</div>';
    }
    echo '</div>';
}
echo '</div>';

// sibling navigation
$args = array(
	'post_parent' => $post->post_parent,
	'post_type'   => 'page',
	'numberposts' => -1,
	'post_status' => 'published'
);
$children_array = array_values(get_children($args));
$children_count = count($children_array);
$children_last = $children_count - 1;
for ($i = 0; $i < count($children_array); $i++) {
    if ($children_array[$i]->ID == $post->ID) {
        $this_page_index = $i;
    }
}
if ($this_page_index == 0) {
    // $previous_page_id = $children_array[$children_last]->ID;
    // $previous_page_title = $children_array[$children_last]->post_title;
} else {
    $previous_page_id = $children_array[$this_page_index - 1]->ID;
    $previous_page_title = $children_array[$this_page_index - 1]->post_title;
}
if ($this_page_index == $children_last) {
    // $next_page_id = $children_array[0]->ID;
    // $next_page_title = $children_array[0]->post_title;
} else {
    $next_page_id = $children_array[$this_page_index + 1]->ID;
    $next_page_title = $children_array[$this_page_index + 1]->post_title;
}
?>
<div id="products-nav">
	<div class="row align-center">
	    <div class="columns small-12 medium-6">
            <?php if (isset($next_page_title)) { ?>
	            <a href="<?php echo get_the_permalink($next_page_id); ?>"><span class="icon-chevron-left"></span> <strong><?php echo $next_page_title; ?></strong></a>
            <?php } ?>
	    </div>
	    <div class="columns small-12 medium-6 text-right">
            <?php if (isset($previous_page_title)) { ?>
	            <a href="<?php echo get_the_permalink($previous_page_id); ?>"><strong><?php echo $previous_page_title; ?></strong> <span class="icon-chevron-right"></span></a>
            <?php } ?>
	    </div>
	</div>
</div>

<?php
get_footer();
?>
