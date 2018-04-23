<?php
function is_serial($string) {
	return (@unserialize($string) !== false || $string == 'b:0;');
}

function curl_fetch($url) {
	$c = curl_init();
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($c, CURLOPT_URL, $url);
	$data = curl_exec($c);
	curl_close($c);

	if (is_serial($data)) {
		return unserialize($data);
	} else {
		return false;
	}
}

function get_vimeo_html($imgid, $autoplay = 1) {
	if (empty($imgid)) {
        return null;
    }

    $data = get_transient('vimeo.' . $imgid . '.' . $autoplay);

	 if (false === $data) {

		$data = array();

		$curl_data = curl_fetch("http://vimeo.com/api/v2/video/$imgid.php");
        
		if ($curl_data) {
			$iframe = "<iframe src='//player.vimeo.com/video/".$imgid."?title=0&amp;byline=0&amp;portrait=0&amp;color=d82f89";
			$iframe.= "&amp;autoplay=" . $autoplay . "'";
			$iframe.= " frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
            
            $thumbnail = preg_replace("/^http:/i", "https:", $curl_data[0]['thumbnail_large']);

			$data = array(
				'thumbnail' => $thumbnail,
				'title' 		=> $curl_data[0]['title'],
				'iframe' 	=> $iframe
			);

			 set_transient('vimeo.' . $imgid . '.' . $autoplay, $data, 3600);
		}
	 }

	return $data;
}
