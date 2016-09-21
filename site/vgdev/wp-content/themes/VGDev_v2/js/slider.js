/**
 * Homepage Slider
 *
 * Dependencies: jQuery 3.1.0, Hammer, Hammer-Time
 *
 * Function: interactivity logic for the homepage slider
 * 
 * Last Updated: 2016 09 21
 */

var position = 0;
var numberOfSlides = $( '.slide' ).length;
var homepageSlider = document.getElementById('homepage-slider');

var mc = new Hammer(homepageSlider);
mc.on('panleft', function(e) { slide(-1); })
	.on('panright', function(e) { slide(1); });

/**
 * Whenver the window is resized, resize the slider
 */
$( window ).resize(function() {
	setSliderSize();
});
setSliderSize();

/**
 * Sets the slider height based off the height of the window
 * and the slides' widths based off the window width
 */
function setSliderSize() {
	$( '#homepage-slider' ).height( window .innerHeight - $( '#navigation' ).height() );
	$( '#homepage-slider .slide' ).css('min-width', window.innerWidth );
}

/**
 * Slides the slider wrapper either left or right
 * depending on which slider button is pressed or swiped
 */
function slide(direction) {
	var newPosition = position + direction;
	if (newPosition > (numberOfSlides * -1) && newPosition < 1) {
		position = newPosition;
	}
	var moveOverBy = window.innerWidth * position;
	$('#inner-slider-wrapper').css('marginLeft', moveOverBy + 'px');

	toggleButtonVisiblity();
}

/**
 * Toggles the visiblity of the slider navigation buttons
 * based on the current slide (position)
 */
function toggleButtonVisiblity() {
	if (position === (numberOfSlides - 1) * -1) {
		$('#right-button').fadeOut();
	} else {
		$('#right-button').fadeIn();
	}
	if (position === 0) {
		$('#left-button').fadeOut();
	} else {
		$('#left-button').fadeIn();
	}	
}


