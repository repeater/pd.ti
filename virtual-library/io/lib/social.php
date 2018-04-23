<?php
function social_menu($id) {
    $options = get_option( 'syrup_settings' );
    $social_fields = array(
        'twitter',
        'facebook',
        'linkedin',
        'googleplus',
        'instagram',
        'pinterest',
        'vimeo',
        'youtube'
    );
    $menu = '<ul id="'.$id.'">';
    for ($i = 0; $i < count($social_fields); $i++) {
        $url = $options['syrup_settings_'.$social_fields[$i]];
        if (!empty($url)) {
            $menu .= '<li><a href="'.$url.'" target="_blank"><span class="icon-'.$social_fields[$i].'"></span></a></li>';
        }
    }
    $menu .= '</ul>';
    return $menu;
}
