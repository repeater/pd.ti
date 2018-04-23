function loadLeader(data) {
    if (data.name) {
		$('#person-name').html(data.name);
	}
    if (data.bio) {
		$('#person-bio').html(data.bio);
	}
    if (data.fullBio) {
        $('#person-full-bio').html('<a href="'+data.fullBio+'" target="_blank">Download Full Bio <span class="icon icon-arrow-down"></span></a>');
    }
    if (data.twitter) {
		$('#person-twitter').html('<a href="'+data.twitter+'" target="_blank"><span class="icon icon-twitter"></span></a>');
	}
    if (data.linkedin) {
		$('#person-linkedin').html('<a href="'+data.linkedin+'" target="_blank"><span class="icon icon-linkedin"></span></a>');
	}
    if (data.email) {
		$('#person-email').html('<a href="'+data.email+'" target="_blank"><span class="icon icon-mail"></span></a>');
	}
}
$('#leaders [data-person]').on('click',function(){
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
		var insertAfterIndex = insertAfter(count,index,1,2,3);
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

jQuery(document).ready(function($) {
	var newsPosts = $('.news-post');
	var pressPosts = $('.press-post');
	var currentNewsLength = 7;
	var currentPressLength = 7;

	for(var i = newsPosts.length; i >= 7; i--) {
		$(newsPosts[i]).hide();
	}
	for(var i = pressPosts.length; i >= 7; i--) {
		$(pressPosts[i]).hide();
	}

	$('.news-more-button').on('click', function(event) {
		for(var i = currentNewsLength; i < (currentNewsLength + 7); i++) {
			$(newsPosts[i]).show();
		}

		currentNewsLength += 7;

		if (currentNewsLength >= newsPosts.length) {
			$(this).hide();
		}

		// triggers wow
		window.scrollBy(0,1);
		window.scrollBy(0,-1);

		return false;
	});
	$('.press-more-button').on('click', function(event) {
		for(var i = currentPressLength; i < (currentPressLength + 7); i++) {
			$(pressPosts[i]).show();
		}

		currentPressLength += 7;

		if (currentPressLength >= pressPosts.length) {
			$(this).hide();
		}

		// triggers wow
		window.scrollBy(0,1);
		window.scrollBy(0,-1);

		return false;
	});
});