var galleryTemplate = 'gallery-image-';

var currentGalleryImage = $( '#gallery-current' );
var currentGalleryImageId = 'gallery-image-00';
document.getElementsByClassName('option')[0].setAttribute('class', 'option current');

function expandCurrentGalleryImage() {
	if ($( '#gallery-expansion' ).length < 1) {
		$( 'body' ).append('<div id="gallery-expansion"><i class="fa fa-times" id="close-gallery" aria-hidden="true" onclick="closeGallery();"></i><div id="gallery-slider"><div id="prev-image"></div><div id="current-image"></div><div id="next-image"></div></div></div>');
	}

	getCurrentGalleryImage();
	getPreviousGalleryImage();
	getNextGalleryImage();

	$( 'body' ).css('overflow', 'hidden');
	$( '#gallery-expansion' ).css('width', window.innerWidth);
	$( '#gallery-expansion' ).css('height', window.innerHeight);
	$( '#gallery-expansion' ).fadeIn();
}

function swapCurrentGalleryImage(image) {
	currentGalleryImageId = image.id;
	currentGalleryImage.css('background-image', image.style.backgroundImage);
	$( '#gallery-options .option' ).removeClass('current');
	image.setAttribute('class', 'option current');
}

function closeGallery() {
	$( '#gallery-expansion' ).fadeOut();
	$( 'body' ).css('overflow', 'auto');	
}

function getCurrentGalleryImage() {
}

function getPreviousGalleryImage() {
}

function getNextGalleryImage() {
}