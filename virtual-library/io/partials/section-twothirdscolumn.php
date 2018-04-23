<div class="row align-middle vertical-pad two-thirds-column-layout">
    
    <div class="columns small-12 medium-6 large-8 small-order-1 medium-order-<?php if( get_sub_field('image_position') == '1' ): ?>1<?php endif; ?><?php if( get_sub_field('image_position') == '2' ): ?>2<?php endif; ?> wow slide-in">
        <img src="<?php the_sub_field('image'); ?>"/>
    </div>
    
    <div class="columns small-12 medium-6 large-4 small-order-2 medium-order-<?php if( get_sub_field('image_position') == '1' ): ?>2<?php endif; ?><?php if( get_sub_field('image_position') == '2' ): ?>1<?php endif; ?>">

        <h3 class="feature-title"><?php the_sub_field('feature_title'); ?></h3>
        
        <?php the_sub_field('text_column'); ?>
                
        <a href="<?php the_sub_field('cta_link_url'); ?>"><?php the_sub_field('cta_link_text'); ?></a>
                
    </div>
    
</div>

