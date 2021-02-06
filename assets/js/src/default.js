(function($){

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
  d.setTime(d.getTime() + 24*60*60*1000*days);
  document.cookie = name + "=" + value + ";path=/;expires=" + d.toGMTString();
}


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
$('.mobile-nav ul li').has('ul').prepend('<a href="#" class="expand" aria-label="Expand Menu"><span class="sr-only">Expand Menu</span></a>');
$('.mobile-nav .sub-menu').prepend('<a href="#" class="close-sub" arial-label="Close Submenu"><span class="sr-only">Close Submenu</span></a>');
$('.mobile-nav ul .menu-item-has-children > a.expand').click(function(e) {
  var current = $(this);
  e.preventDefault();
  $("~ ul", current).toggleClass('sub-open');
  $(current).toggleClass('expand-open');
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


/* HEADER HEIGHT OFFSET
========================================================= */
function headerHeight() {
  if (window.matchMedia('(min-width: 1025px)').matches) {
    heightOffset = 0;
  }
  else {
    heightOffset = $('.mobile-nav-wrap').outerHeight();
  }
}


/* SMOOTH INTERNAL LINKS
========================================================= */
$('a[href*="#"]').not('[href="#"]').click( function(event) {
  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
    var target = $(this.hash);
    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
    headerHeight();
    if ( target.length ) {
      event.preventDefault();
      $('html, body').animate({
        scrollTop: target.offset().top - heightOffset + 1
      }, 800);
    }
  }
});


/* SCREEN RESIZING
========================================================= */

// Detect Resize w Delay (change var to true to enable detection)
var enableResizeWatch = false;

if (enableResizeWatch === true) {
  var resizeTimer;
  var windowWidth = $(window).width();

  $(window).resize( function() {
    clearTimeout(resizeTimer);
    var currentWidth = $(window).width();

    if ( windowWidth !== currentWidth) {
      windowWidth = currentWidth;
      resizeTimer = setTimeout(screenResize, 500);
    }
  });
}

// Function to run after resize
function screenResize() {
  if (window.matchMedia('(min-width: 1025px)').matches) {
    // is >= desktop
  }
  else {
    // is <= tablet
  }
}
​

})(jQuery); // End Document Ready
