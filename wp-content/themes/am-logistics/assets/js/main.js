/** @format */

jQuery(document).ready(function ($) {
  "use strict";

  /* window */
  var window_width, window_height, scroll_top;

  /* admin bar */
  var adminbar = $("#wpadminbar");
  var adminbar_height = 0;

  /* header menu */
  var header = $("#zo-header");
  var header_top = 0;
  var header_height = 0;

  /* scroll status */
  var scroll_status = "";

  /**
   * window load event.
   *
   * Bind an event handler to the "load" JavaScript event.
   * @author ZoTheme
   */
  $(window).load(function () {
    /** current scroll */
    scroll_top = $(window).scrollTop();

    /** current window width */
    window_width = $(window).width();

    /** current window height */
    window_height = $(window).height();

    /* get admin bar height */
    adminbar_height = adminbar.length > 0 ? adminbar.outerHeight(true) : 0;

    /* get top header menu */
    if (header.length) {
      header_top = header.offset().top;
      header_height = header.height();
    }

    /* check mobile menu */
    zo_mobile_menu();

    /* check back to top */
    if (ZOOptions.back_to_top == "1") {
      /* add html. */
      $("body").append(
        '<div id="back_to_top" class="back_to_top"><span class="go_up"><i style="" class="fa fa-arrow-up"></i></span></div><!-- #back-to-top -->'
      );
      zo_back_to_top();
    }

    /* page loading. */
    zo_page_loading();
    $("#wpb_wiz_gallery").addClass("open");
  });

  if ($(window).outerWidth() > 992 && $(".sticky-sidebar").length) {
    $(".sticky-sidebar").wrap('<div class="sticky-sidebar-wrap"></div>');
    var stickySidebar = $(".sticky-sidebar"),
      stickySidebarOffset = stickySidebar.offset(),
      stickySidebarHeight = stickySidebar.outerHeight(),
      stickySidebarWidth = stickySidebar.outerWidth(),
      stickyParent = stickySidebar.closest(".row"),
      stickyWrapHeight = stickyParent.outerHeight() - stickySidebarHeight,
      stickyWrapOffset = stickyParent.offset();

    $(".sticky-sidebar-wrap").css({ height: stickySidebarHeight });
    $(window).scroll(function () {
      var windowTop = $(window).scrollTop();
      if (
        stickySidebarOffset.top < windowTop &&
        windowTop <= stickyWrapHeight + stickyWrapOffset.top
      ) {
        stickySidebar.css({
          position: "fixed",
          top: "40px",
          width: stickySidebarWidth,
        });
      } else if (windowTop > stickyWrapHeight + stickyWrapOffset.top) {
        stickySidebar.css({
          position: "absolute",
          top: stickyWrapHeight,
          width: stickySidebarWidth,
        });
      } else {
        stickySidebar.css("position", "static");
      }
    });
  }

  $(".scroll-menu")
    .find("a")
    .each(function () {
      $(this).click(function (e) {
        e.preventDefault();
        var t = this.hash;
        if ($(t).length) {
          var n = $(t).offset().top - 50;
          var r = Math.round(1e3 + n / 30);
          $("html, body").animate({ scrollTop: n }, r);
        }
      });
    });
  /**
   * reload event.
   *
   * Bind an event handler to the "navigate".
   */
  window.onbeforeunload = function () {
    zo_page_loading(1);
  };

  /**
   * resize event.
   *
   * Bind an event handler to the "resize" JavaScript event, or trigger that event on an element.
   * @author ZoTheme
   */
  $(window).resize(function (event, ui) {
    /** current window width */
    window_width = $(event.target).width();

    /** current window height */
    window_height = $(window).height();

    /** current scroll */
    scroll_top = $(window).scrollTop();

    /* check mobile menu */
    zo_mobile_menu();
  });

  /**
   * scroll event.
   *
   * Bind an event handler to the "scroll" JavaScript event, or trigger that event on an element.
   * @author ZoTheme
   */
  var lastScrollTop = 0;

  $(window).scroll(function () {
    /** current scroll */
    scroll_top = $(window).scrollTop();
    /** check scroll up or down. */
    if (scroll_top < lastScrollTop) {
      /* scroll up. */
      scroll_status = "up";
    } else {
      /* scroll down. */
      scroll_status = "down";
    }

    lastScrollTop = scroll_top;

    /* check back to top */
    zo_back_to_top();
  });

  /* check mobile screen. */
  function zo_mobile_menu() {
    var menu = $(".zo-header-navigation");

    /* active mobile menu. */
    switch (true) {
      case window_width < 992 && window_width >= 768:
        menu.removeClass("phones-nav").addClass("tablets-nav");
        /* */
        zo_mobile_menu_group(menu);
        break;
      case window_width <= 768:
        menu.removeClass("tablets-nav").addClass("phones-nav");
        break;
      default:
        menu.removeClass("mobile-nav tablets-nav");
        menu.find("li").removeClass("mobile-group");
        break;
    }
  }

  /* group sub menu. */
  function zo_mobile_menu_group(nav) {
    nav.each(function () {
      $(this)
        .find("li")
        .each(function () {
          if ($(this).find("ul:first").length > 0) {
            $(this).addClass("mobile-group");
          }
        });
    });
  }
  /**
   * Page Loading.
   */
  function zo_page_loading($load) {
    switch ($load) {
      case 1:
        $("#zo-loadding").css("display", "block");
        break;
      default:
        $("#zo-loadding").css("display", "none");
        break;
    }
  }

  /**
   * Back To Top
   *
   * @author ZoTheme
   * @since 1.0.0
   */
  $("body").on("click", "#back_to_top", function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      1500
    );
  });
  $("body").on("click", "#scroll_to_top", function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      1000
    );
  });

  /* Show or hide buttom  */
  function zo_back_to_top() {
    /* back to top */
    if (scroll_top < window_height) {
      $("#back_to_top").addClass("off").removeClass("on");
    } else {
      $("#back_to_top").removeClass("off").addClass("on");
    }
  }

  $("button.toggle_seach").click(function () {
    $(".dgwt-wcas-search-wrapp").toggleClass("form-open");
    $("body").toggleClass("form-search-open");
  });

  $("body.logged-in").each(function () {
    $(
      "#menu-item-219 a .menu-title, .menu-menu-footer-container #menu-item-218 a .menu-title"
    ).text("My Page");
    $("#menu-item-212, #menu-item-209").remove();
  });
  $(".additional_information_tab").each(function () {
    $(this).find("a").text("SPECIFICATION");
  });

  // cate 1
  $(".list-mini-drones").each(function () {
    var html_div = $(".list-mini-drones").remove();
    $("#menu-item-183").prepend(html_div);
  });

  $(".right.menu-logout").each(function () {
    var html_div = $(".right.menu-logout").remove();
    $("#menu-item-182 ul.sub-menu").append(html_div);
  });
  // cate 2
  $(".list-hobby-drones").each(function () {
    var html_div = $(".list-hobby-drones").remove();
    $("#menu-item-184").prepend(html_div);
  });
  // cate 3
  $(".list-professional-drones").each(function () {
    var html_div = $(".list-professional-drones").remove();
    $("#menu-item-185").prepend(html_div);
  });
  // cate 4
  $(".list-selfie-drones").each(function () {
    var html_div = $(".list-selfie-drones").remove();
    $("#menu-item-186").prepend(html_div);
  });
  // cate 5
  $(".list-racing-drones").each(function () {
    var html_div = $(".list-racing-drones").remove();
    $("#menu-item-187").prepend(html_div);
  });
  $(".compare.button").click(function () {
    $("body").addClass("ovl-hide");
  });

  $("#cboxOverlay, button#cboxClose, #cboxContent").click(function () {
    $("body").removeClass("ovl-hide");
  });

  $(".product-menu")
    .not(".slick-initialized")
    .slick({
      dots: false,
      infinite: true,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 4,
      autoplay: true,
      autoplaySpeed: 3000,
      arrows: true,
      responsive: [
        {
          breakpoint: 1400,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
      ],
    });

  $(".customer-review")
    .not(".slick-initialized")
    .slick({
      dots: false,
      infinite: true,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 4,
      autoplay: true,
      autoplaySpeed: 3000,
      arrows: true,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });

  $("#wpb_wiz_gallery")
    .not(".slick-initialized")
    .slick({
      dots: false,
      infinite: true,
      speed: 500,
      slidesToShow: 4,
      slidesToScroll: 4,
      autoplay: true,
      autoplaySpeed: 3000,
      arrows: true,
      responsive: [
        {
          breakpoint: 1400,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          },
        },
      ],
    });
});
