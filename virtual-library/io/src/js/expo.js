jQuery(document).ready(function($) {
    $('#expo-testimonials-slider').slick({
        dots: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true
    });
    
    $('.accordion-title').click(function() {
        var head_height = $('#header').height() + 16;
        var target = $(this);
        setTimeout(function() {
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - head_height
                }, 1000);
                return false;
            }
        }, 250);
    });
});