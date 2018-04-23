// Typekit init
try{Typekit.load({ async: true });}catch(e){}

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
function loadCompany(data) {
    if (data.name) {
		$('#company-name').html(data.company);
	}
    if (data.brief) {
		$('#company-brief').html(data.brief);
	}
}
$('[data-company]').on('click',function(){
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
    var insertAfterIndex = insertAfter(count,index,3,4,6);
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
		$('#person-twitter').html('<a href="'+data.twitter+'" target="_blank"><span class="icon-twitter"></span></a>');
	}
    if (data.linkedin) {
		$('#person-linkedin').html('<a href="'+data.linkedin+'" target="_blank"><span class="icon-linkedin"></span></a>');
	}
}
$('#bios [data-person]').on('click',function(){
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
		var insertAfterIndex = insertAfter(count,index,1,2,3);
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
