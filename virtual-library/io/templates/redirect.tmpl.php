<?php
/**
 * Template Name: Redirect Page
 *
 * @package WordPress
 * @subpackage syrup
 */
$redirect_fields = simple_fields_fieldgroup('redirect');
if (!empty($redirect_fields['page_redirect'])) {
    $url = $redirect_fields['page_redirect']['permalink'];
} else {
    $url = $redirect_fields['custom_page_redirection'];
}
wp_redirect($url,301);
exit;