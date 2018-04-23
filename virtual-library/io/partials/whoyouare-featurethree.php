<?php $post_object = get_field('feature_three_title'); ?>
<?php $post_object = get_field('feature_three_image'); ?>
<?php $post_object = get_field('feature_three_column_one'); ?>
<?php $post_object = get_field('feature_three_column_two'); ?>
<?php $post_object = get_field('feature_three_cta_link'); ?>
<?php $post_object = get_field('feature_three_cta_link_text'); ?>

<div class="section vertical-pad">

    <div class="row align-middle">

        <div class="small-12 medium-6 columns">

            <img src="<?php the_field('feature_three_image'); ?>"/>

        </div>

        <div class="small-12 medium-6 columns">

            <div class="row">
                <div class="small-12 columns">
                    <h3 class="feature-title"><?php the_field('feature_three_title'); ?></h3>
                </div>   
            </div>

            <div class="row">
                <div class="small-12 medium-6 columns">
                    <?php the_field('feature_three_column_one'); ?>
                </div>
                <div class="small-12 medium-6 columns">
                    <?php the_field('feature_three_column_two'); ?>
                </div> 
            </div>

            <div class="row">
                <div class="small-12 columns">
                    <a href="<?php the_field('feature_three_cta_link'); ?>"><?php the_field('feature_three_cta_link_text'); ?></a>
                </div> 
            </div>

        </div>

    </div>
    
</div>