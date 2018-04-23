<div class="section featured-logos vertical-pad-2 vertical-pad-bottom">
  
    <?php if( have_rows('logos') ): ?>

        <div class="row align-middle">

        <?php while( have_rows('logos') ): the_row(); 

            // vars
            $logo = get_sub_field('logo');
        
            ?>

            <div class="columns small-12 medium-expand text-center">

                <img src="<?php echo $logo; ?>"/>

            </div>

        <?php endwhile; ?>

        </div>

    <?php endif; ?>
    
</div>