<?php $post_object = get_field('feature_two_title'); ?>
<?php $post_object = get_field('feature_two_text_column'); ?>
<?php $post_object = get_field('feature_two_image'); ?>

<div class="section vertical-pad">
    
    <div class="row align-middle">

        <div class="small-12 medium-8 columns">

            <img src="<?php the_field('feature_two_image'); ?>"/>

        </div>

        <div class="small-12 medium-4 columns">

            <h3 class="feature-title"><?php the_field('feature_two_title'); ?></h3>
            <?php the_field('feature_two_text_column'); ?>

        </div>

    </div>
    
</div>