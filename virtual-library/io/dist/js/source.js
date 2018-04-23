// Typekit init
try {
	Typekit.load({ async: true });
} catch (e) {}

function insertAfter(count, index, smallCount, mediumCount, largeCount) {
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
	var rowCount = Math.ceil(count / itemsInRow);
	var afterRow = Math.ceil(indexAdjust / itemsInRow);
	if (afterRow == rowCount) {
		insertAfterItemNumber = count;
	} else {
		insertAfterItemNumber = itemsInRow * afterRow;
	}
	// adjust back for zero indexing
	insertAfterIndex = insertAfterItemNumber - 1;
	return insertAfterIndex;
}
function loadCompany(data) {
	if (data.name) {
		$('#company-name').html(data.company);
	}
	if (data.brief) {
		$('#company-brief').html(data.brief);
	}
}
$('[data-company]').on('click', function () {
	// remove any existing product
	var removing = $('#company-highlight').remove();
	// set data variables
	var data = {
		company: $(this).data('company'),
		brief: $(this).data('brief')
	};
	var parent = $(this).parent();
	var index = parent.index();
	var count = parent.parent().children().length;
	var insertAfterIndex = insertAfter(count, index, 3, 4, 6);
	// active classes on trigger
	$('[data-company]').removeClass('active');
	$(this).addClass('active');
	// add highlight
	var insertAfterElement = parent.parent().children().eq(insertAfterIndex);
	var adding = $('<div id="company-highlight" class="columns small-12"><h2 id="company-name"></h2><div class="row align-center"><div class="columns medium-10 large-8" id="company-brief"></div></div></div>').insertAfter(insertAfterElement);
	var dataDetails = loadCompany(data);
	return false;
});
function loadPerson(data) {
	if (data.name) {
		$('#person-name').html(data.name);
	}
	if (data.title) {
		$('#person-title').html(data.title);
	}
	if (data.bio) {
		$('#person-bio').html(data.bio);
	}
	if (data.twitter) {
		$('#person-twitter').html('<a href="' + data.twitter + '" target="_blank"><span class="icon-twitter"></span></a>');
	}
	if (data.linkedin) {
		$('#person-linkedin').html('<a href="' + data.linkedin + '" target="_blank"><span class="icon-linkedin"></span></a>');
	}
}
$('#bios [data-person]').on('click', function () {
	if ($(this).data('disabled') != true) {
		// remove any existing product
		var removing = $('#person-highlight').remove();
		// set data variables
		var data = {
			name: $(this).data('name'),
			title: $(this).data('title'),
			bio: $(this).data('bio'),
			twitter: $(this).data('twitter'),
			linkedin: $(this).data('linkedin')
		};
		var parent = $(this).parent();
		var index = parent.index();
		var count = parent.parent().children().length;
		var insertAfterIndex = insertAfter(count, index, 1, 2, 3);
		// active classes on trigger
		$('[data-person]').removeClass('active');
		$(this).addClass('active');
		// add highlight
		var insertAfterElement = parent.parent().children().eq(insertAfterIndex);
		var adding = $('<div id="person-highlight" class="columns small-12"><div class="row align-center"><div class="columns medium-10 large-8"><h2 id="person-name"></h2><p id="person-title"></p><div id="person-bio"></div></div></div><div id="person-social" class="text-center"><span id="person-twitter"></span><span id="person-linkedin"></span></div></div>').insertAfter(insertAfterElement);
		var dataDetails = loadPerson(data);
		var target = $(this);
		$('html,body').animate({
			scrollTop: target.offset().top
		}, 1000);
		return false;
	} else {
		return false;
	}
});
jQuery(document).ready(function ($) {
    function formElementSerializers() {
        function input(element) {
            switch (element.type.toLowerCase()) {
                case 'checkbox':
                case 'radio':
                    return inputSelector(element);
                default:
                    return valueSelector(element);
            }
        }

        function inputSelector(element) {
            return element.checked ? element.value : null;
        }

        function valueSelector(element) {
            return element.value;
        }

        function select(element) {
            return (element.type === 'select-one' ? selectOne : selectMany)(element);
        }

        function selectOne(element) {
            var index = element.selectedIndex;
            return index < 0 ? null : optionValue(element.options[index]);
        }

        function selectMany(element) {
            var length = element.length;
            if (!length) return null;
            var values = [];
            for (var i = 0; i < length; i++) {
                var opt = element.options[i];
                if (opt.selected) values.push(optionValue(opt));
            }
            return values;
        }

        function optionValue(opt) {
            if (document.documentElement.hasAttribute) return opt.hasAttribute('value') ? opt.value : opt.text;
            var element = document.getElementById(opt);
            if (element && element.getAttributeNode('value')) return opt.value;else return opt.text;
        }
        return {
            input: input,
            inputSelector: inputSelector,
            textarea: valueSelector,
            select: select,
            selectOne: selectOne,
            selectMany: selectMany,
            optionValue: optionValue,
            button: valueSelector
        };
    }
    var r = '';
    formElementById = function (form, id) {
        for (var i = 0; i < form.length; ++i) if (form[i].id === id) return form[i];
        return null;
    };
});
jQuery(document).ready(function ($) {
    $(document).foundation();

    // grab an element
    var myElement = document.getElementById('header');
    // construct an instance of Headroom, passing the element
    var headroom = new Headroom(myElement);
    // initialise
    headroom.init();

    // var wow = new WOW();
    // wow.init();
    var wow = new WOW({
        boxClass: 'wow', // animated element css class (default is wow)
        animateClass: 'animated', // animation css class (default is animated)
        offset: 0, // distance to the element when triggering the animation (default is 0)
        mobile: true, // trigger animations on mobile devices (default is true)
        live: true, // act on asynchronously loaded content (default is true)
        callback: function (box) {
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
                        setTimeout(function () {
                            $(box).text(commaSeparateNumber(number));
                        }, 500);
                    } else {
                        setTimeout(function () {
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

    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }

    /* Smooth Scroll */
    $('a.scroll').click(function () {
        var head_height = $('#header').height();
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - head_height
                }, 1000);
                return false;
            }
        }
    });

    // tabbing
    function insertAfter(count, index, smallCount, mediumCount, largeCount) {
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
        var rowCount = Math.ceil(count / itemsInRow);
        var afterRow = Math.ceil(indexAdjust / itemsInRow);
        if (afterRow == rowCount) {
            insertAfterItemNumber = count;
        } else {
            insertAfterItemNumber = itemsInRow * afterRow;
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
    $('[data-tab]').on('click', function (event, scroll) {
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
        var insertAfterIndex = insertAfter(count, index, smallCount, mediumCount, largeCount);
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

    $('.products-sub-nav-trigger').hover(function () {
        productsHoverEnter();
    }, function () {
        productsHoverLeaver();
    });

    $('#products-sub-nav').hover(function () {
        productsHoverEnter();
    }, function () {
        productsHoverLeaver();
    });

    $(window).scroll(function () {
        productsHoverLeaver();
    });

    function productsHoverEnter() {
        if ($(window).width() >= 1024) {
            $('#products-sub-nav').css({
                visibility: 'visible',
                opacity: '1'
            });
            $('.products-sub-nav-trigger').css({
                backgroundColor: '#6f3d98'
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
                backgroundColor: 'transparent'
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

    $('.events-sub-nav-trigger').hover(function () {
        eventsHoverEnter();
    }, function () {
        eventsHoverLeaver();
    });

    $('#events-sub-nav').hover(function () {
        eventsHoverEnter();
    }, function () {
        eventsHoverLeaver();
    });

    $(window).scroll(function () {
        eventsHoverLeaver();
    });

    function eventsHoverEnter() {
        if ($(window).width() >= 1024) {
            $('#events-sub-nav').css({
                visibility: 'visible',
                opacity: '1'
            });
            $('.events-sub-nav-trigger').css({
                backgroundColor: '#6f3d98'
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
                backgroundColor: 'transparent'
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
jQuery(document).ready(function ($) {
    $('#approach a[data-tab=1]').trigger('click', ['noscroll']);
});
jQuery(document).ready(function ($) {
    $('#filter-trigger').on('click', function () {
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
    }, function (elements) {
        $('.lazy').lazyload();
    });
});
jQuery(document).ready(function ($) {
    $('#careers-testimonials-slider').slick({
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true
    });
});
jQuery(document).ready(function ($) {
    // true = valid, false = invalid
    var contactRequiredFields = ['First Name', 'Last Name', 'Email', 'Title', 'Department', 'Organization', 'How can we help'];
    var contactValidationStates = {
        'First Name': false,
        'Last Name': false,
        'Email': false,
        'Title': false,
        'Department': false,
        'Organization': false,
        'How can we help': false
    };

    $('#form_000f')
    // field element is invalid
    .on("invalid.zf.abide", function (ev, elem) {
        contactValidationStates[elem.attr('name')] = false;
    })
    // field element is valid
    .on("valid.zf.abide", function (ev, elem) {
        contactValidationStates[elem.attr('name')] = true;
    });

    doContactSubmit = function (form) {
        var requiredCount = 7;
        var validFields = 0;
        for (var i = 0; i < contactRequiredFields.length; i++) {
            Object.keys(contactValidationStates).forEach(function (key, value) {
                if (contactRequiredFields[i] === key && contactValidationStates[key] === true) {
                    console.log('hey');
                    validFields++;
                }
            });
        }

        if (validFields === requiredCount) {
            var ao_jstzo = formElementById(form, "ao_jstzo");
            if (ao_jstzo) ao_jstzo.value = new Date().getTimezoneOffset();
            formElementById(form, 'ao_bot').value = 'nope';
            form.submit();
            // $('input').each(function() {
            //     $(this).val('');
            //     $(this).removeClass('is-invalid-input');
            //     $(this).closest('label').removeClass('is-invalid-input').find('form-error').removeClass('is-visible');
            // });
            // $('textarea').each(function() {
            //     $(this).val('');
            //     $(this).removeClass('is-invalid-input');
            //     $(this).closest('label').removeClass('is-invalid-input').find('form-error').removeClass('is-visible');
            // });
            $('#contact .big-form').hide();
            $('#contact h2').text('Thank you!');
            $('#contact p').text('We will be in touch with you shortly.');

            var head_height = $('#header').height();
            var target = $('#contact');
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - head_height
                }, 1000);
                return false;
            }
        }
    };
});
jQuery(document).ready(function ($) {
    $('#expo-testimonials-slider').slick({
        dots: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true
    });

    $('.accordion-title').click(function () {
        var head_height = $('#header').height() + 16;
        var target = $(this);
        setTimeout(function () {
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - head_height
                }, 1000);
                return false;
            }
        }, 250);
    });
});
// learn more dropdownmenu-min-width
var c = document.getElementById('home-graph-radius');
if (typeof c != 'undefined' && c != null) {
    var cnumber = c.dataset.number;
    var cnumberPrepared = cnumber / 100 * 2 - 0.5;
    var ctx = c.getContext('2d');
    ctx.beginPath();
    ctx.arc(150, 150, 123, 1.5 * Math.PI, cnumberPrepared * Math.PI);
    ctx.lineWidth = 50;
    ctx.strokeStyle = "#bb1e6d";
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
    responsive: [{
        breakpoint: 1324,
        settings: {
            slidesToShow: 7,
            slidesToScroll: 7,
            infinite: true,
            dots: true
        }
    }, {
        breakpoint: 1024,
        settings: {
            slidesToShow: 5,
            slidesToScroll: 5,
            infinite: true,
            dots: true
        }
    }, {
        breakpoint: 600,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3
        }
    }]
});
$('#district-images').on('afterChange', function (event, slick, direction) {
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
    responsive: [{
        breakpoint: 1324,
        settings: {
            slidesToShow: 8,
            slidesToScroll: 8,
            infinite: true,
            dots: true,
            initialSlide: -2
        }
    }, {
        breakpoint: 1024,
        settings: {
            slidesToShow: 4,
            slidesToScroll: 4,
            infinite: true,
            dots: true,
            initialSlide: 0
        }
    }, {
        breakpoint: 600,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            centerMode: true,
            initialSlide: 0
        }
    }]
});
// home video
$('.home-video-trigger').on('click', function () {
    var iframe = $(this).data('video');
    $('#home-quote').append('<div id="home-video-iframe" class="flex-video widescreen vimeo">' + iframe + '<button id="home-video-close">&times;</button></div>');
    return false;
});
$('#home-quote').on('click', '#home-video-close', function () {
    $('#home-video-iframe').remove();
    return false;
});

$('#home-quote-slider').slick({
    dots: true,
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1
});
jQuery(document).ready(function ($) {
    $('#implementation-tabs a[data-tab=1]').trigger('click', ['noscroll']);

    $('#implementation-testimonials-slider').slick({
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $('.implementation-video-trigger').on('click', function () {
        var iframe = $(this).data('video');
        $('#implementation-testimonials').append('<div class="video-iframe" class="flex-video widescreen vimeo">' + iframe + '<button class="video-close">&times;</button></div>');
        return false;
    });
    $('#implementation-testimonials').on('click', '.video-close', function () {
        $('.video-iframe').remove();
        return false;
    });
});
jQuery(document).ready(function ($) {
    var CLASSROOM_BASE = 4;
    var INSIGHTS_BASE = 5;
    var ASSESSMENTS_BASE = 6;
    var CLASSROOM_DISCOUNT = 3;
    var INSIGHTS_DISCOUNT = 4;
    var ASSESSMENTS_DISCOUNT = 5;
    var EDUCATOR_BASE = 1600;
    var OPERATIONAL_BASE = 400;

    var studentPackages;
    var selectedStudentPackages;
    var selectedPackagesTitles = [];
    var studentPackageCount = 0;
    var studentSubcost = 0;
    var studentCost = 0;

    var selectedEducatorPackage;
    var selectedOperationalPackage;

    var studentCount = 0;
    var studentTotal = 0;
    var studentSavings = 0;

    var buildingCount = 0;
    var educatorTotal = 0;

    var areaCount = 0;
    var operationalTotal = 0;
    var operationalBuildingCount = 0;

    var total = 0;

    function updateValues() {
        // INDIVIDUAL COST CALCULATIONS
        // students
        studentPackages = $('.student-package-input');
        selectedStudentPackages = $('.student-package-input:checked');
        studentPackageCount = selectedStudentPackages.length;
        studentSubcost = 0;
        if (selectedStudentPackages.closest('.package').find('#classroom-package').length > 0) {
            studentSubcost += CLASSROOM_BASE;
        }
        if (selectedStudentPackages.closest('.package').find('#insights-package').length > 0) {
            studentSubcost += INSIGHTS_BASE;
        }
        if (selectedStudentPackages.closest('.package').find('#assessments-package').length > 0) {
            studentSubcost += ASSESSMENTS_BASE;
        }
        if (studentPackageCount > 1) {
            studentCost = studentSubcost - studentPackageCount;
            // change checked checkboxPackages to discounted cost
            $('#product-1-cost').text(CLASSROOM_DISCOUNT);
            $('#product-2-cost').text(INSIGHTS_DISCOUNT);
            $('#product-3-cost').text(ASSESSMENTS_DISCOUNT);
            studentPackages.each(function () {
                $(this).closest('.package').find('.discount-label').show();
            });
        } else {
            studentCost = studentSubcost;
            // restore package costs to base cost
            $('#product-1-cost').text(CLASSROOM_BASE);
            $('#product-2-cost').text(INSIGHTS_BASE);
            $('#product-3-cost').text(ASSESSMENTS_BASE);
            studentPackages.each(function () {
                $(this).closest('.package').find('.discount-label').hide();
            });
        }
        // educator
        selectedEducatorPackage = $('.educator-package-input:checked');
        educatorCost = EDUCATOR_BASE * selectedEducatorPackage.length;

        // operational
        selectedOperationalPackage = $('.operational-package-input:checked');
        operationalCost = OPERATIONAL_BASE * selectedOperationalPackage.length;

        // PRICING CALCULATIONS
        // update view with per item cost
        $('.student-cost').text(studentCost);
        $('.educator-cost').text(educatorCost);
        $('.operational-cost').text(operationalCost);

        // get item counts
        studentCount = $('#student-count').val();
        buildingCount = $('#educator-count').val();
        $('#building-count').text(buildingCount);
        areaCount = $('#operational-count').val();
        operationalBuildingCount = $('#operational-building-count').val();

        // calculate totals
        studentTotal = studentCount * studentCost;
        educatorTotal = buildingCount * educatorCost;
        operationalTotal = areaCount * operationalBuildingCount * operationalCost;
        total = studentTotal + educatorTotal + operationalTotal;

        // calculate and display student savings
        studentSavings = studentSubcost * studentCount - studentTotal;
        $('#savings').text(commaSeparateNumber(studentSavings));

        // update totals display
        $('#student-total').text(commaSeparateNumber(studentTotal));
        $('#educator-total').text(commaSeparateNumber(educatorTotal));
        $('#operational-total').text(commaSeparateNumber(operationalTotal));
        $('#total').text(commaSeparateNumber(total));

        // QUERY PARAMETERS
        selectedPackagesTitles = [];
        if (selectedStudentPackages.length > 0) {
            selectedStudentPackages.each(function () {
                selectedPackagesTitles.push($(this).closest('.package').find('h3').text());
            });
        }
        if (selectedEducatorPackage.length > 0) {
            selectedEducatorPackage.each(function () {
                selectedPackagesTitles.push($(this).closest('.package').find('h3').text());
            });
        }
        if (selectedOperationalPackage.length > 0) {
            selectedOperationalPackage.each(function () {
                selectedPackagesTitles.push($(this).closest('.package').find('h3').text());
            });
        }
        $('#submit-button').attr('href', function () {
            return '/pricing-form?students=' + Math.floor(studentCount) + '&packages=' + selectedPackagesTitles.join(', ').replace(/\s+/, '%20') + '&educator=' + buildingCount + '&operational=' + areaCount + '&operationalBuildings=' + operationalBuildingCount;
        });
    }

    updateValues();

    $('.package-input').on('change', function () {
        updateValues();
        $('#package-callout-wrapper').hide();
    });

    $('.package-input').on('click', function () {
        $(this).closest('.package').find('h3').triggerHandler('click');
    });

    $('#student-count').keyup(function (event) {
        if ($(this).val() <= 0 && $(this).val() !== '') {
            $(this).val('0');
        }
        updateValues();
        $('#student-callout-wrapper').hide();
    });

    $('#educator-count').keyup(function (event) {
        if ($(this).val() <= 0 && $(this).val() !== '') {
            $(this).val('0');
        }
        updateValues();
        $('#educator-callout-wrapper').hide();
    });

    $('#operational-count').keyup(function (event) {
        if ($(this).val() <= 0 && $(this).val() !== '') {
            $(this).val('0');
        }
        updateValues();
        $('#operational-callout-wrapper').hide();
    });

    $('#operational-building-count').keyup(function (event) {
        if ($(this).val() <= 0 && $(this).val() !== '') {
            $(this).val('0');
        }
        updateValues();
        $('#operational-callout-wrapper').hide();
    });

    $('#submit-button').on('click', function (event) {
        var head_height;
        var target;

        if (packageCount === 0) {
            event.preventDefault();
            $('#package-callout-wrapper').show();

            if (studentNumber === '0') {
                $('#student-callout-wrapper').show();
            }

            head_height = $('#header').height();
            target = $('#package-callout-wrapper');
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - head_height
                }, 1000);
                return false;
            }
        } else if (studentNumber === '0') {
            event.preventDefault();
            $('#student-callout-wrapper').show();

            if (packageCount === 0) {
                $('#package-callout-wrapper').show();
            }

            head_height = $('#header').height();
            target = $('#student-callout-wrapper');
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - head_height
                }, 1000);
                return false;
            }
        }
    });

    function commaSeparateNumber(val) {
        while (/(\d+)(\d{3})/.test(val.toString())) {
            val = val.toString().replace(/(\d+)(\d{3})/, '$1' + ',' + '$2');
        }
        return val;
    }
});
jQuery(document).ready(function ($) {
    // true = valid, false = invalid
    var mediaRequiredFields = ['First Name', 'Last Name', 'Email', 'Title', 'Department', 'Organization', 'How can we help'];
    var mediaValidationStates = {
        'First Name': false,
        'Last Name': false,
        'Email': false,
        'Title': false,
        'Department': false,
        'Organization': false,
        'How can we help': false
    };

    $('#form_0010')
    // field element is invalid
    .on("invalid.zf.abide", function (ev, elem) {
        mediaValidationStates[elem.attr('name')] = false;
    })
    // field element is valid
    .on("valid.zf.abide", function (ev, elem) {
        mediaValidationStates[elem.attr('name')] = true;
    });

    doMediaSubmit = function (form) {
        var requiredCount = 7;
        var validFields = 0;
        for (var i = 0; i < mediaRequiredFields.length; i++) {
            Object.keys(mediaValidationStates).forEach(function (key, value) {
                if (mediaRequiredFields[i] === key && mediaValidationStates[key] === true) {
                    validFields++;
                }
            });
        }

        if (validFields === requiredCount) {
            var ao_jstzo = formElementById(form, "ao_jstzo");
            if (ao_jstzo) ao_jstzo.value = new Date().getTimezoneOffset();
            formElementById(form, 'ao_bot').value = 'nope';
            form.submit();
        }
    };
});
jQuery(document).ready(function ($) {
    $('.media-video-trigger').on('click', function () {
        var iframe = $(this).data('video');
        $('#media-videos').append('<div class="video-iframe" class="flex-video widescreen vimeo">' + iframe + '<button class="video-close">&times;</button></div>');
        return false;
    });
    $('#media-videos').on('click', '.video-close', function () {
        $('.video-iframe').remove();
        return false;
    });
});
function loadLeader(data) {
	if (data.name) {
		$('#person-name').html(data.name);
	}
	if (data.bio) {
		$('#person-bio').html(data.bio);
	}
	if (data.fullBio) {
		$('#person-full-bio').html('<a href="' + data.fullBio + '" target="_blank">Download Full Bio <span class="icon icon-arrow-down"></span></a>');
	}
	if (data.twitter) {
		$('#person-twitter').html('<a href="' + data.twitter + '" target="_blank"><span class="icon icon-twitter"></span></a>');
	}
	if (data.linkedin) {
		$('#person-linkedin').html('<a href="' + data.linkedin + '" target="_blank"><span class="icon icon-linkedin"></span></a>');
	}
	if (data.email) {
		$('#person-email').html('<a href="' + data.email + '" target="_blank"><span class="icon icon-mail"></span></a>');
	}
}
$('#leaders [data-person]').on('click', function () {
	if ($(this).data('disabled') != true) {
		// remove any existing product
		var removing = $('#person-highlight').remove();
		// set data variables
		var data = {
			name: $(this).data('name'),
			bio: $(this).data('bio'),
			fullBio: $(this).data('full-bio'),
			twitter: $(this).data('twitter'),
			linkedin: $(this).data('linkedin'),
			email: $(this).data('email')
		};
		console.log(data);
		var parent = $(this).parent();
		var index = parent.index();
		var count = parent.parent().children().length;
		var insertAfterIndex = insertAfter(count, index, 1, 2, 3);
		// active classes on trigger
		$('[data-person]').removeClass('active');
		$(this).addClass('active');
		// add highlight
		var insertAfterElement = parent.parent().children().eq(insertAfterIndex);
		var adding = $('<div id="person-highlight" class="columns small-12"><div class="row align-center"><div class="columns medium-10 large-8"><h2 id="person-name"></h2><div id="person-bio"></div></div></div><div class="row align-center"><div class="column medium-10 large-8"><div class="row align-justify"><div class="column"><span id="person-full-bio"></span></div><div class="column text-right"><span id="connect-heading">Connect</span><span id="person-twitter"></span><span id="person-linkedin"></span><span id="person-email"></span></div></div></div></div></div></div>').insertAfter(insertAfterElement);
		var dataDetails = loadLeader(data);
		var target = $(this);
		$('html,body').animate({
			scrollTop: target.offset().top
		}, 1000);
		return false;
	} else {
		return false;
	}
});

jQuery(document).ready(function ($) {
	var newsPosts = $('.news-post');
	var pressPosts = $('.press-post');
	var currentNewsLength = 7;
	var currentPressLength = 7;

	for (var i = newsPosts.length; i >= 7; i--) {
		$(newsPosts[i]).hide();
	}
	for (var i = pressPosts.length; i >= 7; i--) {
		$(pressPosts[i]).hide();
	}

	$('.news-more-button').on('click', function (event) {
		for (var i = currentNewsLength; i < currentNewsLength + 7; i++) {
			$(newsPosts[i]).show();
		}

		currentNewsLength += 7;

		if (currentNewsLength >= newsPosts.length) {
			$(this).hide();
		}

		// triggers wow
		window.scrollBy(0, 1);
		window.scrollBy(0, -1);

		return false;
	});
	$('.press-more-button').on('click', function (event) {
		for (var i = currentPressLength; i < currentPressLength + 7; i++) {
			$(pressPosts[i]).show();
		}

		currentPressLength += 7;

		if (currentPressLength >= pressPosts.length) {
			$(this).hide();
		}

		// triggers wow
		window.scrollBy(0, 1);
		window.scrollBy(0, -1);

		return false;
	});
});
jQuery(document).ready(function ($) {
    // true = valid, false = invalid
    var pricingRequiredFields = ['First Name', 'Last Name', 'Email', 'Title', 'Department', 'Organization', 'Students'];
    var pricingValidationStates = {
        'First Name': false,
        'Last Name': false,
        'Email': false,
        'Title': false,
        'Department': false,
        'Organization': false,
        'Students': false
    };

    $('#form_0011')
    // field element is invalid
    .on("invalid.zf.abide", function (ev, elem) {
        pricingValidationStates[elem.attr('name')] = false;
        console.log('invalid');
    })
    // field element is valid
    .on("valid.zf.abide", function (ev, elem) {
        pricingValidationStates[elem.attr('name')] = true;
        console.log('valid');
    });

    doPricingSubmit = function (form) {
        var requiredCount = 7;
        var validFields = 0;
        for (var i = 0; i < pricingRequiredFields.length; i++) {
            Object.keys(pricingValidationStates).forEach(function (key, value) {
                if (pricingRequiredFields[i] === key && pricingValidationStates[key] === true) {
                    validFields++;
                }
            });
        }

        if (validFields === requiredCount) {
            var ao_jstzo = formElementById(form, "ao_jstzo");
            if (ao_jstzo) ao_jstzo.value = new Date().getTimezoneOffset();
            formElementById(form, 'ao_bot').value = 'nope';
            form.submit();
        }
    };
});
jQuery(document).ready(function ($) {
    $('.product-media-slider').slick({
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true
    });

    $('.play-product-video').on('click', function () {
        $('#product-video').find('.video-container').append('<div class="flex-video">' + $('.play-product-video').data('video') + '</div>');
    });

    $('.reveal .close-button').on('click', function () {
        $('.close-button').closest('.reveal').find('.flex-video').remove();
    });

    $('#product-testimonials-slider').slick({
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $('.product-video-trigger').on('click', function () {
        var iframe = $(this).data('video');
        $('#testimonials').append('<div class="video-iframe" class="flex-video widescreen vimeo">' + iframe + '<button class="video-close">&times;</button></div>');
        return false;
    });
    $('#testimonials').on('click', '.video-close', function () {
        $('.video-iframe').remove();
        return false;
    });

    $('.benefits-video-trigger').on('click', function () {
        var iframe = $(this).data('video');
        $('#product-benefits-section').append('<div class="video-iframe" class="flex-video widescreen vimeo">' + iframe + '<button class="video-close">&times;</button></div>');
        return false;
    });
    $('#product-benefits-section').on('click', '.video-close', function () {
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
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 1
            }
        }]
    });
});
function insertAfter(count, index, smallCount, mediumCount, largeCount) {
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
	var rowCount = Math.ceil(count / itemsInRow);
	var afterRow = Math.ceil(indexAdjust / itemsInRow);
	if (afterRow == rowCount) {
		insertAfterItemNumber = count;
	} else {
		insertAfterItemNumber = itemsInRow * afterRow;
	}
	// adjust back for zero indexing
	insertAfterIndex = insertAfterItemNumber - 1;
	return insertAfterIndex;
}
function loadProduct(data) {
	if (data.title) {
		$('#ph-title').html(data.title);
	}
	if (data.content_1) {
		$('#ph-left').html(data.content_1);
	}
	if (data.content_2) {
		$('#ph-right').html(data.content_2);
	}
	if (data.scroller) {
		$('#ph-scroller').html(data.scroller);
		$('#ph-scroller').slick();
	}
}
$('[data-product]').on('click', function () {
	// remove any existing product
	var removing = $('#product-highlight').remove();
	// set data variables
	var data = {
		title: $(this).data('title'),
		content_1: $(this).data('content_1'),
		content_2: $(this).data('content_2'),
		scroller: $(this).data('scroller')
	};
	var parent = $(this).parent();
	var index = parent.index();
	var count = parent.parent().children().length;
	var insertAfterIndex = insertAfter(count, index, 1, 2, 3);
	// active classes on trigger
	$('[data-product]').removeClass('active');
	$(this).addClass('active');
	// add highlight
	var insertAfterElement = parent.parent().children().eq(insertAfterIndex);
	var adding = $('<div id="product-highlight" class="columns small-12"><h3 id="ph-title"></h3><div class="row"><div class="columns medium-6 small-12" id="ph-left"></div><div class="columns medium-6 small-12" id="ph-right"></div></div><div id="ph-scroller"></div></div>').insertAfter(insertAfterElement);
	var dataDetails = loadProduct(data);
	var target = $(this);
	$('html,body').animate({
		scrollTop: target.offset().top
	}, 1000);
	return false;
});
jQuery(document).ready(function ($) {
    // true = valid, false = invalid
    var signupRequiredFields = ['Email address'];
    var signupValidationStates = {
        'Email address': false
    };

    $('#form_000e')
    // field element is invalid
    .on("invalid.zf.abide", function (ev, elem) {
        signupValidationStates[elem.attr('name')] = false;
    })
    // field element is valid
    .on("valid.zf.abide", function (ev, elem) {
        signupValidationStates[elem.attr('name')] = true;
    });

    doSignUpSubmit = function (form) {
        var requiredCount = 1;
        var validFields = 0;
        for (var i = 0; i < signupRequiredFields.length; i++) {
            Object.keys(signupValidationStates).forEach(function (key, value) {
                if (signupRequiredFields[i] === key && signupValidationStates[key] === true) {
                    validFields++;
                }
            });
        }

        if (validFields === requiredCount) {
            var ao_jstzo = formElementById(form, "ao_jstzo");
            if (ao_jstzo) ao_jstzo.value = new Date().getTimezoneOffset();
            formElementById(form, 'ao_bot').value = 'nope';
            form.submit();
        }
    };
});
jQuery(document).ready(function ($) {
    $('#solutions-testimonials-slider').slick({
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1
    });

    $('.solutions-video-trigger').on('click', function () {
        var iframe = $(this).data('video');
        $('#solutions-testimonials').append('<div class="video-iframe" class="flex-video widescreen vimeo">' + iframe + '<button class="video-close">&times;</button></div>');
        return false;
    });
    $('#solutions-testimonials').on('click', '.video-close', function () {
        $('.video-iframe').remove();
        return false;
    });
});
jQuery(document).ready(function ($) {
    // true = valid, false = invalid
    var supportRequiredFields = ['First Name', 'Last Name', 'Email', 'Support School or District', 'How can we help', 'Support User Type', 'Support Product'];
    var supportValidationStates = {
        'First Name': false,
        'Last Name': false,
        'Email': false,
        'Support School or District': false,
        'How can we help': false,
        'Support User Type': false,
        'Support Product': false
    };

    $('#form_0018')
    // field element is invalid
    .on("invalid.zf.abide", function (ev, elem) {
        supportValidationStates[elem.attr('name')] = false;
    })
    // field element is valid
    .on("valid.zf.abide", function (ev, elem) {
        supportValidationStates[elem.attr('name')] = true;
    });

    doSupportSubmit = function (form) {
        var requiredCount = 7;
        var validFields = 0;
        for (var i = 0; i < supportRequiredFields.length; i++) {
            Object.keys(supportValidationStates).forEach(function (key, value) {
                if (supportRequiredFields[i] === key && supportValidationStates[key] === true) {
                    validFields++;
                }
            });
        }

        if (validFields === requiredCount) {
            var ao_jstzo = formElementById(form, "ao_jstzo");
            if (ao_jstzo) ao_jstzo.value = new Date().getTimezoneOffset();
            formElementById(form, 'ao_bot').value = 'nope';
            form.submit();
            // $('input').each(function() {
            //     $(this).val('');
            //     $(this).removeClass('is-invalid-input');
            //     $(this).closest('label').removeClass('is-invalid-input').find('form-error').removeClass('is-visible');
            // });
            // $('textarea').each(function() {
            //     $(this).val('');
            //     $(this).removeClass('is-invalid-input');
            //     $(this).closest('label').removeClass('is-invalid-input').find('form-error').removeClass('is-visible');
            // });
            $('#contact .big-form').hide();
            $('#contact h2').text('Thank you!');
            $('#contact p').text('We will be in touch with you shortly.');

            var head_height = $('#header').height();
            var target = $('#contact');
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top - head_height
                }, 1000);
                return false;
            }
        }
    };
});
// for mobile
$('.timeline-slider').slick({
    dots: false,
    arrows: true
});
$(document).on({
    mouseenter: function () {
        var parent = $(this).parent('li');
        var index = parent.index();
        var left_far = index - 2;
        var right_far = index + 2;
        var left_close = index - 1;
        var right_close = index + 1;
        $(".slick-dots li").eq(left_far).addClass('mid-one');
        $(".slick-dots li").eq(right_far).addClass('mid-one');
        $(".slick-dots li").eq(left_close).addClass('mid-two');
        $(".slick-dots li").eq(right_close).addClass('mid-two');
    },
    mouseleave: function () {
        var parent = $(this).parent('li');
        var index = parent.index();
        var left_far = index - 2;
        var right_far = index + 2;
        var left_close = index - 1;
        var right_close = index + 1;
        $(".slick-dots li").eq(left_far).removeClass('mid-one');
        $(".slick-dots li").eq(right_far).removeClass('mid-one');
        $(".slick-dots li").eq(left_close).removeClass('mid-two');
        $(".slick-dots li").eq(right_close).removeClass('mid-two');
    }
}, ".slick-dots li button");
$('#jump-to-last').on('click', function () {
    var count = $(this).data('count');
    var index = count - 1;
    $('#timeline-mobile-events').slick('slickGoTo', index);
    return false;
});
$(document).on('click', '[data-slick]', function () {
    var slick_int = $(this).data('slick');
    $('#timeline-mobile-events').slick('slickGoTo', slick_int);
    $('.slick-dots-syrup li').removeClass('slick-active');
    $(this).addClass('slick-active');
    return false;
});
$('#timeline-mobile-events').on('afterChange', function (slick, currentSlide) {
    var current_index = currentSlide.currentSlide;
    $('.slick-dots-syrup li').removeClass('slick-active');
    $('.slick-dots-syrup li[data-slick=' + current_index + ']').addClass('slick-active');
});
$(document).on('click', '[data-find-prev]', function () {
    var closest_previous = $(this).prevAll('li[data-slick]:first');
    closest_previous.click();
});
$(document).on('click', '[data-find-next]', function () {
    var closest_next = $(this).nextAll('li[data-slick]:first');
    closest_next.click();
});
// for desktop
$(function () {

    var $sidescroll = function () {

        // the row elements
        var $rows = $('#ss-container > div.ss-row'),

        // we will cache the inviewport rows and the outside viewport rows
        $rowsViewport,
            $rowsOutViewport,

        // navigation menu links
        $links = $('#ss-links > a'),

        // the window element
        $win = $(window),

        // we will store the window sizes here
        winSize = {},

        // used in the scroll setTimeout function
        anim = false,

        // page scroll speed
        scollPageSpeed = 2000,

        // page scroll easing
        scollPageEasing = 'easeInOutExpo',

        // perspective?
        hasPerspective = false,
            perspective = hasPerspective && Modernizr.csstransforms3d,

        // initialize function
        init = function () {

            // get window sizes
            getWinSize();
            // initialize events
            initEvents();
            // define the inviewport selector
            defineViewport();
            // gets the elements that match the previous selector
            setViewportRows();
            // if perspective add css
            if (perspective) {
                $rows.css({
                    '-webkit-perspective': 600,
                    '-webkit-perspective-origin': '50% 0%'
                });
            }
            // show the pointers for the inviewport rows
            $rowsViewport.find('a.ss-image').addClass('ss-image-deco');
            // set positions for each row
            placeRows();
        },

        // defines a selector that gathers the row elems that are initially visible.
        // the element is visible if its top is less than the window's height.
        // these elements will not be affected when scrolling the page.
        defineViewport = function () {

            $.extend($.expr[':'], {

                inviewport: function (el) {
                    if ($(el).offset().top < winSize.height) {
                        return true;
                    }
                    return false;
                }

            });
        },

        // checks which rows are initially visible
        setViewportRows = function () {

            $rowsViewport = $rows.filter(':inviewport');
            $rowsOutViewport = $rows.not($rowsViewport);
        },

        // get window sizes
        getWinSize = function () {

            winSize.width = $win.width();
            winSize.height = $win.height();
        },

        // initialize some events
        initEvents = function () {

            // navigation menu links.
            // scroll to the respective section.
            $links.on('click.Scrolling', function (event) {

                // scroll to the element that has id = menu's href
                $('html, body').stop().animate({
                    scrollTop: $($(this).attr('href')).offset().top
                }, scollPageSpeed, scollPageEasing);

                return false;
            });

            $(window).on({
                // on window resize we need to redefine which rows are initially visible (this ones we will not animate).
                'resize.Scrolling': function (event) {

                    // get the window sizes again
                    getWinSize();
                    // redefine which rows are initially visible (:inviewport)
                    setViewportRows();
                    // remove pointers for every row
                    $rows.find('a.ss-image').removeClass('ss-image-deco');
                    // show inviewport rows and respective pointers
                    $rowsViewport.each(function () {

                        $(this).find('div.ss-left').css({ left: '0%' }).end().find('div.ss-right').css({ right: '0%' }).end().find('a.ss-image').addClass('ss-image-deco');
                    });
                },
                // when scrolling the page change the position of each row
                'scroll.Scrolling': function (event) {

                    // set a timeout to avoid that the
                    // placeRows function gets called on every scroll trigger
                    if (anim) return false;
                    anim = true;
                    setTimeout(function () {

                        placeRows();
                        anim = false;
                    }, 10);
                }
            });
        },

        // sets the position of the rows (left and right row elements).
        // Both of these elements will start with -50% for the left/right (not visible)
        // and this value should be 0% (final position) when the element is on the
        // center of the window.
        placeRows = function () {

            // how much we scrolled so far
            var winscroll = $win.scrollTop(),

            // the y value for the center of the screen
            winCenter = winSize.height / 2 + winscroll;

            // for every row that is not inviewport
            $rowsOutViewport.each(function (i) {

                var $row = $(this),

                // the left side element
                $rowL = $row.find('div.ss-left'),

                // the right side element
                $rowR = $row.find('div.ss-right'),

                // top value
                rowT = $row.offset().top;

                // hide the row if it is under the viewport
                if (rowT > winSize.height + winscroll) {

                    if (perspective) {

                        $rowL.css({
                            '-webkit-transform': 'translate3d(-75%, 0, 0) rotateY(-90deg) translate3d(-75%, 0, 0)',
                            'opacity': 0
                        });
                        $rowR.css({
                            '-webkit-transform': 'translate3d(75%, 0, 0) rotateY(90deg) translate3d(75%, 0, 0)',
                            'opacity': 0
                        });
                    } else {

                        $rowL.css({ left: '-50%' });
                        $rowR.css({ right: '-50%' });
                    }
                }
                // if not, the row should become visible (0% of left/right) as it gets closer to the center of the screen.
                else {

                        // row's height
                        var rowH = $row.height(),

                        // the value on each scrolling step will be proporcional to the distance from the center of the screen to its height
                        factor = (rowT + rowH / 2 - winCenter) / (winSize.height / 2 + rowH / 2),

                        // value for the left / right of each side of the row.
                        // 0% is the limit
                        val = Math.max(factor * 50, 0);

                        if (val <= 0) {

                            // when 0% is reached show the pointer for that row
                            if (!$row.data('pointer')) {

                                $row.data('pointer', true);
                                $row.find('.ss-image').addClass('ss-image-deco');
                            }
                        } else {

                            // the pointer should not be shown
                            if ($row.data('pointer')) {

                                $row.data('pointer', false);
                                $row.find('.ss-image').removeClass('ss-image-deco');
                            }
                        }

                        // set calculated values
                        if (perspective) {

                            var t = Math.max(factor * 75, 0),
                                r = Math.max(factor * 90, 0),
                                o = Math.min(Math.abs(factor - 1), 1);

                            $rowL.css({
                                '-webkit-transform': 'translate3d(-' + t + '%, 0, 0) rotateY(-' + r + 'deg) translate3d(-' + t + '%, 0, 0)',
                                'opacity': o
                            });
                            $rowR.css({
                                '-webkit-transform': 'translate3d(' + t + '%, 0, 0) rotateY(' + r + 'deg) translate3d(' + t + '%, 0, 0)',
                                'opacity': o
                            });
                        } else {

                            $rowL.css({ left: -val + '%' });
                            $rowR.css({ right: -val + '%' });
                        }
                    }
            });
        };

        return { init: init };
    }();

    $sidescroll.init();
});

jQuery(document).ready(function ($) {
    $('.timeline-image-container').on('click', function () {
        var iframe = $(this).closest('.timeline-video-trigger').data('video');
        $(this).closest('.timeline-video-trigger').append('<div class="timeline-video-container"><button class="timeline-video-close">&times;</button><div class="timeline-video-iframe flex-video widescreen vimeo">' + iframe + '</div></div>');
        $(this).hide();
        return false;
    });
    $('.timeline-video-trigger').on('click', function (event) {
        if ($(event.target).hasClass('timeline-video-close')) {
            $('.timeline-video-container').remove();
            $('.timeline-image-container').show();
            return false;
        }
    });
    // query parameters to get to specific event via URL
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    // function getQueryStringParameter(paramToRetrieve) {
    //     var params = document.URL.split("?")[1].split("&");
    //     var strParams = "";
    //     if (params.length > 0) {
    //         for (var i = 0; i < params.length; i = i + 1) {
    //             var singleParam = params[i].split("=");
    //             if (singleParam[0] == paramToRetrieve)
    //             return singleParam[1];
    //         }
    //     } else {
    //         return null;
    //     }
    // }
    var event = getParameterByName('event');
    console.log(event);
    if (event) {
        var target = $('#' + event);
        $('html,body').animate({
            scrollTop: target.offset().top
        }, 1000);
    }
});