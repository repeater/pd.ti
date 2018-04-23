<?php $post_object = get_field('icon_feature_title'); ?>
<?php $post_object = get_field('feature_column'); ?>

<div class="row">
    <div class="columns small-12 text-center">
        <h2 class="section-title"><?php the_field('icon_feature_title'); ?></h2>
    </div>
</div>
  
<div class="section icon-features vertical-pad">

    <?php if( have_rows('feature_column') ): ?>

        <div class="row">

        <?php while( have_rows('feature_column') ): the_row(); 

            // vars
            $icon = get_sub_field('feature_icon');
            $label = get_sub_field('feature_label');
            $description = get_sub_field('feature_description');

            ?>

            <div class="columns small-12 medium-expand">

                <div class="circle-icon" style="background-image:url(<?php echo $icon; ?>);"></div>
                <p><strong><?php echo $label; ?></strong></p>
                <p><?php echo $description; ?></p>

            </div>

        <?php endwhile; ?>

        </div>

    <?php endif; ?>
    
</div>