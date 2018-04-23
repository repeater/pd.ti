<?php
if (!is_archive() && !is_search()) {
    // $products_page_id = 16;
    // if ( $post->post_parent == $products_page_id ) {
    //     $hero = simple_fields_fieldgroup('hero',$products_page_id);
    //     echo $post->post_parent;
    // } else {
    $hero = simple_fields_fieldgroup('hero',$post->ID);
    // }
    if (is_singular(array('post','resources'))) {
        $hero_title = '';
    } else if (!empty($hero['title'])) {
        $hero_title = (!empty($hero['title']) ? '<h1>'.$hero['title'].'</h1>' : '');
        $hero_image = (!empty($hero['image']) ? wp_get_attachment_image_src($hero['image'],'x_large')[0] : '');
        $hero_video = (!empty($hero['video']) ? $hero['video'] : '');
        $hero_link_1_text = (!empty($hero['link_1_text']) ? $hero['link_1_text'] : '');
        $hero_link_1_url = (!empty($hero['link_1_url']) ? $hero['link_1_url'] : '');
        $hero_link_1_icon = (!empty($hero['link_1_icon']) ? $hero['link_1_icon']['selected_value'] : '');
        $hero_link_2_text = (!empty($hero['link_2_text']) ? $hero['link_2_text'] : '');
        $hero_link_2_url = (!empty($hero['link_2_url']) ? $hero['link_2_url'] : '');
        $hero_link_2_icon = (!empty($hero['link_2_icon']) ? $hero['link_2_icon']['selected_value'] : '');
    }
    if (!empty($hero_video)) {
            $video = '<video class="hero-vid" autoplay="autoplay" loop="loop" muted="">';
                $video .= '<source src="'.$hero_video.'" type="video/mp4">';
            $video .= '</video>';
    }
}

// display conditional on having a title
if (!empty($hero_title)) {
?>
<div class="hero <?php if (empty($hero_image)) { echo 'no-back'; } else { echo ''; } ?>" style="background-image:url(<?php if (!empty($hero_image)) { echo $hero_image; } ?>);">
    <?php if (!empty($video)) { echo $video; } ?>
    <div class="row">
        <div class="columns text-center hero-content wow slide-in">
            <?php
            if (!empty($hero_title)) {
                echo $hero_title;
            }
            if (!empty($hero_link_1_text)) {
                echo '<a href="'.$hero_link_1_url.'" class="button white-stroke"><span class="inline-button-icon icon-'.$hero_link_1_icon.'"></span>'.$hero_link_1_text.'</a>';
            }
            if (!empty($hero_link_2_text)) {
                echo '<a href="'.$hero_link_2_url.'" class="button white-stroke"><span class="inline-button-icon icon-'.$hero_link_2_icon.'"></span>'.$hero_link_2_text.'</a>';
            }
            ?>
        </div>
    </div>
    <?php if (is_page_template( 'templates/product-overview.tmpl.php' )) {
        $product_static_hero = simple_fields_fieldgroup('product_static');
        ?>
        <div id="hero-product-image-wrapper">
            <div class="row align-center">
                <div class="columns small-12 medium-10 large-8">
                    <?php echo $product_static_hero['hero_product_image']['image']['large']; ?>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (is_singular(array('post','resources'))) {
        syrup_share();
    }
    ?>
</div>
<?php } ?>
