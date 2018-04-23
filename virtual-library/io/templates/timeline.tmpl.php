<?php
/**
 * Template Name: Timeline
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
$events = simple_fields_fieldgroup('timeline_events');
function date_compare($a, $b)
{
    $t1_date_array = explode('/', $a['date']);
    $t1_timestamp = strtotime($t1_date_array[2].'-'.$t1_date_array[1].'-'.$t1_date_array[0]);
    $t2_date_array = explode('/', $b['date']);
    $t2_timestamp = strtotime($t2_date_array[2].'-'.$t2_date_array[1].'-'.$t2_date_array[0]);
    return $t1_timestamp - $t2_timestamp;
}
usort($events, 'date_compare');
?>
<div id="timeline-mobile" class="hide-for-large">
    <?php
    echo '<div class="timeline-slider" id="timeline-mobile-events" data-equalizer>';
    for($i=0; $i<count($events); $i++) {
        $date_array = explode('/', $events[$i]['date']);
        $timestamp = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0]);
        $date = date('F j, Y', $timestamp);
        $type = '<span class="event-type">'.$events[$i]['type']['selected_value'].'</span>';

        if ($events[$i]['image']['id'] == 0) {
            echo '<div class="mobile-event lazy background-cover no-image" style="background-image:url('.$events[$i]['image']['image_src']['large'][0].');">';
        } else {
            echo '<div class="mobile-event lazy background-cover" style="background-image:url('.$events[$i]['image']['image_src']['large'][0].');">';
        }
            echo '<div class="mobile-event-content" data-equalizer-watch>';
                echo '<h2>'.$date.'</h2>';
                echo '<h4>'.$events[$i]['title'].'</h4>';
                echo '<h5>'.$events[$i]['time'].' | '.$events[$i]['location'].'</h5>';
                echo '<h6>'.$type.'</h6>';
                echo $events[$i]['description'];
                $vimeo_video = get_vimeo_html($events[$i]['vimeo_id'], 1);
                $youtube_video = get_youtube_html($events[$i]['youtube_id'], 1);
                if (!empty($vimeo_video)) {
                    $video_ob = $vimeo_video;
                } elseif (!empty($youtube_video)) {
                    $video_ob = $youtube_video;
                }
                if (!empty($video_ob['iframe'])) {
                    if ($events[$i]['image']['id'] == 0) {
                        $icon = '<span class="icon-play gray-icon"></span>';
                    } else {
                        $icon = '<span class="icon-play"></span>';
                    }
                    $data_string = 'data-video="'.htmlspecialchars($video_ob['iframe']).'"';
                } else {
                    $icon = '';
                    $data_string = '';
                }
                echo '<a '.$data_string.' class="ss-video timeline-video-trigger"><div class="timeline-image-container">'.$icon.'</div></a>';
                echo '<div class=".timeline-button-row row align-center">';
                    if (!empty($events[$i]['learn_more_url'])) {
                        if ($events[$i]['image']['id'] == 0) {
                            echo '<div class="column small-6"><a href="'.$events[$i]['learn_more_url'].'" class="button gray-stroke-with-hot-pink-hover-gradient expanded">Learn More</a></div>';
                        } else {
                            echo '<div class="column small-6"><a href="'.$events[$i]['learn_more_url'].'" class="button white-stroke-with-hot-pink-hover-gradient expanded">Learn More</a></div>';
                        }
                    }
                    if (!empty($events[$i]['register_url'])) {
                        if ($events[$i]['image']['id'] == 0) {
                            echo '<div class="column small-6"><a href="'.$events[$i]['register_url'].'" class="button gray-stroke-with-hot-pink-hover-gradient expanded">Register</a></div>';
                        } else {
                            echo '<div class="column small-6"><a href="'.$events[$i]['register_url'].'" class="button white-stroke-with-hot-pink-hover-gradient expanded">Register</a></div>';
                        }
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '<ul class="slick-dots-syrup">';
    for($i=0; $i<count($events); $i++) {
        if ($i == 0) {
            $class = 'slick-active';
        } else {
            $class = '';
        }
        echo '<li data-slick="'.$i.'" class="'.$class.'"><button></button></li>';
    }
    echo '</ul>';
    ?>
</div>

<div id="timeline" class="show-for-large">
    <div class="clearfix">
        <div id="ss-container" class="ss-container">
            <div class="ss-center">
                <span class="
                icon-mouse"></span>
                <span class="icon-chevron-up"></span>
                <div class="ss-center-line"></div>
                <span class="icon-chevron-down"></span>
            </div>

<?php
for($i=0; $i<count($events); $i++) {
    $image = $events[$i]['image'];
    $date_array = explode('/', $events[$i]['date']);
    $timestamp = strtotime($date_array[2].'-'.$date_array[1].'-'.$date_array[0]);
    $date = date('F j, Y', $timestamp);
    $vimeo_video = get_vimeo_html($events[$i]['vimeo_id'], 1);
    $youtube_video = get_youtube_html($events[$i]['youtube_id'], 1);
    if (!empty($vimeo_video)) {
        $video_ob = $vimeo_video;
    } elseif (!empty($youtube_video)) {
        $video_ob = $youtube_video;
    }
    if (!empty($video_ob['iframe'])) {
        $icon = '<span class="icon-play"></span>';
        $data_string = 'data-video="'.htmlspecialchars($video_ob['iframe']).'"';
    } else {
        $icon = '';
        $data_string = '';
    }
    if ($image['id'] == 0) {
        $type = '<span class="event-type no-image">'.$events[$i]['type']['selected_value'].'</span>';
    } else {
        $type = '<span class="event-type">'.$events[$i]['type']['selected_value'].'</span>';
    }
    $padding_bottom = ($image['metadata']['height'] / $image['metadata']['width'] * 100) .'%';
    $content = '<div class="ss-content">';
    $content .= '<h2>'.$date.'</h2>';
    $content .= '<h4>'.$events[$i]['title'].'</h4>';
    $content .= '<h5>'.$events[$i]['time'].(!empty($events[$i]['time']) && !empty($events[$i]['location']) ? ' | ' : '').$events[$i]['location'].'</h5>';
    $content .= $events[$i]['description'];
    if ($i % 2 == 0) {
        $content .= '<div class="timeline-button-row row align-right">';
    } else {
        $content .= '<div class="timeline-button-row row align-left">';
    }
    if (!empty($events[$i]['learn_more_url'])) {
        $content .= '<div class="column small-5"><a href="'.$events[$i]['learn_more_url'].'" class="button gray-stroke-with-hot-pink-hover-gradient expanded">Learn More</a></div>';
    }
    if (!empty($events[$i]['register_url'])) {
        $content .= '<div class="column small-5"><a href="'.$events[$i]['register_url'].'" class="button gray-stroke-with-hot-pink-hover-gradient expanded">Register</a></div>';
    }
    $content .= '</div></div>';
    $link_image = '<a '.$data_string.' class="ss-image timeline-video-trigger"><div class="timeline-image-container" style="padding-bottom:'.$padding_bottom.'"><div class="lazy background-cover" data-original="'.$image['image_src']['large'][0].'"></div>'.$icon.'</div>'.$type.'</a>';
    // if ($i == (count($events) - 1)) {
    //     $row_id = 'last-event';
    // } else {
    //     $row_id = '';
    // }
    $row_id = str_replace(' ', '-', strtolower($events[$i]['title']));
    echo '<div class="ss-row" id="'.$row_id.'">';
        echo '<div class="ss-left">';
        if ($i % 2 == 0) {
            echo $content;
        } else {
            echo $link_image;
        }
        echo '</div>';
        echo '<div class="ss-right">';
        if ($i % 2 == 0) {
            echo $link_image;
        } else {
            echo $content;
        }
        echo '</div>';
    echo '</div>';
}
?>


        </div>
    </div>
</div>

<?php
// google events markup
for($i=0; $i<count($events); $i++) {
    $image = $events[$i]['image'];
    $date_array = explode('/', $events[$i]['date']);
    echo '<script type="application/ld+json">';
        echo '{';
            echo '"@context": "http://schema.org",';
            echo '"@type": "Event",';
            echo '"name": "'.$events[$i]['title'].'",';
            if ($image['id'] > 0) {
                echo '"image": "'.$image['image_src']['large'][0].'",';
            }
            echo '"description" : "'.$events[$i]['description'].'",';
            echo '"startDate" : "'.$date_array[2].'-'.$date_array[1].'-'.$date_array[0].'",';
            if (!empty($events[$i]['learn_more_url'])) {
                echo '"url" : "'.$events[$i]['learn_more_url'].'",';
            } elseif (!empty($events[$i]['register_url'])) {
                echo '"url" : "'.$events[$i]['register_url'].'",';
            }
            echo '"location" : {';
                echo '"@type" : "'.$events[$i]['type']['selected_value'].'",';
                if (!empty($events[$i]['location'])) {
                    echo '"address" : "'.$events[$i]['location'].'"';
                }
            echo '}';
        echo '}';
    echo '</script>';
}
get_footer();
?>
