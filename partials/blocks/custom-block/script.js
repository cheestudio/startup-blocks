// Ready

(function($){

/*	initializeBlock = function() {
		$(SECTION).each(function(){
			
		});
	}
initializeBlock();*/

 // Initialize dynamic block preview (editor).
 if ( window.acf ) {
 	window.acf.addAction( 'render_block_preview/type=BLOCK-NAME', initializeBlock );
 }

})(jQuery);
