<?php

function truncate($string,$length=100,$append="&hellip;") {
  $string = trim($string);
  if(strlen($string) > $length) {
    $string = wordwrap($string, $length);
    $string = explode("\n", $string, 2);
    $string = $string[0] . $append;
  }

  return $string;
}

function app_output_buffer() {
  ob_start();
} // soi_output_buffer
add_action('init', 'app_output_buffer');