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

<div class="row">
	
	<div class=" <?php echo esc_attr( $class_to_add ); ?>">
		<article id="post-<?php the_ID(); ?>" class="column section section-text">
            <div class="testimonial-wrap column medium-10 medium-offset-1">
                
                <div class="pull-quote-wrap text-center">
                    <div class="pull-quote">

                        <?php $quote = get_field( "pull_quote" );
                        if( $quote ) {
                            echo '<h2 class="pull">' . $quote . '</h2>';
                            echo single_post_title( '<h4 class="quote-title"> – ', '</h1>' );
                        }
                        ?>

                    </div>
                </div>
            
                <?php the_content(); ?>
            </div>
		</article>

		
	</div>
	
</div>

