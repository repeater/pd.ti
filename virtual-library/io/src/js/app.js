jQuery(document).ready(function($) {
    $(document).foundation();

    // grab an element
    var myElement = document.getElementById('header');
    // construct an instance of Headroom, passing the element
    var headroom  = new Headroom(myElement);
    // initialise
    headroom.init();

    // var wow = new WOW();
    // wow.init();
    var wow = new WOW({
        boxClass:     'wow',      // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset:       0,          // distance to the element when triggering the animation (default is 0)
        mobile:       true,       // trigger animations on mobile devices (default is true)
        live:         true,       // act on asynchronously loaded content (default is true)
        callback:     function(box) {
            // the callback is fired every time an animation is started
            // the argument that is passed in is the DOM node being animated
            if ($(box).hasClass('number-grow')) {
                var number = $(box).data('number');
                var animatedNumber = 0;
                var increment = number / 50;

                // reset number to 0
                // $(box).text(0);

                for (var i = 0; i < 50; i++) {
                    if (i === 49) {
                        setTimeout(function() {
                            $(box).text(commaSeparateNumber(number));
                        }, 500);
                    } else {
                        setTimeout(function() {
                            animatedNumber = animatedNumber + increment;
                            $(box).text(commaSeparateNumber(parseInt(animatedNumber)));
                        }, 10 * i);
                    }

                }
            }
        },
        scrollContainer: null // optional scroll container selector, otherwise use window
    });
    wow.init();

    $('.lazy').lazyload();

    function commaSeparateNumber(val){
        while (/(\d+)(\d{3})/.test(val.toString())){
            val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
        }
        return val;
    }

    /* Smooth Scroll */
    $('a.scroll').click(function() {
        var head_height = $('#header').height();
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - head_height
                }, 1000);
                return false;
            }
        }
    });

    // tabbing
    function insertAfter(count,index,smallCount,mediumCount,largeCount) {
    	// adjust from zero indexing
        var indexAdjust = index + 1;
    	// get current screen size
        var currentSize = Foundation.MediaQuery.current;
    	// set items in row
        if (currentSize == 'xxlarge' || currentSize == 'xlarge' || currentSize == 'large') {
            itemsInRow = largeCount;
        } else if (currentSize == 'medium') {
            itemsInRow = mediumCount;
        } else {
            itemsInRow = smallCount;
        }
    	// calculate rows and index (not zero indexed)
    	var rowCount = Math.ceil(count/itemsInRow);
    	var afterRow = Math.ceil(indexAdjust/itemsInRow);
    	if (afterRow == rowCount) {
    		insertAfterItemNumber = count;
    	} else {
    		insertAfterItemNumber = itemsInRow*afterRow;
    	}
    	// adjust back for zero indexing
    	insertAfterIndex = insertAfterItemNumber - 1;
        return insertAfterIndex;
    }
    function loadTab(data) {
        if (data.content) {
    		$('#tab-content').html(data.content);
    	}
    }
    $('[data-tab]').on('click',function(event, scroll) {
    	// remove any existing product
    	var removing = $('#tab-content').remove();
    	// set data variables
    	var data = {
    		content: $(this).data('content')
    	};
        var parent = $(this).parent();
        var index = parent.index();
        var count = parent.parent().children().length;
        var smallCount = $(this).data('small');
        var mediumCount = $(this).data('medium');
        var largeCount = $(this).data('large');
        var insertAfterIndex = insertAfter(count,index,smallCount,mediumCount,largeCount);
    	// active classes on trigger
    	$('[data-tab]').removeClass('active');
    	$(this).addClass('active');
    	// add highlight
    	var insertAfterElement = parent.parent().children().eq(insertAfterIndex);
    	var adding = $('<div id="tab-content" class="columns small-12"></div>').insertAfter(insertAfterElement);
    	var dataDetails = loadTab(data);
        var target = $(this);
        if (scroll !== 'noscroll') {
            $('html,body').animate({
                scrollTop: target.offset().top
            }, 1000);
        }
        return false;
    });

    $('.products-sub-nav-trigger').hover(
        function() {
            productsHoverEnter();
        }, function() {
            productsHoverLeaver();
        }
    );

    $('#products-sub-nav').hover(
        function() {
            productsHoverEnter();
        }, function() {
            productsHoverLeaver();
        }
    );

    $(window).scroll(function() {
        productsHoverLeaver();
    });

    function productsHoverEnter() {
        if ($(window).width() >= 1024) {
            $('#products-sub-nav').css({
                visibility: 'visible',
                opacity: '1'
            });
            $('.products-sub-nav-trigger').css({
                backgroundColor: '#6f3d98',
            });
            $('.products-sub-nav-trigger a').css({
                color: '#ffffff'
            });
        }
    }

    function productsHoverLeaver() {
        if ($(window).width() >= 1024) {
            $('#products-sub-nav').css({
                visibility: 'hidden',
                opacity: '0'
            });
            $('.products-sub-nav-trigger').css({
                backgroundColor: 'transparent',
            });
            if ($('.products-sub-nav-trigger').hasClass('current-menu-item') || $('.products-sub-nav-trigger').hasClass('current-page-ancestor')) {
                $('.products-sub-nav-trigger a').css({
                    color: '#ffffff'
                });
            } else {
                $('.products-sub-nav-trigger a').css({
                    color: '#464646'
                });
            }
        }
    }

    $('.events-sub-nav-trigger').hover(
        function() {
            eventsHoverEnter();
        }, function() {
            eventsHoverLeaver();
        }
    );

    $('#events-sub-nav').hover(
        function() {
            eventsHoverEnter();
        }, function() {
            eventsHoverLeaver();
        }
    );

    $(window).scroll(function() {
        eventsHoverLeaver();
    });

    function eventsHoverEnter() {
        if ($(window).width() >= 1024) {
            $('#events-sub-nav').css({
                visibility: 'visible',
                opacity: '1'
            });
            $('.events-sub-nav-trigger').css({
                backgroundColor: '#6f3d98',
            });
            $('.events-sub-nav-trigger a').css({
                color: '#ffffff'
            });
        }
    }

    function eventsHoverLeaver() {
        if ($(window).width() >= 1024) {
            $('#events-sub-nav').css({
                visibility: 'hidden',
                opacity: '0'
            });
            $('.events-sub-nav-trigger').css({
                backgroundColor: 'transparent',
            });
            if ($('.events-sub-nav-trigger').hasClass('current-menu-item') || $('.events-sub-nav-trigger').hasClass('current-page-ancestor')) {
                $('.events-sub-nav-trigger a').css({
                    color: '#ffffff'
                });
            } else {
                $('.events-sub-nav-trigger a').css({
                    color: '#464646'
                });
            }
        }
    }
});
