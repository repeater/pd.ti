<?php $post_object = get_field('logo_section_title'); ?>
<?php $post_object = get_field('logos'); ?>

<div class="section featured-logos extra-vertical-pad">

    <div class="row">
        <div class="columns small-12 text-center">
            <h2 class="section-title"><?php the_field('logo_section_title'); ?></h2>
        </div>
    </div>
  
    <?php if( have_rows('logos') ): ?>

        <div class="row align-middle">

        <?php while( have_rows('logos') ): the_row(); 

            // vars
            $logo = get_sub_field('logo');
        
            ?>

            <div class="columns small-12 medium-expand">

                <img src="<?php echo $logo; ?>"/>

            </div>

        <?php endwhile; ?>

        </div>

    <?php endif; ?>
    
</div>