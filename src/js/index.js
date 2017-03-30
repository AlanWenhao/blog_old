$( function() {

	// 初始化 Swiper
	( function() {
		var swiper = new Swiper( '.swiper-container', {
	        pagination: '.swiper-pagination',
	        nextButton: '.swiper-button-next',
	        prevButton: '.swiper-button-prev',
	        slidesPerView: 1,
	        paginationClickable: true,
	        spaceBetween: 30,
	        loop: true
	    } );
	} )();

	// scroll function
	(function() {
		$( '.scroll-btn ').on( 'click',function() {
			var $this = $( this );
			var anchor = '#' + $this.data( 'scroll' );
			var destination = $( anchor ).offset().top;
			
			$( 'html,body' ).animate( { scrollTop: destination}, 700 );
			return false;
		} );

		$( window ).scroll( function() {
			if( $( window ).scrollTop()>500 ) {
				$( '.o-to-top' ).removeClass( 'hidden' );
			} else {
				$( '.o-to-top' ).addClass( 'hidden' );
			}
		} );

		new WOW().init();
	} )();

} );