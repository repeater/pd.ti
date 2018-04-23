// learn more dropdownmenu-min-width
var c=document.getElementById('home-graph-radius');
if (typeof(c) != 'undefined' && c != null) {
    var cnumber = c.dataset.number;
    var cnumberPrepared = (cnumber / 100 * 2) - 0.5;
    var ctx=c.getContext('2d');
    ctx.beginPath();
    ctx.arc(150,150,123,1.5*Math.PI,cnumberPrepared*Math.PI);
    ctx.lineWidth=50;
    ctx.strokeStyle="#bb1e6d";
    ctx.stroke();
}
// district image slider
$('#district-images').slick({
    dots: false,
    arrows: false,
    centerMode: true,
    slidesToShow: 9,
    slidesToScroll: 9,
    centerPadding: '20px',
    autoplay: true,
    autoplaySpeed: 500,
    infinite: true,
    responsive: [
        {
            breakpoint: 1324,
            settings: {
                slidesToShow: 7,
                slidesToScroll: 7,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 5,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }
    ]
});
$('#district-images').on('afterChange', function(event, slick, direction){
    // $('.lazy').lazyload();
});
// district image slider
$('#awards-images').slick({
    arrows: false,
    slidesToShow: 8,
    slidesToScroll: 8,
    dots: true,
    initialSlide: -2,
    centerPadding: '20px',
    autoplay: true,
    autoplaySpeed: 500,
    infinite: true,
    responsive: [
        {
            breakpoint: 1324,
            settings: {
                slidesToShow: 8,
                slidesToScroll: 8,
                infinite: true,
                dots: true,
                initialSlide: -2
            }
        },
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
                infinite: true,
                dots: true,
                initialSlide: 0
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                centerMode: true,
                initialSlide: 0
            }
        }
    ]
});
// home video
$('.home-video-trigger').on('click',function(){
    var iframe = $(this).data('video');
    $('#home-quote').append('<div id="home-video-iframe" class="flex-video widescreen vimeo">'+iframe+'<button id="home-video-close">&times;</button></div>');
    return false;
});
$('#home-quote').on('click','#home-video-close',function(){
    $('#home-video-iframe').remove();
    return false;
});

$('#home-quote-slider').slick({
    dots: true,
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    // autoplay: true,
    // autoplaySpeed: 4000
});
