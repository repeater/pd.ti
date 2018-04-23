<?php
/**
 * @package WordPress
 * @subpackage syrup
 */
get_header();
rewind_posts();
?>
<div id="archive-list">
    <div class="row">
        <div class="columns">
            <div class="row" id="integrations-archive">
                <?php
                if (have_posts()) {
                    while ( have_posts() ) { the_post();
                        $integration = simple_fields_fieldgroup('integration_data', get_the_ID());
                        $title = get_the_title();
                        $post_type = get_post_type();
                        $taxonomy = 'category';
                        $post_type_title = 'Integrations';
                        $first_term = get_the_terms($post->ID,$taxonomy)[0];
                        $first_category_id = $first_term->term_id;
                        $first_category_url = get_term_link($first_category_id,$taxonomy);
                        $first_category_name = $first_term->name;
                        ?>
                        <div class="columns small-6 medium-4 large-3">
                            <a class="wow slide-in" href="<?php echo $integration['url']; ?>">
                                <img class="lazy" src="<?php echo wp_get_attachment_image_src($integration['logo']['id'],'medium')[0]; ?>" alt="">
                            </a>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
            <?php get_template_part('partials/pagination'); ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>