jQuery(document).ready(function($) {
    $('#filter-trigger').on('click',function(){
        $(this).hide();
        $('#filters').fadeIn(200);
    });

    $('#archive').infinitescroll({
        loading: {
            finishedMsg: '',
            msgText: 'loading'
        },
        nextSelector: '#next a:first',
        navSelector: '#pagination',
        extraScrollPx: 0,
        itemSelector: '.blog-box-column'
    }, function(elements) {
        $('.lazy').lazyload();
    });
});
