<?php
/**
 * The archive - list - template file
 *
 * This is the second most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package IO
 * 
 */

get_header(); ?>

			<div id="primary" class=" page-header header-filter header-small" data-parallax="active">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1 text-center">
							<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
							<?php the_archive_description( '<h5 class="description">', '</h5>' ); ?>
						</div>
					</div>
				</div>
			</div>
		</header>
		<div class="">
			<div class="hestia-blogs">
				<div class="container">
					<div class="row">
						<div class="<?php echo esc_attr( $class_to_add ); ?>">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content' );
							endwhile;
							the_posts_pagination();
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
						</div>
					</div>
				</div>
			</div>
<?php get_footer(); ?>
