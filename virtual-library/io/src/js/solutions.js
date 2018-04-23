jQuery(document).ready(function($) {
    $('#solutions-testimonials-slider').slick({
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $('.solutions-video-trigger').on('click',function(){
        var iframe = $(this).data('video');
        $('#solutions-testimonials').append('<div class="video-iframe" class="flex-video widescreen vimeo">'+iframe+'<button class="video-close">&times;</button></div>');
        return false;
    });
    $('#solutions-testimonials').on('click', '.video-close', function(){
        $('.video-iframe').remove();
        return false;
    });
});