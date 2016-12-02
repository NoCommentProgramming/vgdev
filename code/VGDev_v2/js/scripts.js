function setMinSize() {

	if ( document.body.clientHeight < window.innerHeight ) {
		$( '#footer' ).css('position', 'absolute' );
		$( '#footer' ).css('bottom' , 0);
		$( 'body').css('min-height', window.innerHeight);
	} else {
		$( '#footer' ).css('position', 'relative' );
	}

}

setMinSize();

$(window).resize(function() {
	setMinSize()
})