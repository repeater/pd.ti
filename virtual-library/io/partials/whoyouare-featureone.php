<?php $post_object = get_field('feature_one_title'); ?>
<?php $post_object = get_field('feature_one_column_one'); ?>
<?php $post_object = get_field('feature_one_column_two'); ?>
<?php $post_object = get_field('feature_one_image'); ?>
<?php $post_object = get_field('feature_one_cta_link'); ?>
<?php $post_object = get_field('feature_one_cta_link_text'); ?>

<div class="section vertical-pad">

    <div class="row align-middle">
      <div class="columns small-12 medium-6">
          <h3 class="feature-title"><?php the_field('feature_one_title'); ?></h3>
          <div class="row">
              <div class="columns small-12 medium-6"><?php the_field('feature_one_column_one'); ?></div>
              <div class="columns small-12 medium-6"><?php the_field('feature_one_column_two'); ?></div>
          </div>

          <div class="row">
              <div class="columns medium-12">

                  <a href="<?php the_field('feature_one_cta_link'); ?>"><?php the_field('feature_one_cta_link_text'); ?></a>

              </div>
          </div>

        </div>

        <div class="columns small-12 medium-6">

          <img src="<?php the_field('feature_one_image'); ?>"/>

        </div>
    </div>
    
</div>