<?php
/**
 * Template Name: Product Overview
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
$product_static = simple_fields_fieldgroup('product_static');
$product_features = simple_fields_fieldgroup('product_features');
$product_feature_media = simple_fields_fieldgroup('product_feature_media');
for ($i = 0; $i < count($product_features); $i++) {
    $m = 0;
    for ($j = 0; $j < count($product_feature_media); $j++) {
        if ($product_features[$i]['feature_media_group_id'] == $product_feature_media[$j]['group_id']) {
            $product_features[$i]['media'][$m]['image'] = $product_feature_media[$j]['feature_image']['image']['large'];
            if (!empty($product_feature_media[$j]['embedded_video'])) {
                $product_features[$i]['media'][$m]['video'] = $product_feature_media[$j]['embedded_video'];
            }
            $m++;
        }
    }
}
$additional_features = simple_fields_fieldgroup('product_additional_features');
$product_testimonial = simple_fields_fieldgroup('product_testimonial');
?>
<div id="product">
    <div id="product-overview">
        <div id="post-hero">
            <div class="row align-center">
                <div class="columns large-10">
                    <div class="wow slide-in product-logo">
                        <?php
                        $page_id = get_the_ID();
                        if ($page_id == '16021') {
                            get_template_part('partials/classroom-logo');
                            $product_button_color = 'green';
                        } elseif ($page_id == '16023') {
                            get_template_part('partials/insights-logo');
                            $product_button_color = 'green';
                        } elseif ($page_id == '16025') {
                            echo '<style>#product #product-overview .product-logo, #product #product-overview .product-logo svg {max-height:6rem;}</style>';
                            get_template_part('partials/assessment-logo-with-tag');
                            $product_button_color = 'green';
                        } elseif ($page_id == '16027') {
                            get_template_part('partials/talent-logo');
                            $product_button_color = 'hot-pink';
                        } elseif ($page_id == '16901') {
                            get_template_part('partials/valed-logo-2');
                            $product_button_color = 'hot-pink';
                        } elseif ($page_id == '16029') {
                            get_template_part('partials/operations-logo');
                            $product_button_color = 'yellow';
                        } elseif ($page_id == '16134') {
                            get_template_part('partials/plans-logo');
                            $product_button_color = 'green';
                        } elseif ($page_id == '16078') {
                            get_template_part('partials/casenexpd-logo');
                            $product_button_color = 'hot-pink';
                        } elseif ($page_id == '16067') {
                            get_template_part('partials/pals-logo');
                            $product_button_color = 'green';
                        } elseif ($page_id == '16137') {
                            get_template_part('partials/pupil-path-logo');
                            $product_button_color = 'green';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row align-center">
                <div class="columns large-10">
                    <p class="text-center wow slide-in"><?php echo $product_static['text_1']; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div id="product-benefits-section">
        <?php
        $benefits = simple_fields_fieldgroup('product_benefits');
        if (!empty($benefits)) {
            ?>
            <div id="product-benefits">
                <div class="row">
                    <div class="columns">
                        <h3 class="text-center">Benefits</h3>
                    </div>
                </div>
                <div class="row align-center">
                    <div class="columns small-12 large-10">
                        <div class="row">
                            <?php for ($i = 0; $i < count($benefits); $i++) {
                                ?>
                                <div class="columns small-12 large-6">
                                    <div class="benefits-container">
                                        <span class="icon icon-<?php echo $benefits[$i]['icon']['selected_value']; ?>"></span>
                                        <p><?php echo $benefits[$i]['description']; ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        $benefits_static = simple_fields_fieldgroup('product_benefits_static');
        if (!empty($benefits_static)) {
            ?>
            <div id="product-benefits-static">
                <div id="product-benefits-slider">
                    <?php for ($i = 0; $i < count($benefits_static); $i++) {
                        $type = $benefits_static[$i]['type'];
                        $title = $benefits_static[$i]['cta_title'];
                        if ($type == 'radiobutton_num_0') {
                            $icon = 'network';
                            $url = $benefits_static[$i]['cta_url'];
                        } elseif ($type == 'radiobutton_num_1') {
                            $icon = 'clipboard3';
                            $url = $benefits_static[$i]['file_url'];
                        } elseif ($type == 'radiobutton_num_2') {
                            $icon = 'play';
                            $vimeo_video = get_vimeo_html($benefits_static[$i]['vimeo_id'], 1);
                            if (!empty($vimeo_video)) {
                                $video_ob = get_vimeo_html($benefits_static[$i]['vimeo_id'], 1);
                            } else {
                                $video_ob = get_youtube_html($benefits_static[$i]['youtube_id'], 1);
                            }
                        }
                        ?>
                        <div class="product-benefits-slider-item">
                            <div class="product-benefits-slider-item-wrapper">
                                <?php
                                if ($type == 'radiobutton_num_0' || $type == 'radiobutton_num_1') {
                                    ?>
                                    <a href="<?php echo $url; ?>" <?php echo ($type == 'radiobutton_num_1' ? 'target="_blank"' : ''); ?>>
                                    <?php
                                } else {
                                    ?>
                                    <a class="benefits-video-trigger" data-video="<?php echo htmlspecialchars($video_ob['iframe']); ?>" href="#">
                                    <?php
                                }
                                ?>
                                        <div class="icon icon-<?php echo $icon; ?>"></div>
                                        <h4><?php echo $title; ?></h4>
                                    </a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
    <div id="product-features">
        <div class="row">
            <div class="columns">
                <h3 class="text-center">Features</h3>
            </div>
        </div>
        <?php
        for ($i = 0; $i < count($product_features); $i++) {
            ?>
            <div class="row expanded product-feature wow slide-in">
                <?php
                    if ($i % 2 == 0) {
                        ?>
                        <div class="columns small-12 small-order-2 medium-7 medium-order-1">
                            <div class="image-wrapper left-image">
                                <?php
                                if (count($product_features[$i]['media']) > 1) {
                                    echo '<div class="product-media-slider">';
                                }
                                for ($j = 0; $j < count($product_features[$i]['media']); $j++) {
                                    echo '<div>';
                                        echo $product_features[$i]['media'][$j]['image'];
                                        if (!empty($product_features[$i]['media'][$j]['video'])) {
                                            echo '<a data-open="product-video" data-video="'.htmlspecialchars($product_features[$i]['media'][$j]['video']).'" class="play-product-video"><span class="icon icon-play"></span></a>';
                                            echo '<div class="small reveal product-video-reveal" id="product-video" data-reveal>';
                                                echo '<button class="close-button" data-close aria-label="Close modal" type="button">';
                                                    echo '<span aria-hidden="true">&times;</span>';
                                                echo '</button>';
                                                echo '<div class="video-container"></div>';
                                            echo '</div>';
                                        }
                                    echo '</div>';
                                }
                                if (count($product_features[$i]['media']) > 1) {
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="columns small-12 small-order-1 medium-5 medium-order-2">
                            <div class="feature-description">
                                <h3><?php echo $product_features[$i]['heading']; ?></h3>
                                <?php echo $product_features[$i]['description']; ?>
                                <div class="row align-center">
                                    <?php
                                    if (!empty($product_features[$i]['button_1_url'])) {
                                        ?>
                                        <div class="columns small-12 medium-6">
                                            <a href="<?php echo $product_features[$i]['button_1_url']; ?>" class="button <?php echo $product_button_color.'-stroke'; ?> expanded">
                                                <span class="inline-button-icon icon-<?php echo $product_features[$i]['button_1_icon']['selected_value']; ?>"></span>
                                                <?php echo $product_features[$i]['button_1_text']; ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    if (!empty($product_features[$i]['button_2_url'])) {
                                        ?>
                                        <div class="columns small-12 medium-6">
                                            <a href="<?php echo $product_features[$i]['button_2_url']; ?>" class="button <?php echo $product_button_color.'-stroke'; ?> expanded">
                                                <span class="inline-button-icon icon-<?php echo $product_features[$i]['button_2_icon']['selected_value']; ?>"></span>
                                                <?php echo $product_features[$i]['button_2_text']; ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="columns small-12 medium-5">
                            <div class="feature-description">
                                <h3><?php echo $product_features[$i]['heading']; ?></h3>
                                <?php echo $product_features[$i]['description']; ?>
                                <div class="row align-center">
                                    <?php
                                    if (!empty($product_features[$i]['button_1_url'])) {
                                        ?>
                                        <div class="columns small-12 medium-6">
                                            <a href="<?php echo $product_features[$i]['button_1_url']; ?>" class="button <?php echo $product_button_color.'-stroke'; ?> expanded">
                                                <span class="inline-button-icon icon-<?php echo $product_features[$i]['button_1_icon']['selected_value']; ?>"></span>
                                                <?php echo $product_features[$i]['button_1_text']; ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    if (!empty($product_features[$i]['button_2_url'])) {
                                        ?>
                                        <div class="columns small-12 medium-6">
                                            <a href="<?php echo $product_features[$i]['button_2_url']; ?>" class="button <?php echo $product_button_color.'-stroke'; ?> expanded">
                                                <span class="inline-button-icon icon-<?php echo $product_features[$i]['button_2_icon']['selected_value']; ?>"></span>
                                                <?php echo $product_features[$i]['button_2_text']; ?>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="columns small-12 medium-7">
                            <div class="image-wrapper right-image">
                                <?php
                                if (count($product_features[$i]['media']) > 1) {
                                    echo '<div class="product-media-slider">';
                                }
                                for ($j = 0; $j < count($product_features[$i]['media']); $j++) {
                                    echo '<div>';
                                        echo $product_features[$i]['media'][$j]['image'];
                                        if (!empty($product_features[$i]['media'][$j]['video'])) {
                                            echo '<a data-open="product-video-'.$i.'" data-video="'.htmlspecialchars($product_features[$i]['media'][$j]['video']).'" class="play-product-video"><span class="icon icon-play"></span></a>';
                                            echo '<div class="small reveal product-video-reveal" id="product-video-'.$i.'" data-reveal>';
                                                echo '<button class="close-button" data-close aria-label="Close modal" type="button">';
                                                    echo '<span aria-hidden="true">&times;</span>';
                                                echo '</button>';
                                                echo '<div class="video-container"></div>';
                                            echo '</div>';
                                        }
                                    echo '</div>';
                                }
                                if (count($product_features[$i]['media']) > 1) {
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    if (count($additional_features) > 0) {
        $background_image = wp_get_attachment_image_src($product_static['additional_feature_background_image']['id'],'large');
        ?>
        <div id="additional-features" class="background-image-overlay" style="<?php echo 'background-image: url(' . $background_image[0] . ');'; ?>">
            <div class="row">
                <div class="columns">
                    <h2 class="text-center wow slide-in"><?php echo $product_static['additional_features_heading']; ?></h2>
                </div>
            </div>
            <div class="row">
                <?php
                for ($i = 0; $i < count($additional_features); $i++) {
                    if ($i == 0) {
                        $icon = 'plug2';
                    } elseif ($i == 1) {
                        $icon = 'mixer';
                    } elseif ($i == 2) {
                        $icon = 'phone';
                    } elseif ($i == 3) {
                        $icon = 'presentation';
                    } elseif ($i == 4) {
                        $icon = 'contact-card';
                    } elseif ($i == 5) {
                        $icon = 'power-button';
                    }
                    ?>
                    <div class="columns small-12 medium-6 large-4">
                        <div class="additional-features-description wow slide-in">
                            <div class="icon-wrapper text-center">
                                <span class="icon icon-<?php echo $icon; ?>"></span>
                            </div>
                            <h4 class="text-center"><?php echo $additional_features[$i]['heading']; ?></h4>
                            <div><?php echo $additional_features[$i]['short_description']; ?></div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
    if (!empty($product_testimonial)) { ?>
        <div id="testimonials">
            <div id="product-testimonials-slider">
                <?php
                for ($i = 0; $i < count($product_testimonial); $i++) {
                    ?>
                    <div class="testimonial">
                        <div class="row">
                            <div class="columns">
                                <div class="row align-center">
                                    <div class="columns small-10">
                                        <div class="row">
                                            <div class="columns small-12 medium-6">
                                                <div class="wow slide-in">
                                                    <h5 class="text-left large-text-right"><?php echo $product_testimonial[$i]['author']; ?> | <?php echo $product_testimonial[$i]['position']; ?></h5>
                                                    <h6 class="text-left large-text-right"><?php echo $product_testimonial[$i]['location']; ?></h6>
                                                    <div class="testimonial-image-wrapper">
                                                        <?php echo $product_testimonial[$i]['image']['image']['full']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="columns small-12 medium-6">
                                                <div class="wow slide-in">
                                                    <p class="testimonial-body"><?php echo $product_testimonial[$i]['testimonial']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if (!empty($product_testimonial[$i]['vimeo_id']) || !empty($product_testimonial[$i]['youtube_id']) || !empty($product_testimonial[$i]['file_url'])) {
                                            ?>
                                            <div class="row testimonial-bottom-actions align-center">
                                                <?php if (!empty($product_testimonial[$i]['vimeo_id']) || !empty($product_testimonial[$i]['youtube_id'])) {
                                                    ?>
                                                    <div class="columns small-12 medium-6">
                                                        <div class="wow slide-in <?php echo (empty($product_testimonial[$i]['file_url']) ? 'text-center' : 'text-right') ?>">
                                                            <?php
                                                            $vimeo_video = get_vimeo_html($product_testimonial[$i]['vimeo_id'], 1);
                                                            if (!empty($vimeo_video)) {
                                                                $video_ob = get_vimeo_html($product_testimonial[$i]['vimeo_id'], 1);
                                                            } else {
                                                                $video_ob = get_youtube_html($product_testimonial[$i]['youtube_id'], 1);
                                                            }
                                                            ?>
                                                            <a class="product-video-trigger" data-video="<?php echo htmlspecialchars($video_ob['iframe']); ?>" href="#">Watch Video Interview <span class="icon-play-button-line"></span></a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                if (!empty($product_testimonial[$i]['file_url'])) {
                                                    ?>
                                                    <div class="columns small-12 medium-6">
                                                        <div class="wow slide-in <?php echo ((empty($product_testimonial[$i]['vimeo_id']) && empty($product_testimonial[$i]['youtube_id'])) ? 'text-center' : '') ?>">
                                                            <a href="<?php echo $product_testimonial[$i]['file_url']; ?>" target="_blank">Download Case Study <span class="icon-arrow-down"></span></a>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<?php
get_footer();
?>
