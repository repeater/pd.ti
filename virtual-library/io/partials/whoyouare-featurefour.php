<?php $post_object = get_field('feature_four_title'); ?>
<?php $post_object = get_field('feature_four_column_one'); ?>
<?php $post_object = get_field('feature_four_image'); ?>

<div class="section vertical-pad">

    <div class="row align-middle">

        <div class="small-12 medium-6 columns">

            <h3 class="feature-title"><?php the_field('feature_four_title'); ?></h3>

            <?php the_field('feature_four_column_one'); ?>

        </div>

        <div class="small-12 medium-6 columns">

          <img src="<?php the_field('feature_four_image'); ?>"/>

        </div>
    </div>
</div>