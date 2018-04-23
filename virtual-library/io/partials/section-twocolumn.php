<div class="row align-middle vertical-pad two-column-layout">
    
    <div class="<?php if( get_sub_field('text_col_two') ) { echo "columns small-12 medium-12 large-expand small-order-1 medium-order-1 large-order-"; } else { echo "columns small-12 medium-6 small-order-1 medium-order-"; } ?><?php if( get_sub_field('image_position') == '1' ): ?>1<?php endif; ?><?php if( get_sub_field('image_position') == '2' ): ?>2<?php endif; ?> wow slide-in text-center">
        <img src="<?php the_sub_field('image'); ?>"/>
    </div>
    
    <div class="<?php if( get_sub_field('text_col_two') ) { echo "columns small-12 medium-12 large-expand small-order-2 medium-order-2 large-order-"; } else { echo "columns small-12 medium-6 small-order-2 medium-order-"; } ?><?php if( get_sub_field('image_position') == '1' ): ?>2<?php endif; ?><?php if( get_sub_field('image_position') == '2' ): ?>1<?php endif; ?>">
        
        <div class="row">
            <div class="columns small-12">
                <h3 class="feature-title"><?php the_sub_field('feature_title'); ?></h3>
            </div>
        </div>
        
        <div class="row">
            <div class="small-12 medium-expand columns">
                <?php the_sub_field('text_col_one'); ?>
            </div>
            
            <?php if( get_sub_field('text_col_two') ): ?>
            
                <div class="small-12 medium-expand columns">
                    <?php the_sub_field('text_col_two'); ?>
                </div>
            
            <?php endif; ?>
        </div>
        
        <div class="row">
            <div class="columns small-12">
                <a href="<?php the_sub_field('cta_link_url'); ?>"><?php the_sub_field('cta_link_text'); ?></a>
            </div>
        </div>
        
    </div>
    
</div>

