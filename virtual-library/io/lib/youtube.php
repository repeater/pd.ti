<?php
function get_youtube_html($imgid, $autoplay = 1) {
    if (empty($imgid)) {
        return null;
    }
    
    $data = get_transient('youtube.' . $imgid . '.' . $autoplay);

	 if (false === $data) {
        $iframe = "<iframe src='https://www.youtube.com/embed/".$imgid;
        $iframe.= "?autoplay=" . $autoplay . "&rel=0&amp;showinfo=0'";
        $iframe.= " frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
        
        $thumbnail = "http://img.youtube.com/vi/".$imgid."/0.jpg";

        $data = array(
            'thumbnail' => $thumbnail,
            'title'     => "",
            'iframe' 	=> $iframe
        );

        set_transient('youtube.' . $imgid . '.' . $autoplay, $data, 3600);
	 }

	return $data;
}