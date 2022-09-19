// Ready

(function($){

   initializeBlock = function() {
      $('.accordion-row').each( function(){
        let rows = $(this).find('.toggle a');
        if ( rows.length ) {
          rows.click( function(e) {
            e.preventDefault();
            let current = $(this);
            let parent = current.parents('.entry');
            
            parent.toggleClass('active');
            parent.siblings('.active').removeClass('active');
            parent.siblings('.active').find('.inner').stop().slideUp();
            current.parent().next().stop().slideToggle();
          });
        }
      });
    }
  initializeBlock();


 // Initialize dynamic block preview (editor).
 // if ( window.acf ) {
 //   window.acf.addAction( 'render_block_preview/type=BLOCK-NAME', initializeBlock );
 // }

})(jQuery);
