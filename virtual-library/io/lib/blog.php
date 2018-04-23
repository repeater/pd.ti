<?php
function get_excerpt_by_id($post_id,$wordcount){
    $the_post = get_post($post_id); //Gets post ID
    $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
    $excerpt_length = $wordcount; //Sets excerpt length by word count
    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

    if(count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, '… [read more]');
        $the_excerpt = implode(' ', $words);
    endif;

    // $the_excerpt = '<p>' . $the_excerpt . '</p>';

    return $the_excerpt;
}
// function get_the_excerpt_max_charlength($id,$charlength) {
// 	$excerpt = get_the_excerpt($id);
// 	$charlength++;
//
// 	$output = '';
// 	if ( mb_strlen( $excerpt ) > $charlength ) {
// 		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
// 		$exwords = explode( ' ', $subex );
// 		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
// 		if ( $excut < 0 ) {
// 			$output .= mb_substr( $subex, 0, $excut );
// 		} else {
// 			$output .= $subex;
// 		}
// 		$output .= '... [read more]';
// 	} else {
// 		$output = $excerpt;
// 	}
// 	return $output;
// }
function get_blog_color($cat_id) {
	if ($cat_id == 28) { // Administrators
		$stripe_class = 'blog-color-1';
	} else if ($cat_id == 231) { // Teachers
		$stripe_class = 'blog-color-2';
	} else if ($cat_id == 19) { // Parents
		$stripe_class = 'blog-color-3';
	} else if ($cat_id == 1) { // Students
		$stripe_class = 'blog-color-4';
	} else if ($cat_id == 232) { // Operations
		$stripe_class = 'blog-color-5';
	} else if ($cat_id == 233) { // IO News
		$stripe_class = 'blog-color-default';
	} else {
		$stripe_class = 'blog-color-default';
	}
	return $stripe_class;
}
function display_blog_box($post_id,$size='small-box') {
    // box size
    if ($size == 'big-box') {
        $columns = 'small-12 medium-6';
    } else {
        $columns = 'small-12 medium-4 large-4';
    }
    // featured image
    if (has_post_thumbnail($post_id)) {
        $thumb_id = get_post_thumbnail_id($post_id);
        $post_image = wp_get_attachment_image_src($thumb_id,'medium')[0];
        $has_thumb = true;
    } else {
        $has_thumb = false;
    }
    // category
    $post_type = get_post_type($post_id);
    if ($post_type == 'resources') {
        $taxonomy = 'resource_cats';
        $post_type_title = 'Resources';
    } else {
        $taxonomy = 'category';
        $post_type_title = 'Insights';
    }
    if ( defined('WPSEO_VERSION') ) {
        $wpseo_primary_term = new WPSEO_Primary_Term($taxonomy, $post_id);
        $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
        $wpseo_primary_term = get_term($wpseo_primary_term);
        if (!$wpseo_primary_term->errors) {
            $first_category_id = $wpseo_primary_term->term_id;
            $first_category_name = $wpseo_primary_term->name;
        } else {
            $first_term = get_the_terms($post_id,$taxonomy)[0];
            $first_category_id = $first_term->term_id;
            $first_category_name = $first_term->name;
        }
    } else {
        $first_term = get_the_terms($post_id,$taxonomy)[0];
        $first_category_id = $first_term->term_id;
        $first_category_name = $first_term->name;
    }
    // author
    $post_author_id = get_post_field('post_author',$post_id);
    $post_author = get_the_author_meta('display_name',$post_author_id);
    $date = get_the_date('M j, Y',$post_id);
    // category color
	$stripe_class = get_blog_color($first_category_id);
    echo '<div class="columns '.$columns.' blog-box-column lazy">';
        echo '<a href="'.get_the_permalink($post_id).'" class="blog-box wow slide-in '.$size.'" id="post-'.$post_id.'" role="article" title="Permalink to '.get_the_title($post_id).'">';
            echo '<div class="blog-box-back" style="background-image:url('.$post_image.');">';
            if (!$has_thumb) {
				echo '<div class="bbb-stripe '.$stripe_class.'"></div>';
                echo '<div class="blog-box-svg">';
                    get_template_part('partials/logo');
                echo '</div>';
			}
            echo '</div>';
            echo '<div class="blog-box-content">';
                echo '<div class="stripe '.$stripe_class.'"></div>';
                echo '<p class="blog-box-category">'.$first_category_name.'</p>';
                echo '<h5>'.get_the_title($post_id).'</h5>';
                echo '<p class="blog-box-excerpt">'.get_excerpt_by_id($post_id,16).'</p>';
                echo '<hr class="blog-hr">';
                echo '<p class="blog-box-meta">'.$post_author.' on '.$date.'</p>';
            echo '</div>';
        echo '</a>';
    echo '</div>';
}


