<?php $cta_title = get_sub_field('cta_title'); ?>
<?php $cta_subtitle = get_sub_field('cta_subtitle'); ?>
<?php $cta_link_text = get_sub_field('cta_link_text'); ?>
<?php $cta_link_url = get_sub_field('cta_link_url'); ?>
<?php $background_color = get_sub_field('gradient_color'); ?>
<?php $cta_link_icon = get_sub_field('cta_link_icon'); ?>

<div style="height: 80px;" class="spacer"></div>
<div class="section section-cta-footer footer-inline text-center">

    <div class="<?php if (!empty($background_color)) { echo $background_color; } ?> align-middle" id="cta-footer">
        <div class="cta-footer-wrapper">
            <div class="color-strip"></div>
            <div class="row align-middle" style="clear: left;">
                <div class="columns small-12 medium-9 medium-text-left">
                    <?php
                    if (!empty($cta_title)) {
                        echo '<h2>'.$cta_title.'</h2>'; }
                    else { 
                        echo '<h2>How can we help you improve educational outcomes?</h2>';
                    }
                    ?>
                    <?php
                    if (!empty($cta_subtitle)) {
                        echo '<h4>'.$cta_subtitle.'</h4>'; }
                    ?>
                </div>
                <div class="columns small-12 medium-3 medium-text-left">
                    <?php
                    if (!empty($cta_link_text)) {
                        echo '<a href="'.$cta_link_url.'" class="button purple wow slide-in"><span class="inline-button-icon icon-'.$cta_link_icon.'"></span>'.$cta_link_text.'</a>';
                    }
                    else { 
                        echo '<a data-toggle="get-more-info" class="button purple wow slide-in"><span class="inline-button-icon"></span>Get Started</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

