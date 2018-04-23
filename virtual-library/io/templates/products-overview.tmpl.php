<?php
/**
 * Template Name: Products Overview
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
$products_static = simple_fields_fieldgroup('products_static');
$product_descriptions = simple_fields_fieldgroup('product_descriptions');
$student_products = simple_fields_fieldgroup('student_products');
$educator_products = simple_fields_fieldgroup('educator_products');
$operations_products = simple_fields_fieldgroup('operations_products');
?>
<div id="products-overview">
    <div id="post-hero">
        <div class="row align-center">
            <div class="columns medium-10 large-8">
                <h2 class="text-center wow slide-in"><?php echo $products_static['title_1']; ?></h2>
            </div>
        </div>
        <div class="row align-center">
            <div class="columns medium-10 large-8">
                <p class="text-center wow slide-in"><?php echo $products_static['text_1']; ?></p>
            </div>
        </div>
    </div>

    <div id="overviews">
        <div class="row overviews-title-section">
            <div class="column">
                <h2 class="wow slide-in"><?php echo $products_static['student_title']; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="overview-product-description">
                    <?php echo $product_descriptions['student_products_text']; ?>
                </div>
            </div>
        </div>
        <div class="row" data-equalizer>
            <?php
            for ($i = 0; $i < count($student_products); $i++) {
                if ($i == 0) {
                    $icon = 'icon-bookmark';
                    $color = 'green';
                } elseif ($i == 1) {
                    $icon = 'icon-helm';
                    $color = 'green';
                } elseif ($i == 2) {
                    $icon = 'icon-edit';
                    $color = 'green';
                } elseif ($i == 3) {
                    $icon = 'icon-clipboard3';
                    $color = 'green';
                } elseif ($i == 4) {
                    $icon = 'icon-helm';
                    $color = 'green';
                } elseif ($i == 5) {
                    $icon = 'icon-clipboard3';
                    $color = 'green';
                }
                ?>
                <div class="columns small-12 medium-6 large-4 wow slide-in">
                    <div class="overview-icon-wrapper text-center">
                        <span class="icon-wrapper <?php echo $color; ?>">
                            <span class="icon <?php echo $icon; ?>"></span>
                        </span>
                    </div>
                    <div class="overview">
                        <div data-equalizer-watch>
                            <div class="overview-logo">
                                <?php
                                if ($i == 0) {
                                    get_template_part('partials/classroom-logo');
                                } elseif ($i == 1) {
                                    get_template_part('partials/insights-logo');
                                } elseif ($i == 2) {
                                    get_template_part('partials/assessment-logo');
                                } elseif ($i == 3) {
                                    get_template_part('partials/plans-logo');
                                } elseif ($i == 4) {
                                    get_template_part('partials/pupil-path-logo');
                                } elseif ($i == 5) {
                                    get_template_part('partials/pals-logo');
                                }
                                ?>
                            </div>
                            <div class="overview-description" data-equalizer-watch>
                                <p><?php echo $student_products[$i]['short_description']; ?></p>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="<?php echo $student_products[$i]['button_url']; ?>" class="button <?php echo $color; ?>">
                                <span class="inline-button-icon icon-info"></span> Learn More
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <div class="row overviews-title-section">
            <div class="column">
                <h2 class="wow slide-in"><?php echo $products_static['educator_title']; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="overview-product-description">
                    <?php echo $product_descriptions['educator_products_text']; ?>
                </div>
            </div>
        </div>
        <div class="row" data-equalizer>
            <?php
            for ($i = 0; $i < count($educator_products); $i++) {
                if ($i == 0) {
                    $icon = 'icon-trophy';
                    $color = 'purple';
                } elseif ($i == 1) {
                    $icon = 'icon-clipboard3';
                    $color = 'purple';
                } elseif ($i == 2) {
                    $icon = 'icon-helm';
                    $color = 'purple';
                }
                ?>
                <div class="columns small-12 medium-6 large-4 wow slide-in">
                    <div class="overview-icon-wrapper text-center">
                        <span class="icon-wrapper <?php echo $color; ?>">
                            <span class="icon <?php echo $icon; ?>"></span>
                        </span>
                    </div>
                    <div class="overview">
                        <div data-equalizer-watch>
                            <div class="overview-logo">
                                <?php
                                if ($i == 0) {
                                    get_template_part('partials/talent-logo');
                                } elseif ($i == 1) {
                                    get_template_part('partials/casenexpd-logo');
                                } elseif ($i == 2) {
                                    get_template_part('partials/valed-logo-2');
                                }
                                ?>
                            </div>
                            <div class="overview-description">
                                <p><?php echo $educator_products[$i]['short_description']; ?></p>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="<?php echo $educator_products[$i]['button_url']; ?>" class="button <?php echo $color; ?>">
                                <span class="inline-button-icon icon-info"></span> Learn More
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <div class="row overviews-title-section">
            <div class="column">
                <h2 class="wow slide-in"><?php echo $products_static['operations_title']; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="overview-product-description">
                    <?php echo $product_descriptions['operations_products_text']; ?>
                </div>
            </div>
        </div>
        <div class="row" data-equalizer>
            <?php
            for ($i = 0; $i < count($operations_products); $i++) {
                if ($i == 0) {
                    $icon = 'icon-clipboard3';
                    $color = 'orange';
                }
                ?>
                <div class="columns small-12 medium-6 large-4 wow slide-in">
                    <div class="overview-icon-wrapper text-center">
                        <span class="icon-wrapper <?php echo $color; ?>">
                            <span class="icon <?php echo $icon; ?>"></span>
                        </span>
                    </div>
                    <div class="overview">
                        <div data-equalizer-watch>
                            <div class="overview-logo">
                                <?php
                                if ($i == 0) {
                                    get_template_part('partials/operations-logo');
                                }
                                ?>
                            </div>
                            <div class="overview-description">
                                <p><?php echo $operations_products[$i]['short_description']; ?></p>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="<?php echo $operations_products[$i]['button_url']; ?>" class="button <?php echo $color; ?>">
                                <span class="inline-button-icon icon-info"></span> Learn More
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>
