<?php
/**
 * Template Name: Investment
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
$investment_static = simple_fields_fieldgroup('investment_static');
?>
<div id="investment-top">
    <div class="top-section">
        <div class="row align-center vertical-pad">
            <div class="columns large-9 medium-10 text-center">
                <h2><?php echo $investment_static['title_1']; ?></h2>
                <?php echo $investment_static['text_1']; ?>
            </div>
        </div>
    </div>
    <div class="top-section">
        <div class="row align-center vertical-pad">
            <div class="columns large-9 medium-10 text-center">
                <h2><?php echo $investment_static['title_2']; ?></h2>
                <?php echo $investment_static['text_2']; ?>
                <hr>
            </div>
        </div>
    </div>
</div>
<div id="package-callout-wrapper">
    <div class="row align-center">
        <div class="column large-6">
            <div class="alert callout">
                <h5>Invalid form submission.</h5>
                <p>Please select at least 1 package.</p>
            </div>
        </div>
    </div>
</div>
<div class="package">
    <div class="row align-center">
        <div class="medium-3 small-12 columns">
            <div class="fancy-check">
                <input type="checkbox" name="packages[]" class="package-input student-package-input" id="classroom-package">
                <label class="package-label green" for="classroom-package"><span class="icon-check"></span></label>
            </div>
        </div>
        <div class="medium-6 small-12 columns">
            <h3><?php echo $investment_static['product_1_title']; ?></h3>
            <?php echo $investment_static['product_1_content']; ?>
            <a href="<?php echo $investment_static['product_1_url']; ?>" class="button green">Learn More</a>
        </div>
        <div class="medium-3 small-12 columns">
            <div class="row">
                <div class="shrink columns">
                    <div class="stat">
                        $<span class="package-cost" id="product-1-cost">4</span>
                    </div>
                </div>
                <div class="columns">
                    <p class="lead">per student</p>
                    <p class="small discount-label">discount applied</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="package">
    <div class="row align-center">
        <div class="medium-3 small-12 columns">
            <div class="fancy-check">
                <input type="checkbox" name="packages[]" class="package-input student-package-input" id="insights-package">
                <label class="package-label green" for="insights-package"><span class="icon-check"></span></label>
            </div>
        </div>
        <div class="medium-6 small-12 columns">
            <h3><?php echo $investment_static['product_2_title']; ?></h3>
            <?php echo $investment_static['product_2_content']; ?>
            <a href="<?php echo $investment_static['product_2_url']; ?>" class="button green">Learn More</a>
        </div>
        <div class="medium-3 small-12 columns">
            <div class="row">
                <div class="shrink columns">
                    <div class="stat">
                        $<span class="package-cost" id="product-2-cost">5</span>
                    </div>
                </div>
                <div class="columns">
                    <p class="lead">per student</p>
                    <p class="small discount-label">discount applied</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="package">
    <div class="row align-center">
        <div class="medium-3 small-12 columns">
            <div class="fancy-check">
                <input type="checkbox" name="packages[]" class="package-input student-package-input" id="assessments-package">
                <label class="package-label green" for="assessments-package"><span class="icon-check"></span></label>
            </div>
        </div>
        <div class="medium-6 small-12 columns">
            <h3><?php echo $investment_static['product_3_title']; ?></h3>
            <?php echo $investment_static['product_3_content']; ?>
            <a href="<?php echo $investment_static['product_3_url']; ?>" class="button green">Learn More</a>
        </div>
        <div class="medium-3 small-12 columns">
            <div class="row">
                <div class="shrink columns">
                    <div class="stat">
                        $<span class="package-cost" id="product-3-cost">6</span>
                    </div>
                </div>
                <div class="columns">
                    <p class="lead">per student</p>
                    <p class="small discount-label">discount applied</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="package">
    <div class="row align-center">
        <div class="medium-3 small-12 columns">
            <div class="fancy-check">
                <input type="checkbox" name="packages[]" class="package-input educator-package-input" id="educator-package">
                <label class="package-label purple" for="educator-package"><span class="icon-check"></span></label>
            </div>
        </div>
        <div class="medium-6 small-12 columns">
            <h3><?php echo $investment_static['product_4_title']; ?></h3>
            <?php echo $investment_static['product_4_content']; ?>
            <a href="<?php echo $investment_static['product_4_url']; ?>" class="button purple">Learn More</a>
        </div>
        <div class="medium-3 small-12 columns">
            <div class="row">
                <div class="shrink columns">
                    <div class="stat">
                        $<span class="package-cost" id="product-4-cost">1600</span>
                    </div>
                </div>
                <div class="columns">
                    <p class="lead">per building</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="package">
    <div class="row align-center">
        <div class="medium-3 small-12 columns">
            <div class="fancy-check">
                <input type="checkbox" name="packages[]" class="package-input operational-package-input" id="operational-package">
                <label class="package-label orange" for="operational-package"><span class="icon-check"></span></label>
            </div>
        </div>
        <div class="medium-6 small-12 columns">
            <h3><?php echo $investment_static['product_5_title']; ?></h3>
            <?php echo $investment_static['product_5_content']; ?>
            <a href="<?php echo $investment_static['product_5_url']; ?>" class="button orange">Learn More</a>
        </div>
        <div class="medium-3 small-12 columns">
            <div class="row">
                <div class="shrink columns">
                    <div class="stat">
                        $<span class="package-cost" id="product-5-cost">400</span>
                    </div>
                </div>
                <div class="columns">
                    <p class="lead">per functional area</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="pricing">
    <div class="row">
        <div class="columns text-center">
            <?php echo $investment_static['text_3']; ?>
        </div>
    </div>
    <div class="pricing-breakdown-wrapper">
        <div class="row">
            <div class="column">
                <h3 class="text-center">STUDENT ACHIEVEMENT</h3>
            </div>
        </div>
        <div id="student-callout-wrapper">
            <div class="row align-center">
                <div class="column large-6">
                    <div class="alert callout">
                        <h5>Invalid form submission.</h5>
                        <p>Please enter a student number greater than 0.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-center align-middle" id="savings-stats">
            <div class="columns small-12 large-3">
                <span class="stat stat-1">
                    $<span class="student-cost">0</span>
                    <small>per student</small>
                </span>
            </div>
            <div class="columns small-12 large-1">
                <span class="stat">
                    <small>X</small>
                </span>
            </div>
            <div class="columns small-12 large-4">
                <span class="stat stat-2">
                    <div class="row align-center">
                        <div class="columns">
                            <input type="number" value="10000" name="student-count" id="student-count">
                        </div>
                        <div class="columns">
                            <small>students</small>
                        </div>
                    </div>
                </span>
            </div>
        </div>
        <div class="row align-center">
            <div class="columns small-12">
                <p class="stat" id="savings-stat"><small>You save</small> <span class="saving-stat-wrap">$<span id="savings">0</span></span> <small>per year with the discount bundle!</small></p>
            </div>
        </div>
    </div>

    <hr>
    
    <div class="pricing-breakdown-wrapper">
        <div class="row">
            <div class="column">
                <h3 class="text-center">EDUCATOR EFFECTIVENESS</h3>
            </div>
        </div>
        <div id="educator-callout-wrapper">
            <div class="row align-center">
                <div class="column large-6">
                    <div class="alert callout">
                        <h5>Invalid form submission.</h5>
                        <p>Please enter a building number greater than 0.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-center align-middle" id="savings-stats">
            <div class="columns small-12 large-3">
                <span class="stat stat-1">
                    $<span class="educator-cost">0</span>
                    <small>per building</small>
                </span>
            </div>
            <div class="columns small-12 large-1">
                <span class="stat">
                    <small>X</small>
                </span>
            </div>
            <div class="columns small-12 large-4">
                <span class="stat stat-2">
                    <div class="row align-center">
                        <div class="columns">
                            <input type="number" value="0" name="educator-count" id="educator-count" class="educator-count">
                        </div>
                        <div class="columns">
                            <small>buildings</small>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </div>
    
    <hr>

    <div class="pricing-breakdown-wrapper">
        <div class="row">
            <div class="column">
                <h3 class="text-center">OPERATIONS EFFICIENCY</h3>
            </div>
        </div>
        <div id="operational-callout-wrapper">
            <div class="row align-center">
                <div class="column large-6">
                    <div class="alert callout">
                        <h5>Invalid form submission.</h5>
                        <p>Please enter a functional area number greater than 0.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-center align-middle" id="savings-stats">
            <div class="columns small-12 large-2">
                <span class="stat stat-1">
                    $<span class="operational-cost">0</span>
                    <small>per area</small>
                </span>
            </div>
            <div class="columns small-12 large-1">
                <span class="stat">
                    <small>X</small>
                </span>
            </div>
            <div class="columns small-12 large-4">
                <span class="stat stat-2">
                    <div class="row align-center">
                        <div class="columns">
                            <input type="number" value="0" name="operational-count" id="operational-count">
                        </div>
                        <div class="columns">
                            <small>areas</small>
                        </div>
                    </div>
                </span>
            </div>
            <div class="columns small-12 large-1">
                <span class="stat">
                    <small>X</small>
                </span>
            </div>
            <div class="columns small-12 large-4">
                <span class="stat stat-2">
                    <div class="row align-center">
                        <div class="columns">
                            <input type="number" value="0" name="operational-building-count" id="operational-building-count" class="operational-building-count">
                        </div>
                        <div class="columns">
                            <small>buildings</small>
                        </div>
                    </div>
                </span>
            </div>
        </div>
    </div>
</div>


<div class="totals">
    <div class="row align-right">
        <div class="columns">
            <h3 class="text-right">STUDENT ACHIEVEMENT</h3>
        </div>
        <div class="small-6 medium-4 large-3 columns">
            <div class="stat">
                <span class="invisible">-</span>$<span id="student-total">0</span>
            </div>
        </div>
    </div>
    <div class="row align-right">
        <div class="columns">
            <h3 class="text-right">EDUCATOR EFFECTIVENESS</h3>
        </div>
        <div class="small-6 medium-4 large-3 columns">
            <div class="stat">
                <span class="invisible">-</span>$<span id="educator-total">0</span>
            </div>
        </div>
    </div>
    <div class="row align-right">
        <div class="columns">
            <h3 class="text-right">OPERATIONS EFFICIENCY</h3>
        </div>
        <div class="small-6 medium-4 large-3 columns">
            <div class="stat">
                <span class="invisible">-</span>$<span id="operational-total">0</span>
            </div>
        </div>
    </div>
    <hr>
    <div class="row align-right">
        <div class="columns">
            <h3 class="text-right">TOTAL</h3>
        </div>
        <div class="small-6 medium-4 large-3 columns">
            <div class="stat">
                <span class="invisible">-</span>$<span id="total">0</span>
            </div>
        </div>
    </div>
    
    <div id="submission">
        <div class="row">
            <div class="columns text-center">
                <a href="/pricing-form" class="button" id="submit-button">Submit Pricing</a>
                <div class="disclaimer">
                    <?php echo $investment_static['disclaimer']; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
