<?php
// Include the Google Analytics Tracking Code (ga.js)
// @ https://developers.google.com/analytics/devguides/collection/gajs/
function google_analytics_tracking_code(){

    if (!preg_match("#http:\/\/(test|dev|local)(.*?)#",get_site_url())) {
        $options = get_option('syrup_settings');
        if (!empty($options['syrup_settings_scripts'])) {
            echo $options['syrup_settings_scripts'];
        }
    } else {
        echo '<!-- ' . get_site_url() . ' is not production so NO analytics here -->'."\n"; }
}

// include GA tracking code before the closing head tag
// add_action('wp_head', 'google_analytics_tracking_code');

// OR include GA tracking code before the closing body tag
add_action('wp_footer', 'google_analytics_tracking_code');
