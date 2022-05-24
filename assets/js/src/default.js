
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

// Mobile Nav Toggle
$('.navbar-toggle').click( function() {
  $('.mobile-nav').fadeToggle();
  $(this).parents('.mobile-nav-wrap').toggleClass('open');
  $('.sub-menu').removeClass('sub-open');
  return false;
});

// Mobile Nav with Dropdown Menus

$('.mobile-menu li').has('ul').find('> a').after('<a href="#" class="expand" aria-label="Expand Menu"></a>');
$('.mobile-menu .menu-item-has-children > .expand').click( function(e) {
  e.preventDefault();
  var current = $(this);
  current.toggleClass('sub-menu-open');
  current.prev().toggleClass('sub-menu-open');
  var isSubMenu = current.parents('.sub-menu').length;
  if ( isSubMenu == 0 ) {
    current.parents('.mobile-parent-menu').siblings().find('.sub-menu').slideUp(400);
  }
  current.next().slideToggle();
  current.parent().siblings('.menu-item-has-children').find('a').removeClass('sub-menu-open');
  current.parent().siblings('.menu-item-has-children').find('.sub-menu').slideUp(400);
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
