<?php $post_object = get_field('testimonial'); ?>

<div class="row">

    <div class="column text-center vertical-pad">
    
        <?php $heading = get_field( "testimonial_heading" );
            if( $heading ) {
                echo '<h2 class="section-title">' .$heading. '</h2>';
            }
        ?>

        <?php $subheading = get_field( "testimonial_subheading" );
            if( $heading ) {
                echo '<h4>' .$subheading. '</h4>';
            }
        ?>
    
    </div>
    
</div>
  
<div class="section">

    <?php if( have_rows('testimonial') ): ?>

        <div class="row">

        <?php while( have_rows('testimonial') ): the_row(); 

            // vars
            $image = get_sub_field('testimonial_image');
            $label = get_sub_field('testimonial_label');
            $description = get_sub_field('testimonial_description');
            $credentials = get_sub_field('testimonial_credentials');
            $link = get_sub_field('testimonial_link_text');
            $url = get_sub_field('testimonial_link_url');

            ?>

            <div class="columns small-12 medium-expand">
                <a href="<?php echo $url; ?>" class="card">
                    <div class="card-image" style="background-image:url(<?php echo $image; ?>);"></div>
                    <div class="card-section">
                        <p class="testimonial-label"><strong><?php echo $label; ?></strong></p>
                        <p class="testimonial-description"><?php echo $description; ?></p>
                        <p class="testimonial-credentials"><i><?php echo $credentials; ?></i></p>
                        <p class="testimonial-link"><?php echo $link; ?></p>
                    </div>
                </a>
            </div>

        <?php endwhile; ?>

        </div>

    <?php endif; ?>
    
</div>