<?php
/**
 * The default template for displaying content
 *
 * Used for single posts.
 *
 * @package IO
 * 
 */
?>

<a href="<?php echo get_permalink(); ?>" id="post-<?php the_ID(); ?>" class="columns small-12 medium-6 large-4 lazy">
    <div class="tesimonials-grid">

        <div class="testimonial-thumbnail lazy" style="background-image:url(<?php the_post_thumbnail_url() ?>); height:207px; ">

        </div>
        <div class="pull-quote-wrap text-center">
            <div class="pull-quote noborder">

                <?php $quote = get_field( "pull_quote" );
                if( $quote ) {
                    echo '<h4 class="pull">' . $quote . '</h4>';
                    echo the_title( '<h5 class="quote-title"> – ', '</h5>' );
                }
                ?>

            </div>
        </div>

    </div>
</a>
	

