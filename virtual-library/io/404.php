<?php
/**
* @package WordPress
* @subpackage syrup
*/
get_header();
?>
<div class="row row-404 align-middle vertical-pad-4">
    
    <div class="columns small-12 medium-6">
        <h1 class="massive text-center">404</h1>
        <h3 class="text-center">This page does not exist.</h3>
        <div class="text-center">
            <button class="button" onclick="history.go(-1);">Go Back</button> <a class="button" href="<?php bloginfo('url'); ?>">Homepage</a>
        </div>
    </div>
    <div class="columns small-12 medium-6">
        <img src="/wp-content/uploads/404.png"/>
    </div>
    
</div>
<?php get_footer(); ?>