// Ready

// MORE CAROUSEL OPTIONS AVAILABLE HERE:
// https://fancyapps.com/docs/ui/carousel

(function($){

	initializeBlock = function() {
		$('.image-carousel-row').each( function() {
			let images = $(this).find('.carousel');
      
      if ( images.length ) {
        const imageCarousel = new Carousel(images[0], {
          'slidesPerPage' : 1,
          'center' : false,
        });
      }
    });
	}
  initializeBlock();

 // Initialize dynamic block preview (editor).
 // if ( window.acf ) {
 // 	window.acf.addAction( 'render_block_preview/type=BLOCK-NAME', initializeBlock );
 // }

})(jQuery);
