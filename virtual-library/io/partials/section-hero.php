<?php $hero_image = get_sub_field('hero_image'); ?>
<?php $hero_title = get_sub_field('hero_title'); ?>
<?php $hero_subtitle = get_sub_field('hero_subtitle'); ?>
<?php $hero_link_text = get_sub_field('hero_link_text'); ?>
<?php $hero_link_url = get_sub_field('hero_link_url'); ?>
<?php $color = get_sub_field('hero_background_color'); ?>
<?php $border_style = get_sub_field('border_style'); ?>


<div class="hero modular-hero <?php echo $border_style ?> <?php if (empty($hero_image)) { echo 'no-back'; } else { echo ''; } ?> <?php if (!empty($color)) { echo $color; } ?>" style="background-image:url(<?php if (!empty($hero_image)) { echo $hero_image; } ?>);">
    
    
    <div class="row">
        <div class="small-12 small-offset-0 medium-10 medium-offset-1">
            <div class="text-center hero-content wow slide-in" style="visibility: visible; animation-name: custom-1;">
                <?php
                if (!empty($hero_title)) {
                    echo '<h1>'.$hero_title.'</h1>'; 
                }
                if (empty($hero_title)) {
                    echo the_title( '<h1>', '</h1>' );
                }
                ?>
                
                <?php
                if (!empty($hero_subtitle)) {
                    echo '<h4>'.$hero_subtitle.'</h4>'; }
                ?>
                    
                <?php
                if (!empty($hero_link_text)) {
                    echo '<a href="'.$hero_link_url.'" class="button purple wow slide-in"><span class="inline-button-icon icon-'.$hero_link_icon.'"></span>'.$hero_link_text.'</a>';
                }
                ?>
            </div>
        </div>
        
        <?php if ($border_style == 'Wave'): ?>
        <div style="z-index: 20;" class="svg-wrapper">
            
        </div>
        <?php endif ?>
        
    </div>
</div>