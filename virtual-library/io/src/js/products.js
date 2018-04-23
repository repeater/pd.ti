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
$('[data-product]').on('click',function(){
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
    var insertAfterIndex = insertAfter(count,index,1,2,3);
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
