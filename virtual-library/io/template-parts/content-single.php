<?php
/**
 * The default template for displaying content
 *
 * Used for single posts.
 *
 * @package IO
 * 
 */
$prime_testimonial = simple_fields_fieldgroup('testimonial_prime_vid');
?>

<div class="row">
	
	<div class=" <?php echo esc_attr( $class_to_add ); ?>">
		<article id="post-<?php the_ID(); ?>" class="section section-text">
			<?php the_content(); ?>

		</article>

		<div class="section section-blog-info">
			<div class="row">
				<div class="col-md-6">
					<div class="entry-categories"><?php esc_html_e( 'Categories:', 'hestia' ); ?>
						<?php
						$categories = get_the_category( $post->ID );
						foreach ( $categories as $category ) {
							echo '<span class="label label-primary"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a></span>';
						}
						?>
					</div>
					<?php the_tags( '<div class="entry-tags">' . esc_html__( 'Tags: ', 'hestia' ) . '<span class="entry-tag">', '</span><span class="entry-tag">', '</span></div>' ); ?>
				</div>
				
			</div>
		</div>
	</div>
	
</div>

