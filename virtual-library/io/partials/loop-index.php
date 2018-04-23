<?php
/**
 * @package WordPress
 * @subpackage syrup
 */
rewind_posts();
get_template_part('partials/cats');
?>
<div id="blog-page">
    <h1 class="hide">Blog</h1>
    <div class="row hide-for-large">
        <div class="columns text-center">
            <button id="filter-trigger" class="button small">Filters</button>
        </div>
    </div>
    <?php
        $sticky = get_option( 'sticky_posts' );
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        if (!empty($sticky) && is_home() && $paged == 1) {
            $sticky_args = array(
            	'posts_per_page' => -1,
            	'post__in'  => $sticky,
            	'ignore_sticky_posts' => 1
            );
            $sticky_query = new WP_Query( $sticky_args );
            // echo '<pre>';
            // print_r($sticky_query);
            // echo '</pre>';
            ?>
            <div class="row">
                <div class="columns">
                    <h4 class="text-center blog-archive-title">Featured Blog Posts</h4>
                </div>
            </div>
            <div class="row align-center">
                <?php
                for($x = 0; $x < count($sticky_query->posts); $x++) {
                    display_blog_box($sticky_query->posts[$x]->ID,'big-box');
                }
                ?>
            </div>
            <div class="row">
                <div class="columns">
                    <hr class="blog-hr">
                </div>
            </div>
            <?php
        }
    ?>
    <?php
    $search_query = get_search_query();
    if (!empty($search_query)) {
        ?>
        <div class="row">
            <div class="columns">
                <h4 class="text-center blog-archive-title">Search results for: <em><?php echo $search_query; ?></em></h4>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="row align-center" id="archive">
        <?php
        if (have_posts()) {
            while ( have_posts() ) { the_post();
                $post_id = get_the_ID();
                display_blog_box($post_id);
            }
        } else {
            ?>
            <div class="row">
                <div class="columns">
                    <h4 class="text-center blog-archive-title">Sorry, no posts meet your criteria</h4>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    
    <div class="row align-center">
    
        <?php the_posts_pagination( array(
        'mid_size'  => 2,
        'prev_text' => __( '&#8249; Previous', 'textdomain' ),
        'next_text' => __( 'Next &#8250;', 'textdomain' ),
        ) );
        ?>
        
    </div>
    
    
</div>
