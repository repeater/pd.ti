<?php
/**
 * Template Name: Integrations
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
?>
<h1 class="hide"><?php the_title(); ?></h1>
<?php
$integration_post_hero = simple_fields_fieldgroup('integration_post_hero');
if (!empty($integration_post_hero['title']) && !empty($integration_post_hero['text'])) {
    ?>
    <div id="integrations-post-hero">
        <div class="row align-center">
            <div class="columns medium-10 large-8">
                <h2 class="text-center wow slide-in"><?php echo $integration_post_hero['title']; ?></h2>
            </div>
        </div>
        <div class="row align-center">
            <div class="columns medium-10 large-8">
                <p class="text-center wow slide-in"><?php echo $integration_post_hero['text']; ?></p>
            </div>
        </div>
    </div>
    <?php
}
?>
<div id="archive-list">
    <div class="row">
        <div class="columns">
            <div class="row" id="integrations-archive">
                <?php
                // The Query
                $args = array(
                    'post_type' => 'integrations',
                    'posts_per_page' => -1
                );
                $the_query = new WP_Query( $args );
                // The Loop
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
                        $integration = simple_fields_fieldgroup('integration_data', $the_query->post->ID);
                        ?>
                        <div class="columns small-6 medium-4 large-3">
                            <a class="wow slide-in" href="<?php echo $integration['url']; ?>" target="_blank">
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
wp_reset_postdata();
$integration_pre_footer = simple_fields_fieldgroup('integration_pre_footer');
if (!empty($integration_pre_footer['title']) && !empty($integration_pre_footer['text'])) {
    ?>
    <div id="integrations-pre-footer" class="background-image-overlay" style="<?php echo 'background-image: url(' . wp_get_attachment_image_src($integration_pre_footer['background_image']['id'],'large')[0] . ');'; ?>">
        <div class="row">
            <div class="columns">
                <h2 class="text-center wow slide-in"><?php echo $integration_pre_footer['title']; ?></h2>
            </div>
        </div>
        <div class="row align-spaced">
            <?php
            if (!empty($integration_pre_footer['text'])) {
                ?>
                <div class="columns large-4 medium-10 small-12">
                    <div class="wow slide-in"><?php echo $integration_pre_footer['text']; ?></div>
                </div>
                <?php
            }
            if (!empty($integration_pre_footer['text_2'])) {
                ?>
                <div class="columns large-4 medium-10 small-12">
                    <div class="wow slide-in"><?php echo $integration_pre_footer['text_2']; ?></div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}
get_footer();
?>