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
    <div class="hero no-back">
        <div class="row">
            <div class="medium-10 medium-offset-1">
                <div class="text-center hero-content wow slide-in" style="visibility: visible; animation-name: custom-1">
                    <h1 class="page-title">Success Stories</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-sub-nav">
    <div class="row">
        <div class="columns">
            <ul>
                <li>
                    <a href="/testimonials">
                        All Success Stories
                    </a>
                </li>
                <li>
                    <a href="/testimonial-categories/district-staff">
                        District Staff
                    </a>
                </li>
                <li>
                    <a href="/testimonial-categories/school-administrators" class="scroll">
                        School Administrators
                    </a>
                </li>
                <li>
                    <a href="/testimonial-categories/teachers" class="scroll">
                        Teachers
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="testimonial-blog">
    <div class="container">
        <div class="row">
						
            <?php
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content', 'testimonialloop' );
                endwhile;
                the_posts_pagination();
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif;
            ?>
						
        </div>
    </div>
</div>
<?php get_footer(); ?>
