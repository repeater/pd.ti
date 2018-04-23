<?php
// registers simple fields functions only when the simple fields page is loaded on admin. if you know of a better hook, by all means...
function simple_fields_load() {
    require_once('fieldgroups.php');
    require_once('post-connectors.php');
}
add_action('load-settings_page_simple-fields-options','simple_fields_load');
