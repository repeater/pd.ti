<?php
/**
 * The template for displaying search results pages.
 *
 * @package stackstar.
 */

get_header(); ?>
    <div class="search-container">
    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
        
            <div class="row">
                <div class="columns small-12 vertical-pad-1">
            
                    <div class="search-page-form" id="ss-search-page-form"><?php get_search_form(); ?></div>
                    
                </div>
            </div>
            <div class="row">
                <div class="columns small-12">
                    
                    <?php if ( have_posts() ) : ?>

                    <header class="page-header">
                        <span class="search-page-title"><?php printf( esc_html__( 'Search Results for: %s', stackstar ), '<span>' . get_search_query() . '</span>' ); ?></span>
                    </header><!-- .page-header -->

                    <?php /* Start the Loop */ ?>
                    
                    <?php while ( have_posts() ) : the_post(); ?>
                    <div class="row vertical-pad-1">
                        <div class="columns small-2 medium-4">
                            <span class="search-post-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></span>
                        </div>

                        <div class="columns small-10 medium-8">
                            <h4 class="search-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <p class="search-post-link"><a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></p>
                            <p class="search-post-excerpt"><?php the_excerpt(); ?></p>
                            <p class="search-post-excerpt">
                                <?php echo custom_field_excerpt(); ?></p>
                        </div>
                    </div>
                    <?php endwhile; ?>

                    <?php the_posts_navigation(); ?>

                    <?php else : ?>

                    <h4>No Results found</h4>
                    <?php //get_template_part( 'template-parts/content', 'none' ); ?>
                    
                    <?php endif; ?>
                    
                </div>
            </div>
            
        </main><!-- #main -->
    </section><!-- #primary -->
</div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>