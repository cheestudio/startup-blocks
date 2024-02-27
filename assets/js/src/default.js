/* COOKIES
========================================================= */

// Get Cookie
function getCookie(name) {
  var v = document.cookie.match("(^|;) ?" + name + "=([^;]*)(;|$)");
  return v ? v[2] : null;
}

// Set Cookie
function setCookie(name, value, days) {
  var d = new Date();
  if (days != "0") {
    d.setTime(d.getTime() + 24 * 60 * 60 * 1000 * days);
    var expiretime = d.toGMTString();
  } else {
    var expiretime = 0;
  }
  document.cookie = name + "=" + value + ";path=/;expires=" + expiretime;
}

// Debounce
function debounce(func, delay) {
  let timeoutId;
  return function (...args) {
    if (timeoutId) {
      clearTimeout(timeoutId);
    }
    timeoutId = setTimeout(() => {
      func.apply(this, args);
      timeoutId = null;
    }, delay);
  };
}

(function ($) {
  // Doc Ready

  /* MOBILE NAV
  ========================================================= */
  // Close Mobile Menu
  function closeMobileMenu() {
    $(".mobile-nav-wrap .mobile-nav").fadeToggle();
    $(".mobile-nav-wrap .mobile-nav .sub-menu").removeClass("sub-open");
    $(".mobile-nav-wrap").toggleClass("open");
    return false;
  }

  // Mobile Nav Toggle
  $(".navbar-toggle").click(function () {
    closeMobileMenu();
  });

  // Mobile menu close on # link
  $(".mobile-menu li a:not('.expand')").click(function(e) {
    const link = $(this).attr('href');
    if (link.length > 0 && link.includes('#')) {
      e.preventDefault();
      closeMobileMenu();
    }
  });

  // Mobile Nav with Expandable Menus
  $(".mobile-menu li")
  .has("ul")
  .find("> a")
  .after(
    '<a href="#" class="expand" aria-label="Expand Menu"><svg viewBox="0 0 15 15" width="15" height="15" xmlns="http://www.w3.org/2000/svg" role="img"><path fill="none" stroke="#000000" stroke-width="3" d="M4.7,13.1l5.6-5.6L4.7,1.9"/></svg></a>'
    );
  $(".mobile-menu .menu-item-has-children > .expand").click(function (e) {
    e.preventDefault();
    var current = $(this);
    current.toggleClass("sub-menu-open");
    current.prev().toggleClass("sub-menu-open");
    var isSubMenu = current.parents(".sub-menu").length;
    if (isSubMenu == 0) {
      current.parents(".mobile-parent-menu").siblings().find(".sub-menu").slideUp(400);
    }
    current.next().slideToggle();
    current.parent().siblings(".menu-item-has-children").find("a").removeClass("sub-menu-open");
    current.parent().siblings(".menu-item-has-children").find(".sub-menu").slideUp(400);
  });

  /* SMOOTH INTERNAL LINKS
  ========================================================= */
  $('a[href^="#"]')
  .not('[href="#"]')
  .click(function (event) {
    if (!$(this).hasClass("no-scroll")) {
      if (
        location.pathname.replace(/^\//, "") == this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
        ) {
        var target = $(this.hash);
      target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
      if (target.length) {
        event.preventDefault();
        $("html, body").animate(
        {
          scrollTop: target.offset().top,
        },
        800
        );
      }
    }
  }
});
})(jQuery); // End Document Ready
