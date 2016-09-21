var position = 0;
var numberOfSlides = $( '.slide' ).length;

var homepageSlider = document.getElementById('homepage-slider');
var mc = new Hammer(homepageSlider);

mc
.on('panleft', function(e) { slide(-1); })
.on('panright', function(e) { slide(1); });

$( window ).resize(function() {
	setSliderSize();
});
setSliderSize();

function setSliderSize() {
 $( '#homepage-slider' ).height( window .innerHeight - $( '#navigation' ).height() );
 $( '#homepage-slider .slide' ).width( window.innerWidth );
}

function slide(direction) {
	var newPosition = position + direction;
	if (newPosition > (numberOfSlides * -1) && newPosition < 1) {
		position = newPosition;
	}
	var moveOverBy = window.innerWidth * position;
	$('#inner-slider-wrapper').css('marginLeft', moveOverBy + 'px');

	// fade out right slider button if at end of slides, fade in otherwise
	if (position === (numberOfSlides - 1) * -1) {
		$('#right-button').fadeOut();
	} else {
		$('#right-button').fadeIn();
	}

	// fade out left slider button if at end of slides, fade in otherwise
	if (position === 0) {
		$('#left-button').fadeOut();
	} else {
		$('#left-button').fadeIn();
	}

}


