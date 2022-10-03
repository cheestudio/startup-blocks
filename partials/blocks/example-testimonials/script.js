// Ready

// MORE CAROUSEL OPTIONS AVAILABLE HERE:
// https://fancyapps.com/docs/ui/carousel

(function($){

	initializeBlock = function() {
		$('.testimonials-row').each( function() {
			let quotes = $(this).find('.carousel');
      
      if ( quotes.length ) {
        const imageCarousel = new Carousel(quotes[0], {
          slidesPerPage : 1,
          center : false,
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
