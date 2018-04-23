<?php
/**
 * Template Name: Careers
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
$careers_static = simple_fields_fieldgroup('careers_static');
$jobs = simple_fields_fieldgroup('jobs');
$careers_values = simple_fields_fieldgroup('careers_values');
$careers_benefits = simple_fields_fieldgroup('careers_benefits');
$careers_testimonials = simple_fields_fieldgroup('careers_testimonials');
?>
<div id="careers">
    <div id="hero-linkedin">
        <div class="row">
            <div class="columns text-center">
                <?php
                $options = get_option( 'syrup_settings' );
                $url = $options['syrup_settings_linkedin'];
                ?>
                <a href="<?php echo $url; ?>" target="_blank" class="wow slide-in"><span class="icon-linkedin"></span></a>
            </div>
        </div>
    </div>
    <div id="post-hero">
        <div class="row">
            <div class="columns text-center">
                <h2 class="wow slide-in"><?php echo $careers_static['title_1']; ?></h2>
            </div>
        </div>
        <div class="row align-center">
            <div class="columns large-10 text-center">
                <p class="wow slide-in"><?php echo $careers_static['text_1']; ?></p>
            </div>
        </div>
    </div>

    <div id="jobs-wrapper">
        <div class="row">
            <div class="columns">
                <div class="row wow slide-in">
                    <div class="small-12 medium-3 columns" id="jobs-menu">
                        <h3><?php echo $careers_static['jobs_heading']; ?></h3>
                        <ul class="tabs vertical" id="jobs-tabs" data-tabs>
                            <?php
                            for ($i = 0; $i < count($jobs); $i++) {
                                ?>
                                <li class="tabs-title <?php if ($i == 0) { echo 'is-active'; } ?>">
                                    <a href="#panel<?php echo $i; ?>"><?php echo $jobs[$i]['job_title_short']; ?><span class="icon icon-chevron-right"></span></a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="small-12 medium-9 columns" id="job-postings">
                        <div class="tabs-content vertical" data-tabs-content="jobs-tabs">
                            <?php
                            if (count($jobs) == 0) {
                                ?>
                                <div class="tabs-panel is-active" id="no-jobs">
                                    <div class="job-post-header">
                                        <h4>There are currently no job openings.</h4>
                                    </div>
                                </div>
                                <?php
                            } else {
                                for ($i = 0; $i < count($jobs); $i++) {
                                    ?>
                                    <div class="tabs-panel <?php if ($i == 0) { echo 'is-active'; } ?>" id="panel<?php echo $i; ?>">
                                        <div class="job-post-header">
                                            <h4><?php echo $jobs[$i]['job_title']; ?></h4>
                                            <h5><?php echo $jobs[$i]['location']; ?></h5>
                                        </div>
                                        <div class="job-post-info">
                                            <table>
                                                <tr>
                                                    <td>
                                                        Industry
                                                    </td>
                                                    <td>
                                                        <?php echo $jobs[$i]['industry']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Employment type
                                                    </td>
                                                    <td>
                                                        <?php echo $jobs[$i]['employment_type']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Experience
                                                    </td>
                                                    <td>
                                                        <?php echo $jobs[$i]['experience']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Job function
                                                    </td>
                                                    <td>
                                                        <?php echo $jobs[$i]['job_function']; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="job-post-description">
                                            <?php echo $jobs[$i]['job_description']; ?>
                                        </div>
                                        <div class="job-post-cta">
                                            <a href="<?php echo $jobs[$i]['job_url']; ?>" class="button secondary">
                                                <span class="inline-button-icon icon-<?php echo $jobs[$i]['cta_icon']['selected_value']; ?>"></span>Apply
                                            </a>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="values">
        <div class="row">
            <div class="columns">
                <h2 class="text-center wow slide-in"><?php echo $careers_static['values_heading']; ?></h2>
            </div>
        </div>
        <div class="row">
            <?php
            for ($i = 0; $i < 4; $i++) {
                if ($i == 0) {
                    $icon = 'light-bulb';
                } elseif ($i == 1) {
                    $icon = 'light';
                } elseif ($i == 2) {
                    $icon = 'house';
                } elseif ($i == 3) {
                    $icon = 'diamond';
                }
                ?>
                <div class="columns medium-6 large-3 wow slide-in">
                    <div class="value">
                        <div class="text-center icon icon-<?php echo $icon; ?>"></div>
                        <h3 class="text-center"><?php echo $careers_values[$i]['heading']; ?></h3>
                        <p class="text-center"><?php echo $careers_values[$i]['text']; ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <div id="benefits">
        <div class="row">
            <div class="columns">
                <h2 class="text-center wow slide-in"><?php echo $careers_static['benefits_heading']; ?></h2>
            </div>
        </div>
        <div id="benefits">
            <div class="row">
                <div class="columns small-12">
                    <div class="row" data-equalizer>
                    <?php
                    for ($i = 0; $i < count($careers_benefits); $i++) {
                        echo '<div class="columns tile-column small-12 medium-6 large-4 text-center">';
                        echo '<div class="tile wow slide-in" style="background-image:url('.$careers_benefits[$i]['background_image']['url'].')" data-equalizer-watch>';
                                echo '<div class="tile-inner">';
                                    echo '<h3>'.$careers_benefits[$i]['heading'].'</h3>';
                                    echo '<p>'.$careers_benefits[$i]['text'].'</p>';
                                echo '</div>';
                                echo '<div class="tile-inner title-only">';
                                    echo '<h3>'.$careers_benefits[$i]['heading'].'</h3>';
                                echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="testimonials">
        <div class="row">
            <div class="columns">
                <h2 class="text-center wow slide-in"><?php echo $careers_static['testimonials_heading']; ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="columns">
                <div id="careers-testimonials-slider">
                <?php
                for ($i = 0; $i < count($careers_testimonials); $i++) {
                    ?>
                    <div>
                        <div class="row align-center">
                            <?php
                            if ($i == (count($careers_testimonials) - 1)) {
                                $text_align = 'medium-text-center';
                                $border = 'no-border';
                            } else {
                                $text_align = 'medium-text-right';
                                $border = 'right-border';
                            }
                            ?>
                            <div class="columns small-12 medium-6 large-5 careers-testimonials <?php echo $border; ?>">
                                <div class="careers-testimonials-content">
                                    <p class="testimonial-body <?php echo $text_align; ?>">“<?php echo $careers_testimonials[$i]['testimonial']; ?>”</p>
                                    <h5 class="testimonial-info <?php echo $text_align; ?>"><?php echo $careers_testimonials[$i]['job']; ?></h5>
                                    <h6 class="testimonial-info <?php echo $text_align; ?>"><?php echo $careers_testimonials[$i]['location']; ?><h6>
                                </div>
                            </div>
                            <?php
                            $i++;
                            if (!empty($careers_testimonials[$i])) {
                                ?>
                                <div class="columns small-12 medium-6 large-5 careers-testimonials">
                                    <div class="careers-testimonials-content">
                                        <p class="testimonial-body text-left">“<?php echo $careers_testimonials[$i]['testimonial']; ?>”</p>
                                        <h5 class="testimonial-info text-left"><?php echo $careers_testimonials[$i]['job']; ?></h5>
                                        <h6 class="testimonial-info text-left"><?php echo $careers_testimonials[$i]['location']; ?><h6>
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
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
