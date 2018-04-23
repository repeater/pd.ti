jQuery(document).ready(function($) {
    $('.media-video-trigger').on('click',function(){
        var iframe = $(this).data('video');
        $('#media-videos').append('<div class="video-iframe" class="flex-video widescreen vimeo">'+iframe+'<button class="video-close">&times;</button></div>');
        return false;
    });
    $('#media-videos').on('click', '.video-close', function(){
        $('.video-iframe').remove();
        return false;
    });
});