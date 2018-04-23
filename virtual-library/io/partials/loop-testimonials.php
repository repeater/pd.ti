<?php
/**
 * @package WordPress
 * @subpackage syrup
 */
rewind_posts();
get_template_part('partials/cats');
// category
$post_id = get_the_id();
$post_type = get_post_type($post_id);
if ($post_type == 'testimonial') {
    $taxonomy = 'testimonial_cats';
    $post_type_title = 'Testimonials';
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

$title_back_class = get_blog_color($first_category_id);
if ($title_back_class == 'blog-color-1') {
    $webkit_gradient = 'webkit-color-1';
} else if ($title_back_class == 'blog-color-2') {
    $webkit_gradient = 'webkit-color-2';
} else if ($title_back_class == 'blog-color-3') {
    $webkit_gradient = 'webkit-color-3';
} else if ($title_back_class == 'blog-color-4') {
    $webkit_gradient = 'webkit-color-4';
} else if ($title_back_class == 'blog-color-5') {
    $webkit_gradient = 'webkit-color-5';
} else if ($title_back_class == 'blog-color-default') {
    $webkit_gradient = 'webkit-color-default';
} else {
    $webkit_gradient = 'webkit-color-default';
}
?>
<div id="blog-page">
    <div class="row hide-for-large">
        <div class="columns text-center">
            <button id="filter-trigger" class="button small">Filters</button>
        </div>
    </div>
    <?php
    if (has_post_thumbnail()) {
        $hero_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'x_large')[0];
        echo '<div id="post-top" class="bigger lazy" data-original="'.$hero_image.'">';
            // echo '<div id="previous-post">';
            //     previous_post_link('%link','<span class="icon-chevron-left"></span>');
            // echo '</div>';
            // echo '<div id="next-post">';
            //     next_post_link('%link','<span class="icon-chevron-right"></span>');
            // echo '</div>';
        echo '</div>';
    // } else {
        // echo '<div id="post-top" class="smaller">';
            // echo '<div id="previous-post">';
            //     previous_post_link('%link','<span class="icon-chevron-left"></span>');
            // echo '</div>';
            // echo '<div id="next-post">';
            //     next_post_link('%link','<span class="icon-chevron-right"></span>');
            // echo '</div>';
        // echo '</div>';
    }
    ?>
    <?php
    if (have_posts()) {
        while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('post-page'); ?> role="article">
            <div class="row post-row">
                <div class="columns small-12 large-2 post-meta">
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                        <span class="pm-image"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 100); ?></span>
                        <span class="pm-meta"><?php echo get_the_author_meta('display_name'); ?> on <?php echo get_the_date('M j, Y'); ?></span>
                    </a>
                </div>
                <div class="columns large-8 small-12 post-title">
                    <div class="row align-middle">
                        <div class="columns small-6">
                            <p class="post-first-cat <?php echo $webkit_gradient; ?>"><?php echo $first_category_name; ?></p>
                        </div>
                        <div class="columns small-6 single-share">
                            <p class="share-label <?php echo $webkit_gradient; ?>">Share</p>
                            <?php //syrup_share(); ?>
                            <ul class="share-buttons">
                                <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_the_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>&source=<?php echo urlencode(get_bloginfo('name')); ?>" target="_blank" title="Share on LinkedIn" class="<?php echo $webkit_gradient; ?>"><span class="icon-linkedin"></span></a></li>
                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_the_permalink()); ?>&t=<?php echo urlencode(get_the_title()); ?>" title="Share on Facebook" target="_blank" class="<?php echo $webkit_gradient; ?>"><span class="icon-facebook"></span></a></li>
                                <li><a href="https://twitter.com/intent/tweet?source=<?php echo urlencode(get_the_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>:%20<?php echo urlencode(get_the_permalink()); ?>" target="_blank" title="Tweet" class="<?php echo $webkit_gradient; ?>"><span class="icon-twitter"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row align-bottom">
                        <div class="columns small-12" id="post-title-wrap">
                            <h1>Testimonial</h1>
                            <h1 class="<?php echo $webkit_gradient; ?>"><?php the_title(); ?></h1>
                            <div class="row">
                                <div class="columns small-6">
                                    <?php
                                    $prev_post = get_previous_post();
                                    if (!empty( $prev_post )) {
                                        $prev_post_id = $prev_post->ID;
                                        $prev_post_title = $prev_post->post_title;
                                        echo '<a id="previous-post" class="post-link '.$webkit_gradient.'" href="'.get_the_permalink($prev_post_id).'" title="Permalink to: '.$prev_post_title.'"><span class="icon-chevron-left"></span></a>';
                                    }
                                    ?>
                                </div>
                                <div class="columns small-6 text-right">
                                    <?php
                                    $next_post = get_next_post();
                                    if (!empty( $next_post )) {
                                        $next_post_id = $next_post->ID;
                                        $next_post_title = $next_post->post_title;
                                        echo '<a id="next-post" class="post-link '.$webkit_gradient.'" href="'.get_the_permalink($next_post_id).'" title="Permalink to: '.$next_post_title.'"><span class="icon-chevron-right"></span></a>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-center post-row">
                <div class="columns small-12 large-8 post-content-wrap">
                    <div class="row">
                        <div class="columns">
                            <div class="post-content">
                                <?php the_content(); ?>
                                <hr>
                                <div class="post-tc">
                                    <?php echo get_the_tag_list('<p><span>Tags: </span>',', ','</p>'); ?>
                                    <?php echo '<p><span>Categories: </span>'.get_the_category_list(', ').'</p>'; ?>
                                </div>
                                <hr>
                                <?php comments_template(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="related-posts">
                <?php if ( function_exists( 'echo_ald_crp' ) ) echo_crp(); ?>
            </div>
            <?php //get_template_part('partials/pagination','post'); ?>
        </article><!-- #post-<?php the_ID(); ?> -->
        <?php
    endwhile;
}
?>
</div>
