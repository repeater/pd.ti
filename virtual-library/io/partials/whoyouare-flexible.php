<?php $post_object = get_field('content'); ?>

<?php

// check if the flexible content field has rows of data
if( have_rows('content') ):

     // loop through the rows of data
    while ( have_rows('content') ) : the_row();

        if( get_row_layout() == 'two-column' ):

        	get_template_part( 'partials/section', 'twocolumn' );

        elseif( get_row_layout() == 'one_column' ):

        	get_template_part( 'partials/section', 'onecolumn' );

        elseif( get_row_layout() == 'icon_feature_columns' ): 

        	get_template_part( 'partials/section', 'iconfeature' );

        elseif( get_row_layout() == 'section_title_subtitle' ): 

            get_template_part( 'partials/section', 'title' );

        elseif( get_row_layout() == 'two_thirds_column' ): 

            get_template_part( 'partials/section', 'twothirdscolumn' );

        elseif( get_row_layout() == 'featured_logos' ): 

            get_template_part( 'partials/section', 'featuredlogos' );

        elseif( get_row_layout() == 'featured_resource' ): 

            get_template_part( 'partials/section', 'featuredresource' );

        elseif( get_row_layout() == 'featured_testimonials' ): 

            get_template_part( 'partials/section', 'featuredtestimonials' );

        elseif( get_row_layout() == 'benefits_list' ): 

            get_template_part( 'partials/section', 'benefitslist' );

        elseif( get_row_layout() == 'testimonial_slider' ): 

            get_template_part( 'partials/section', 'testimonialslider' ); 

        elseif( get_row_layout() == 'call_to_action' ): 

            get_template_part( 'partials/section', 'cta' );

        elseif( get_row_layout() == 'hero' ): 

            get_template_part( 'partials/section', 'hero' );

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>



