jQuery(document).ready(function($) {
    $('.product-media-slider').slick({
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true
    });

    $('.play-product-video').on('click', function() {
        $('#product-video').find('.video-container').append('<div class="flex-video">' + $('.play-product-video').data('video') + '</div>');
    });

    $('.reveal .close-button').on('click', function() {
        $('.close-button').closest('.reveal').find('.flex-video').remove();
    });

    $('#product-testimonials-slider').slick({
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $('.product-video-trigger').on('click',function(){
        var iframe = $(this).data('video');
        $('#testimonials').append('<div class="video-iframe" class="flex-video widescreen vimeo">'+iframe+'<button class="video-close">&times;</button></div>');
        return false;
    });
    $('#testimonials').on('click', '.video-close', function(){
        $('.video-iframe').remove();
        return false;
    });

    $('.benefits-video-trigger').on('click',function(){
        var iframe = $(this).data('video');
        $('#product-benefits-section').append('<div class="video-iframe" class="flex-video widescreen vimeo">'+iframe+'<button class="video-close">&times;</button></div>');
        return false;
    });
    $('#product-benefits-section').on('click', '.video-close', function(){
        $('.video-iframe').remove();
        console.log('test');
        return false;
    });
    $('#product-benefits-slider').slick({
        dots: true,
        arrows: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        // autoplay: true,
        autoplaySpeed: 5000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
});