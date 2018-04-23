<?php 
            $alignment = get_sub_field('content_alignment'); 
            $style = get_sub_field('icon_style');         

            ?>

<div class="section icon-features vertical-pad">

    <?php if( have_rows('feature_column') ): ?>

        <div class="row text-<?php echo $alignment; ?>">

        <?php while( have_rows('feature_column') ): the_row(); 
            
            $icon = get_sub_field('feature_icon');
            $label = get_sub_field('feature_label');
            $description = get_sub_field('feature_description');

            ?>

            <div class="columns small-12 medium-expand">

                <div class="circle-icon <?php echo $style; ?> wow slide-in" style="background-image:url(<?php echo $icon; ?>);"></div>
                <p><strong><?php echo $label; ?></strong></p>
                <p><?php echo $description; ?></p>

            </div>

        <?php endwhile; ?>

        </div>

    <?php endif; ?>
    
</div>