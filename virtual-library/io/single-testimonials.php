<?php
/**
 * The template for displaying all single posts and attachments.
 *
 * @package IO
 * 
 */

get_header(); ?>
			<div id="primary" class="page-header header-filter header-small header-video" data-parallax="active" style="background-image: url('');">
				<div class="container">
                    <div class="col-md-12 col-md-offset-0 text-center">
                            
                        <div class="hero no-back">
                            <div class="row">
                                <div class="medium-10 medium-offset-1">
                                    <div class="text-center hero-content" style="visibility: visible;">
                                    <?php single_post_title( '<h1 class="hestia-title">', '</h1>' ); ?>
                                    </div>
                                    <div class="columns text-center hero-content wow slide-in" style="visibility: visible;">
                                        <div class="videoWrapper">
                                            <?php $value = get_field( "testimonial_primary_video" );
                                            if( $value ) {
                                                echo $value;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
							
                    </div>
				</div>
			</div>
		</header>
		<div class="">
			<div class="blog-post">
				<div class="container">
                    
					<?php
					if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'testimonial' );
						endwhile;
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
				</div>
			</div>
		</div>
		
		<div class="footer-wrapper">
<?php get_footer(); ?>
