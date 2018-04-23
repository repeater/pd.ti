<div class="section featured-testimonials vertical-pad">

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
            $video = get_sub_field('video_embed');

            ?>

            <div class="columns small-12 medium-expand">
                <div class="card big-box-shadow">
                    
                    <a data-open="video-<?php echo get_row_index(); ?>"><div class="card-image" style="background-image:url(<?php echo $image; ?>);"></div></a>
                    <div class="card-section">
                        <p class="testimonial-label"><strong><?php echo $label; ?></strong></p>
                        <p class="testimonial-description"><?php echo $description; ?></p>
                        <p class="testimonial-credentials"><i><?php echo $credentials; ?></i></p>
                        <a href="<?php echo $url; ?>" class="testimonial-link"><?php echo $link; ?></a>
                    </div>
                    <div class="large reveal testimonial-reveal" data-reveal data-close-on-click="true" data-animation-in="scale-in-up" data-reset-on-close="true" id="video-<?php echo get_row_index(); ?>" data-reveal>
                        <div class="videoWrapper"><?php echo $video; ?></div>
                        <button class="close-button" data-close aria-label="Close reveal" type="button">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>

        </div>

    <?php endif; ?>
    
</div>