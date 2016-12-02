var mobileNavigationIsVisible = false;

$( window ).resize(function() {
	resizeMobileNavigationHeight();
});


function resizeMobileNavigationHeight() {
	$( '#mobile-navigation' ).height( window.innerHeight );
	$( '#mobile-navigation' ).width( window.innerWidth / 2);
	if (!mobileNavigationIsVisible) {
		$( '#mobile-navigation' ).css('marginLeft', -1 * $( '#mobile-navigation' ).width());
	}
}
resizeMobileNavigationHeight();

function displayMobileNavigation() {
	mobileNavigationIsVisible = true;
	$( '#mobile-navigation' ).animate({marginLeft: 0, opacity: 1}, function() {
		$( 'body' ).css('overflow', 'hidden');
		$( '#navigation-overlay').fadeIn();
		$( '#mobile-navigation-button' ).fadeOut(function() {
			$( '#mobile-navigation-button' ).attr('class', 'fa fa-times');
			$( '#mobile-navigation-button' ).attr('onclick', 'hideMobileNavigation();');
			$( '#mobile-navigation-button' ).fadeIn();		
		});		
	});
}

function hideMobileNavigation() {
	mobileNavigationIsVisible = false;
	$( '#mobile-navigation' ).animate({marginLeft: -1 * $('#mobile-navigation').width(), opacity: 0}, function() {
		$( 'body' ).css('overflow', 'auto');	
		$( '#navigation-overlay').fadeOut();
		$( '#mobile-navigation-button' ).fadeOut(function() {
			$( '#mobile-navigation-button' ).attr('class', 'fa fa-bars');
			$( '#mobile-navigation-button' ).attr('onclick', 'displayMobileNavigation();');
			$( '#mobile-navigation-button' ).fadeIn();		
		});		
	});
}