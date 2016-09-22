var galleryTemplate = 'gallery-image-';
var currentGalleryImage;
var currentGalleryImageId;
var isWidthBigger = false;
var numberOfImages;

var gallerySlider = document.getElementById('gallery-expansion');

var mc = new Hammer(gallerySlider);
mc.on('swipeleft', function(e) { nextImage(); })
	.on('swiperight', function(e) { prevImage(); });

$( window ).resize(function() {
	resizeGalleryExpansion();
	resizeCurrentGalleryImage();
});

$(document).keyup(function(e) {
  if ( $( '#gallery-expansion' ).is(':visible')) {
	  if (e.keyCode === 27) {
	  	closeGallery();
	  }
	  if (e.keyCode === 37) {
	  	prevImage();
	  }
	  if (e.keyCode === 39) {
	  	nextImage();
	  }
	}
});

initializeGallery();

function initializeGallery() {
	currentGalleryImage = $( '#gallery-current' );
	currentGalleryImageId = 'gallery-image-00';
	document.getElementsByClassName('option')[0].setAttribute('class', 'option current');	
	numberOfImages = $( '#gallery-options .option' ).length;
	$( '#gallery-options' ).css('width', (120 * numberOfImages) + 'px');
}

function expandCurrentGalleryImage() {
	setCurrentGalleryImage();

	$( 'body' ).css('overflow', 'hidden');
	resizeGalleryExpansion();
	$( '#gallery-expansion' ).fadeIn();
}

function resizeGalleryExpansion() {
	$( '#gallery-expansion' ).css('width', window.innerWidth);
	$( '#gallery-expansion' ).css('height', window.innerHeight);	
}

function swapCurrentGalleryImage(image) {
	currentGalleryImageId = image.id;
	currentGalleryImage.css('background-image', image.style.backgroundImage);
	$( '#gallery-options .option' ).removeClass('current');
	image.setAttribute('class', 'option current');
}

function closeGallery() {
	$( '#gallery-expansion' ).fadeOut();
	$( '#gallery-expansion img' ).remove();
	$( 'body' ).css('overflow', 'auto');	
}

function setCurrentGalleryImage() {
	var imageUrl = sliceUrl($( '#' + currentGalleryImageId ).css('background-image'));
	$( '#current-image' ).append('<img class="gallery-slider-image" src="' + imageUrl + '" />');
	detectIfWidthIsBigger();
	resizeCurrentGalleryImage();
}

function resizeCurrentGalleryImage() {
	if (isWidthBigger) {
		$( '#current-image img' ).css('width', '90%');
		$( '#current-image img' ).css('height', 'auto');		
	} else {
		$( '#current-image img' ).css('width', 'auto');
		$( '#current-image img' ).css('height', '90%');				
	}	
}

function nextImage() {
	var imageNum = (Number(currentGalleryImageId.slice(-2)) + 1);
	if (imageNum < numberOfImages) {
		currentGalleryImageId = addOneSlice(currentGalleryImageId);
		var newUrl = sliceUrl($( '#' + currentGalleryImageId).css('background-image'));
		$( '#gallery-expansion img' ).attr('src', newUrl);
		swapCurrentGalleryImage(document.getElementById(currentGalleryImageId));
	} else {
		closeGallery();
	}
}

function prevImage() {
	var imageNum = (Number(currentGalleryImageId.slice(-2)) - 1);
	if (imageNum > -1) {
		currentGalleryImageId = minusOneSlice(currentGalleryImageId);
		var newUrl = sliceUrl($( '#' + currentGalleryImageId).css('background-image'));
		$( '#gallery-expansion img' ).attr('src', newUrl);
		swapCurrentGalleryImage(document.getElementById(currentGalleryImageId));
	} else {
		closeGallery();
	}
}


/**************************************************************
 *
 * Helper Functions
 *
 *************************************************************/

function sliceUrl(url) {
	return url.slice(5, -2);
}

function addOneSlice(id) {
	return galleryTemplate + ('0' + (Number(id.slice(-2)) + 1));
}

function minusOneSlice(id) {
	return galleryTemplate + ('0' + (Number(id.slice(-2)) - 1));
}

function detectIfWidthIsBigger() {
	if ($( '#current-image img' ).width() / $( '#current-image img' ).height() > 1) {
		isWidthBigger = true;		
	} else {
		isWidthBigger = false;		
	}		
}


