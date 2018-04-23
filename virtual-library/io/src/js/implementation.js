jQuery(document).ready(function($) {
    $('#implementation-tabs a[data-tab=1]').trigger('click', ['noscroll']);

    $('#implementation-testimonials-slider').slick({
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $('.implementation-video-trigger').on('click',function(){
        var iframe = $(this).data('video');
        $('#implementation-testimonials').append('<div class="video-iframe" class="flex-video widescreen vimeo">'+iframe+'<button class="video-close">&times;</button></div>');
        return false;
    });
    $('#implementation-testimonials').on('click', '.video-close', function(){
        $('.video-iframe').remove();
        return false;
    });
});