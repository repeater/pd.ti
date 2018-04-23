<?php $post_object = get_field('content'); ?>
<?php $hero_title = get_field( "hero_display_title" ); ?>
<?php $hero_copy = get_field( "hero_description" ); ?>
<?php $hero_sub = get_field( "hero_subtitle" ); ?>
<?php

if (!empty($hero_title)) {
    echo '<p>' .$hero_title. '</p>';
}
if (!empty($hero_copy)) {
    echo '<p>' .$hero_copy. '</p>';
}
if (!empty($hero_sub)) {
    echo '<p>' .$hero_sub. '</p>';
}


// check if the flexible content field has rows of data
if( have_rows('content') ):

     // loop through the rows of data
    while ( have_rows('content') ) : the_row();

      if( get_row_layout() == 'hero' ): 

            the_sub_field('hero_title');
            the_sub_field('hero_subtitle');

        endif;

    endwhile;

endif;

?>



