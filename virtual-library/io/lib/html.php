<?php
function get_button_html($key) {
	$html = '';
	
	$button_text = simple_fields_value('event_' . $key . '_button_text');

	$button_link = simple_fields_value('event_' . $key . '_button_file');

	if (!empty($button_link)) {
		$button_link = wp_get_attachment_url($button_link);
		$is_link = false;
	} else {
		$button_link = simple_fields_value('event_' . $key . '_button_link');
		$is_link = true;
	}

	if (!empty($button_link) || !empty($button_text)) {	
		//$html .= '<div class="sticky-bum"><a href="' . $button_link . '" class="btn btn-warning btn-lg" download="event_' . $key . '.pdf" ';
		$html .= '<div class="sticky-bum"><a href="' . $button_link . '" class="btn btn-warning btn-lg"';

		// removed this logic to give user more flexibility
		// if ($key == 'register') {
		// 	$html .= 'target="_blank"';
		// } else {
		// 	$html .= 'download="event_' . $key . '.pdf"';
		// }
		
		// added logic to open new window for links
		if ($is_link === true) {
			$html .= ' target="_blank"';
		}

		if (empty($button_link)) {
			$html .= ' disabled=""';
		}

		if (empty($button_text)) {
			$html .= ' disabled=""';
		}
		
		$html .= '>';
		$html .= $button_text;
		$html .= ' <i class="fa fa-';
		
		if ($key == 'register') {
			$html .= 'share-square-o';
		} else {
			$html .= 'download';
		}
		
		$html .= ' fa-lg fa-fw"></i></a></div>';
	}

	return $html;
}



