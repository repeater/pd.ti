<?php $post_object = get_field('section_label'); ?>
<?php $post_object = get_field('resource_type'); ?>
<?php $post_object = get_field('resource_icon'); ?>
<?php $post_object = get_field('resource_title'); ?>
<?php $post_object = get_field('resource_description'); ?>
<?php $post_object = get_field('resource_link_url'); ?>

<div class="section featured-resource">

    <div class="row">
        <div class="small-12 columns">
            <h2 class="section-title"><?php the_field('section_label'); ?></h2>
        </div>
    </div>
    
    <div class="row align-middle">

        <div class="small-4 columns resource-wrap align-bottom">
            <a href="<?php the_field('resource_link_url'); ?>" class="resource-wrap-inner">
                <img src="<?php the_field('resource_icon'); ?>"/>
                <p class="resource-type"><?php the_field('resource_type'); ?></p>
                <h3><?php the_field('resource_title'); ?></h3>
            </a>
        </div>

        <div class="small-8 columns">

            <?php the_field('resource_description'); ?>

        </div>
    </div>
</div>