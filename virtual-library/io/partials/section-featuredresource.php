<div class="section featured-resource">
    
    <div class="row">
        <div class="small-12 columns">
            <h2 class="section-title"><?php the_sub_field('resource_section_title'); ?></h2>
        </div>
    </div>
    
    <div style="padding-bottom: 2em;" class="row align-middle">

        <div class="small-12 medium-6 large-4 columns resource-wrap large-align-bottom wow slide-in">
            <a href="<?php the_sub_field('resource_link_url'); ?>" class="resource-wrap-inner">
                <img src="<?php the_sub_field('resource_icon'); ?>"/>
                <p class="resource-type"><?php the_sub_field('resource_type'); ?></p>
                <h3><?php the_sub_field('resource_title'); ?></h3>
            </a>
        </div>

        <div class="small-12 medium-6 large-8 columns">

            <?php the_sub_field('resource_description'); ?>
            
            <a href="<?php the_sub_field('resource_link_url'); ?>">Read Now <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            
        </div>
    </div>
    
    
</div>