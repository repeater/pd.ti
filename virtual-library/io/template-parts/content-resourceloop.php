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

<a href="<?php echo get_permalink(); ?>" id="post-<?php the_ID(); ?>" class="columns small-12 medium-6 large-4 lazy blog-box">
    <div class="resources-grid">

        <div class="blog-box-back lazy">
            <div class="bbb-stripe blog-color-default">
                <div class="blog-box-svg">
                
                </div>
            </div>
        </div>
        <div class="blog-box-content">
            <h5><?php the_title(); ?></h5>
            <p class="blog-box-excerpt"><?php the_excerpt(); ?></p>
            <hr class="blog-hr">
            <p class="blog-box-meta"><?php the_author(); ?> on <?php echo get_the_date(); ?></p>
                    
        </div>

    </div>
</a>
	
