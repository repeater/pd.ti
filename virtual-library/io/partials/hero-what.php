<?php $hero_style = get_field( "hero_style" ); ?>
<?php $hero_title = get_field( "hero_display_title" ); ?>
<?php $hero_image = get_field( "hero_background_image" ); ?>
<?php $hero_link_1_url = get_field( "hero_cta_link_url" ); ?>
<?php $hero_link_1_text = get_field( "hero_cta_link_text" ); ?>
<?php $hero_link_2_url = get_field( "hero_cta_link_2_url" ); ?>
<?php $hero_link_2_text = get_field( "hero_cta_link_2_text" ); ?>
<?php $hero_link_1_icon = get_field( "hero_cta_icon" ); ?>
<?php $hero_link_2_icon = get_field( "hero_cta_icon_2" ); ?>
<?php $product_static_hero = get_field( "hero_product_image" ); ?>
<?php $hero_copy = get_field( "hero_subtitle" ); ?>
<?php $hero_video = get_field( "video_embed" ); ?>


<?php if( $hero_style == 'child' ): ?>

<div class="hero what-you-need <?php if (empty($hero_image)) { echo 'no-back'; } else { echo ''; } ?>" style="background-image:url(<?php if (!empty($hero_image)) { echo $hero_image; } ?>);">

    <div class="row align-center">
        <div class="columns small-12 large-10 hero-content text-center wow slide-in">
            <?php
            if (!empty($hero_title)) {
                echo '<h1>' .$hero_title. '</h1>';
            }
            if (empty($hero_title)) {
                echo the_title( '<h1>', '</h1>' );
            }
            if (!empty($hero_copy)) {
                echo '<h4>' .$hero_copy. '</h4>';
            }
            if (!empty($hero_link_1_text)) {
                echo '<a href="'.$hero_link_1_url.'" class="button solid-purple"><span class="inline-button-icon icon-'.$hero_link_1_icon.'"></span>'.$hero_link_1_text.'</a>';
            }
            if (!empty($hero_link_2_text)) {
                echo '<a href="'.$hero_link_2_url.'" class="button solid-purple"><span class="inline-button-icon icon-'.$hero_link_2_icon.'"></span>'.$hero_link_2_text.'</a>';
            }
            ?>
        </div>
        <div class="columns small-12 medium-6 large-8 hero-content hero-video text-center wow slide-in">
            
            <?php
            if (!empty($hero_video)) {
                echo '<div class="videoWrapper">'.$hero_video.'</div>';
            }
            if (empty($hero_video)) {
                echo '<img src="'.$product_static_hero.'" />';
            }
            ?>
            
        </div>
    </div>
    
    <div class="svg-wrapper">
    
    </div>
        
    
</div>

<?php endif; ?>

<?php if( $hero_style == 'parent' ): ?>
    
<div class="hero who-you-are <?php if (empty($hero_image)) { echo 'no-back'; } else { echo ''; } ?>" style="background-image:url(<?php if (!empty($hero_image)) { echo $hero_image; } ?>); min-height: 500px;">

    <div class="row align-middle">
        <div style="z-index: 20;" class="columns small-12 medium-6 hero-content vertical-pad-bottom wow slide-in">
            <?php
            if (!empty($hero_title)) {
                echo '<h1>' .$hero_title. '</h1>';
            }
            if (empty($hero_title)) {
                echo the_title( '<h1>', '</h1>' );
            }
            if (!empty($hero_copy)) {
                echo '<h5>' .$hero_copy. '</h5>';
            }
            ?>
        </div>
        <div style="position:initial;" class="columns small-12 medium-6 hero-content position-initial">
            
            <ul class="what-navigation">
                <li><a href="/what-you-need/student-assessment-data-analytics"><span>Student Assessment</span> <span>&amp; Data Analytics Solutions <i class="fa fa-arrow-right" aria-hidden="true"></i></span></a></li>
                <li><a href="/what-you-need/professional-growth"><span>Professional</span> <span>Growth <i class="fa fa-arrow-right" aria-hidden="true"></i></span></a></li>
                <li><a href="/what-you-need/sis-classroom-management"><span>SIS &amp; Classroom</span><span>Solutions <i class="fa fa-arrow-right" aria-hidden="true"></i></span></a></li>
            </ul>
            <?php get_template_part( 'partials/cogs' ); ?>
            
        </div>
    
        <div style="z-index: 2;" class="svg-wrapper">
            
        </div>
        
    </div>
</div>



<?php endif; ?>




