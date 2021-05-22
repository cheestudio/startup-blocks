
/* COOKIES
========================================================= */

// Get Cookie
function getCookie(name) {
  var v = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
  return v ? v[2] : null;
}

// Set Cookie
function setCookie(name, value, days) {
  var d = new Date;
  if ( days != '0' ) {
  d.setTime(d.getTime() + 24*60*60*1000*days);
    var expiretime = d.toGMTString();
  } else {
    var expiretime = 0;
  }
  document.cookie = name + "=" + value + ";path=/;expires=" + expiretime;
}

(function($) { // Doc Ready

/* MOBILE NAV
========================================================= */

// Hamburgler Toggle
$('.navbar-toggle').click( function() {
  $('.mobile-nav').fadeToggle();
  $(this).parents('.mobile-nav-wrap').toggleClass('open');
  $('.sub-menu').removeClass('sub-open');
  return false;
});

// Flyout Menus for Sub Nav
$('.mobile-nav ul li').has('ul').append('<a href="#" class="expand" aria-label="Expand Menu"><span class="sr-only">Expand Menu</span><svg viewBox="0 0 15 15" width="15" height="15" xmlns="http://www.w3.org/2000/svg" role="img"><path fill="none" stroke="#000000" stroke-width="3" d="M4.7,13.1l5.6-5.6L4.7,1.9"/></svg></a>');
$('.mobile-nav .sub-menu').prepend('<a href="#" class="close-sub" aria-label="Close Submenu"><span class="sr-only">Close Submenu</span></a>');
$('.mobile-nav ul .menu-item-has-children > a.expand').click(function(e) {
  var current = $(this);
  e.preventDefault();
  current.toggleClass('sub-open expand-open');
  current.prev().toggleClass('sub-open');
});
$('.close-sub').click(function(e){
  e.preventDefault();
  $(this).parent().removeClass('sub-open');
});

// Add Sub Nav Titles Dynamically
$('.mobile-nav ul li.menu-item-has-children').each( function(){
  var navSectionTitle = $(this).find('.expand').next().html();
  $(this).find('.sub-menu').prepend('<div class="sub-menu-title">' + navSectionTitle + '</div>');
});


/* SMOOTH INTERNAL LINKS
========================================================= */
$('a[href*="#"]').not('[href="#"]').click( function(event) {
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    if ( target.length ) {
      event.preventDefault();
      $('html, body').animate({
        scrollTop: target.offset().top
      }, 800);
    }
  }
});


})(jQuery); // End Document Ready
