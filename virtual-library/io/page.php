<?php
/**
 * @package WordPress
 * @subpackage syrup
 */
get_header();
?>
<div class="row align-center vertical-pad">
    <div class="columns large-8 medium-10">
        <?php the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
        </article>
    </div>
</div>
<?php
get_footer();
?>
