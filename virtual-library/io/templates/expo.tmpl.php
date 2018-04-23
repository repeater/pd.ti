<?php
/**
 * Template Name: Expo
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
$expo_static = simple_fields_fieldgroup('expo_static');
$expo_whys = simple_fields_fieldgroup('expo_whys');
$speakers = simple_fields_fieldgroup('speakers');
$expo_sessions_list = simple_fields_fieldgroup('expo_sessions_list');
$expo_session_agendas = simple_fields_fieldgroup('expo_session_agendas');
$expo_testimonials = simple_fields_fieldgroup('expo_testimonials');
?>
<div id="expo">
    <div id="expo-intro">
        <div class="row expanded align-middle">
            <div class="columns small-12 large-6 wow slide-in">
                <div class="intro-content">
                    <h2><?php echo $expo_static['intro_heading']; ?></h2>
                    <p><?php echo $expo_static['intro_description']; ?></p>
                </div>
            </div>
            <div class="columns hide-for-small-only hide-for-medium-only">
                <?php echo $expo_static['intro_image']['image']['full']; ?>
            </div>
        </div>
    </div>
    
    <div id="whys">
        <div class="row">
            <div class="columns">
                <h2 class="text-center wow slide-in"><?php echo $expo_static['why_heading']; ?></h2>
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
                    <div class="why">
                        <div class="text-center icon icon-<?php echo $icon; ?>"></div>
                        <h3 class="text-center"><?php echo $expo_whys[$i]['heading']; ?></h3>
                        <p class="text-center"><?php echo $expo_whys[$i]['text']; ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    
    <div id="speakers">
        <div class="row">
            <div class="columns">
                <h2 class="text-center wow slide-in"><?php echo $expo_static['speaker_heading']; ?></h2>
            </div>
        </div>
        <?php
        echo '<div id="bios" class="row" data-equalizer>';
            for ($i = 0; $i < count($speakers); $i++) {
                $name = $speakers[$i]['name'];
                $title = $speakers[$i]['title'];
                $bio = $speakers[$i]['bio'];
                $twitter = $speakers[$i]['twitter'];
                $linkedin = $speakers[$i]['linkedin'];
                $image_src = wp_get_attachment_image_src($speakers[$i]['image'],'medium');
                $image = $image[0];
                if (empty($bio)) {
                    $disabled = 'true';
                } else {
                    $disabled = 'false';
                }
                echo '<div class="medium-6 small-12 large-4 columns">';
                    echo '<a
                        href="#"
                        data-person="'.$i.'"
                        data-name="'.$name.'"
                        data-title="'.$title.'"
                        data-bio="'.htmlspecialchars($bio).'"
                        data-twitter="'.htmlspecialchars($twitter).'"
                        data-linkedin="'.htmlspecialchars($linkedin).'"
                        data-image="'.htmlspecialchars($image).'"
                        data-disabled="'.$disabled.'"
                        class="wow slide-in bio-link"
                        data-equalizer-watch
                        >';
                        echo '<div class="bio-image-wrap">';
                        if ($image) {
                            echo '<div class="bio-image original-image lazy" data-original="'.$image.'"></div>';
                        }
                        echo '</div>';
                        if ($name) {
                            echo '<h4>'.$name.'</h4>';
                        }
                        if ($title) {
                            echo '<p>'.$title.'</p>';
                        }
                    echo '</a>';
                echo '</div>';
            }
        echo '</div>';
        ?>
    </div>
    
    <?php $heading_wrapper_image = wp_get_attachment_image_src($expo_static['schedule_image']['id'],'full'); ?>
    <div id="expo-schedule-heading-wrapper" style="background-image: url('<?php echo $heading_wrapper_image[0]; ?>')">
        <div class="row">
            <div class="columns">
                <h2 class="text-center wow slide-in"><?php echo $expo_static['schedule_heading']; ?></h2>
            </div>
        </div>
    </div>
    
    <div id="expo-sessions">
        <div class="row align-center">
            <div class="columns large-10">
                <ul class="accordion session" data-accordion data-allow-all-closed="true">
                    <?php
                    for ($i = 0; $i < count($expo_sessions_list); $i++) {
                        if ($expo_sessions_list[$i]['session_type']['selected_value'] == 'Main Session') {
                            $title_type = 'main';
                        } elseif ($expo_sessions_list[$i]['session_type']['selected_value'] == 'Breakout Session') {
                            $title_type = 'breakout';
                        } elseif ($expo_sessions_list[$i]['session_type']['selected_value'] == 'Break') {
                            $title_type = 'break';
                        }
                        ?>
                        <li class="accordion-item <?php echo $title_type; ?>" data-accordion-item>
                            <a href="#" class="accordion-title">
                                <div class="row">
                                    <div class="columns">
                                        <h4 class="session-title">
                                            <?php echo $expo_sessions_list[$i]['title']; ?>
                                        </h4>
                                    </div>
                                    <div class="columns shrink">
                                        <h4 class="session-time">
                                            <?php echo $expo_sessions_list[$i]['start_time'] . ' - ' . $expo_sessions_list[$i]['end_time']; ?>
                                        </h4>
                                    </div>
                                </div>
                            </a>
                            <div class="accordion-content" data-tab-content>
                                <?php if ($title_type != 'break') {
                                    $session_agenda = array();
                                    for ($j = 0; $j < count($expo_session_agendas); $j++) {
                                        if ($expo_session_agendas[$j]['session_title'] == $expo_sessions_list[$i]['title']) {
                                            array_push($session_agenda, $expo_session_agendas[$j]);
                                        }
                                    }
                                    ?>
                                    <ul class="accordion agenda" data-accordion data-allow-all-closed="true">
                                        <?php
                                        for ($a = 0; $a < count($session_agenda); $a++) {
                                            ?>
                                            <li class="accordion-item" data-accordion-item>
                                                <a href="#" class="accordion-title">
                                                    <h4 class="session-title">
                                                        <?php echo $session_agenda[$a]['title']; ?>
                                                    </h4>
                                                </a>
                                                <div class="accordion-content" data-tab-content>
                                                    <?php
                                                    if (!empty($session_agenda[$a]['description'])) {
                                                        ?>
                                                        <p class="agenda-description">
                                                            <?php echo $session_agenda[$a]['description']; ?>
                                                        </p>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (!empty($session_agenda[$a]['speaker'])) {
                                                        ?>
                                                        <p class="agenda-speaker">
                                                            Speaker: <?php echo $session_agenda[$a]['speaker']; ?>
                                                        </p>
                                                        <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (!empty($session_agenda[$a]['cta_link']) && !empty($session_agenda[$a]['cta_text'])) {
                                                        ?>
                                                        <a href="<?php echo $session_agenda[$a]['cta_link']; ?>" class="button agenda-cta">
                                                            <?php echo $session_agenda[$a]['cta_text']; ?>
                                                        </a>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <?php
                                }
                                ?>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    
    <div id="expo-testimonials">
        <div class="row">
            <div class="columns">
                <h2 class="text-center wow slide-in"><?php echo $expo_static['testimonials_heading']; ?></h2>
            </div>
        </div>
        <div id="expo-testimonials-slider">
        <?php
        for ($i = 0; $i < count($expo_testimonials); $i++) {
            ?>
            <div>
                <div class="row align-center">
                    <?php
                    if ($i == (count($expo_testimonials) - 1)) {
                        $text_align = 'text-center';
                        $border = 'no-border'; 
                    } else {
                        $text_align = 'text-right';
                        $border = 'right-border';
                    }
                    ?>
                    <div class="columns small-12 medium-6 large-5 expo-testimonials <?php echo $border; ?>">
                        <div class="expo-testimonials-content">
                            <p class="testimonial-body <?php echo $text_align; ?>">“<?php echo $expo_testimonials[$i]['testimonial']; ?>”</p>
                            <p class="testimonial-info <?php echo $text_align; ?>"><?php echo $expo_testimonials[$i]['job']; ?></p>
                            <p class="testimonial-info <?php echo $text_align; ?>"><?php echo $expo_testimonials[$i]['location']; ?><p>
                        </div>
                    </div>
                    <?php
                    $i++;
                    if (!empty($expo_testimonials[$i])) {
                        ?>
                        <div class="columns small-12 medium-6 large-5 expo-testimonials">
                            <div class="expo-testimonials-content">
                                <p class="testimonial-body text-left">“<?php echo $expo_testimonials[$i]['testimonial']; ?>”</p>
                                <p class="testimonial-info text-left"><?php echo $expo_testimonials[$i]['job']; ?></p>
                                <p class="testimonial-info text-left"><?php echo $expo_testimonials[$i]['location']; ?><p>
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
<?php
get_footer();
?>