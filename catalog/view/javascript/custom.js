var responsiveflag = !1, responsiveflag1 = !1;

function changeProductQuantity() {
  jQuery(document).on("click", ".quantity button", function (t) {
    t.preventDefault();
    var e = jQuery(this), i = e.parent().siblings("#input-quantity"), o = parseInt(i.val(), 10),
        l = parseInt(i.attr("min"), 10), a = parseInt(i.attr("max"), 10);
    l = l || 0, a = a || o + 1, e.hasClass("decrease") && o > l && (i.val(o - 1), i.trigger("change")), e.hasClass("increase") && o < a && (i.val(o + 1), i.trigger("change"))
  })
}

function responsiveResize() {
  $(window).width() <= 991 && 0 == responsiveflag ? (accordion("enable"), accordionFooter("enable"), responsiveflag = !0) : $(window).width() >= 992 && (accordion("disable"), accordionFooter("disable"), responsiveflag = !1)
}

function accordion(t) {
  if ("enable" == t) {
    $("#right-column .block .title_block, #left-column .block .title_block").on("click", function (t) {
      $(this).toggleClass("active").parent().find(".block_content").stop().slideToggle("medium"), $(window).trigger("scroll"), t.preventDefault()
    }), $("#right-column, #left-column").addClass("accordion").find(".block .block_content").slideUp("fast")
  } else $("#right-column .block .title_block, #left-column .block .title_block").removeClass("active").off().parent().find(".block_content").removeAttr("style").slideDown("fast"), $("#left-column, #right-column").removeClass("accordion")
}

function accordionFooter(t) {
  "enable" == t ? ($("#footer h4.title_block").on("click", function (t) {
    $(this).toggleClass("active").parent().find(".toggle-footer").stop().slideToggle("medium"), $(window).trigger("scroll"), t.preventDefault()
  }), $("#footer").addClass("accordion").find(".toggle-footer").slideUp("fast")) : ($("#footer h4.title_block").removeClass("active").off().parent().find(".toggle-footer").removeAttr("style").slideDown("fast"), $("#footer").removeClass("accordion"))
}

function stickyHeader() {
  var t = $(".header-top"), e = (t.offset().top, parseInt(t.outerHeight(!1))), i = parseInt($("#header").height());
  $(window).scroll(function () {
    $(window).width() > 991 ? $(this).scrollTop() > i ? (t.addClass("fixed"), $("header#header").addClass("header-length").css("marginTop", 133)) : (t.removeClass("fixed"), $("header#header").removeClass("header-length").removeAttr("style")) : (t.removeClass("fixed"), $("header").removeClass("header-length").removeAttr("style"))
  })
}

function hoverToolTip() {
  var t = $("[data-hover~=tooltip]"), e = !1, i = !1;
  t.bind("mouseenter", function () {
    if (e = $(this), tip = e.attr("title"), i = $('<div id="tdtooltip"></div>'), !tip || "" == tip) return !1;
    e.removeAttr("title"), i.css("opacity", 0).html(tip).appendTo("body");
    var t = function () {
      $(".product-container").width() < 1.5 * i.outerWidth() ? i.css("max-width", $(window).width() / 2) : i.css("max-width", 340);
      var t = e.offset().left + e.outerWidth() / 2 - i.outerWidth() / 2, o = e.offset().top - i.outerHeight() - 20;
      if (t < 0 ? (t = e.offset().left + e.outerWidth() / 2 - 20, i.addClass("left")) : i.removeClass("left"), t + i.outerWidth() > $(window).width() ? (t = e.offset().left - i.outerWidth() + e.outerWidth() / 2 + 20, i.addClass("right")) : i.removeClass("right"), o < 0) {
        o = e.offset().top + e.outerHeight();
        i.addClass("top")
      } else i.removeClass("top");
      i.css({left: t, top: o}).animate({top: "+=10", opacity: 1}, 50)
    };
    t(), $(window).resize(t);
    var o = function () {
      i.animate({top: "-=10", opacity: 0}, 50, function () {
        $(this).remove()
      }), e.attr("title", tip)
    };
    e.bind("mouseleave", o), i.bind("click", o)
  })
}

function hb_animated_contents() {
  $(".hb-animate-element:in-viewport").each(function (t) {
    var e = $(this);
    e.hasClass("hb-in-viewport") || setTimeout(function () {
      e.addClass("hb-in-viewport")
    }, 30 * t)
  })
}

function dropDown() {
  elementClick = "#header .current", elementSlide = ".toogle_content", activeClass = "active", $(elementClick).on("click", function (t) {
    t.stopPropagation();
    var e = $(this).next(elementSlide);
    e.is(":hidden") ? (e.slideDown(), $(this).addClass(activeClass)) : (e.slideUp(), $(this).removeClass(activeClass)), $(elementClick).not(this).next(elementSlide).slideUp(), $(elementClick).not(this).removeClass(activeClass), t.preventDefault()
  }), $(elementSlide).on("click", function (t) {
    t.stopPropagation()
  }), $(document).on("click", function (t) {
    t.stopPropagation();
    var e = $(elementClick).next(elementSlide);
    $(e).slideUp(), $(elementClick).removeClass("active")
  })
}

function tdimglazyload() {
  jQuery("img.lazy").Lazy({
    scrollDirection: "vertical", visibleOnly: !0, onError: function (t) {
      console.log("error loading " + t.data("src"))
    }, afterLoad: function (t) {
      t.addClass("loaded"), t.attr({"data-lazyloading": 1})
    }
  })
}

$(document).ready(function () {
  hoverToolTip(), responsiveResize(), dropDown(), $(window).resize(responsiveResize), tdimglazyload(), $(".owl-carousel").on("translate.owl.carousel", function (t) {
    tdimglazyload()
  }), $('a[data-toggle="tab"]').on("shown.bs.tab", function () {
    $(window).trigger("scroll")
  }), $("body").on("click", ".header-toggle", function (t) {
    $("body").addClass("header-active"), t.stopPropagation()
  }), $("body").on("click", "#header-nav-close, .mobile-header-overlay", function (t) {
    $("body").removeClass("header-active"), t.stopPropagation()
  }), $(document).on("click", ".category-top-menu li.category-dropdown-menu .toggle-category", function () {
    if ($(this).parent().siblings(".active").length) {
      var t = $(this).parent().siblings(".active");
      t.children("ul").stop().slideUp(200), t.children(".toggle-category").children(".fa").removeClass("fa-angle-up").addClass("fa-angle-down"), t.removeClass("active")
    }
    $(this).parent().hasClass("active") ? ($(this).parent().removeClass("active").children("ul").stop().slideUp(200), $(this).parent().children(".toggle-category").children(".fa").removeClass("fa-angle-up").addClass("fa-angle-down")) : ($(this).parent().addClass("active").children("ul").stop().slideDown(200), $(this).parent().children(".toggle-category").children(".fa").removeClass("fa-angle-down").addClass("fa-angle-up"))
  });
  var t = $("#tdservice-carousel");

  function e() {
    var t = $("#tdservice-carousel .owl-stage .owl-item.active").length;
    $("#tdservice-carousel .owl-stage .owl-item").removeClass("first last"), $("#tdservice-carousel .owl-stage .owl-item.active").each(function (e) {
      0 === e && $(this).addClass("first"), e === t - 1 && t > 1 && $(this).addClass("last")
    })
  }

  t.owlCarousel({
    autoplay: 3e3,
    dots: !1,
    nav: !1,
    rewind: !0,
    rtl: "rtl" == $("html").attr("dir"),
    responsiveClass: !0,
    responsive: {0: {items: 1}, 544: {items: 1}, 768: {items: 2}, 992: {items: 2}, 1200: {items: 3}, 1560: {items: 3}}
  }), e(), t.on("translated.owl.carousel", function (t) {
    e()
  }), /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? $(".parallax").sitManParallex({invert: !0}) : $(".parallax").length && $(".parallax").sitManParallex({invert: !1}), $("#language_selector").css("display", "inline-block"), $("#currency_selector").css("display", "inline-block"), $(window).scroll(function () {
    $(this).scrollTop() > 500 ? $(".backtotop").fadeIn(500) : $(".backtotop").fadeOut(500)
  }), $(".backtotop").click(function (t) {
    t.preventDefault(), $("html, body").animate({scrollTop: 0}, 800)
  }), $("#list-view").click(function () {
    $("#content .product-grid > .clearfix").remove(), $("#content .row > .product-grid").attr("class", "product-layout product-list col-xs-6"), $("#content .row > .product-layout").each(function (t, e) {
      var i = "";
      i = '<div class="product-thumb">', i += '<div class="row">', i += '<div class="thumbnail-container col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">', i += '<div class="image">' + $(e).find(".image").html() + "</div>", i += "</div>", i += '<div class="caption col-xs-12 col-sm-6 col-md-8 col-lg-8 col-xl-9">', i += '<div class="product-title" itemprop="name">' + $(e).find(".product-title").html() + "</div>";
      var o = $(e).find(".rating").html();
      null != o && (i += '<div class="rating" itemprop="aggregateRating" itemscope="" itemtype="https://schema.org/AggregateRating">' + o + "</div>");
      var l = $(e).find(".price").html();
      null != l && (i += '<div class="price">' + l + "</div>"), i += '<p class="product-desc" itemprop="description">' + $(e).find(".product-desc").html() + "</p>", i += '<div class="button-container">', i += '<div class="product-add-to-cart">' + $(e).find(".product-add-to-cart").html() + "</div>", i += '<div class="quick-view-wrapper">' + $(e).find(".quick-view-wrapper").html() + "</div>", i += '<div class="compare">' + $(e).find(".compare").html() + "</div>", i += '<div class="wishlist">' + $(e).find(".wishlist").html() + "</div>", i += "</div>", i += "</div>", i += "</div>", i += "</div>", $(e).html(i)
    }), $("#grid-view").removeClass("active"), $("#list-view").addClass("active"), tdimglazyload(), hoverToolTip(), localStorage.setItem("display", "list")
  }), $("#grid-view").click(function () {
    var t = $("#right-column, #left-column").length;
    2 == t ? $("#content .product-list").attr("class", "product-layout product-grid col-xs-6 col-sm-6 col-md-4 col-lg-6 col-xl-6") : 1 == t ? $("#content .product-list").attr("class", "product-layout product-grid  col-xs-6 col-sm-6 col-md-4 col-lg-6 col-xl-4") : $("#content .product-list").attr("class", "product-layout product-grid  col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-3"), $("#content .row > .product-layout").each(function (t, e) {
      var i = "";
      i = '<div class="product-thumb">', i += '<div class="thumbnail-container">', i += '<div class="image">' + $(e).find(".image").html() + "</div>", i += "</div>", i += '<div class="caption">', i += '<div class="product-title" itemprop="name">' + $(e).find(".product-title").html() + "</div>";
      var o = $(e).find(".price").html();
      null != o && (i += '<div class="price">' + o + "</div>"), i += '<p class="product-desc" itemprop="description">' + $(e).find(".product-desc").html() + "</p>", i += '<div class="cart-content">', i += '<div class="product-add-to-cart">' + $(e).find(".product-add-to-cart").html() + "</div>";
      var l = $(e).find(".rating").html();
      null != l && (i += '<div class="rating" itemprop="aggregateRating" itemscope="" itemtype="https://schema.org/AggregateRating">' + l + "</div>"), i += "</div>", i += "</div>", i += "</div>", $(e).html(i)
    }), $("#list-view").removeClass("active"), $("#grid-view").addClass("active"), tdimglazyload(), hoverToolTip(), localStorage.setItem("display", "grid")
  }), "list" == localStorage.getItem("display") ? ($("#list-view").trigger("click"), $("#list-view").addClass("active")) : ($("#grid-view").trigger("click"), $("#grid-view").addClass("active")), changeProductQuantity()
}), $(window).load(function () {
  $("#page-loader").fadeOut("slow")
}), $(document).ready(function () {
  stickyHeader()
}), $(window).resize(function () {
  stickyHeader()
}), function (t) {
  t.belowthefold = function (e, i) {
    return t(window).height() + t(window).scrollTop() <= t(e).offset().top - i.threshold
  }, t.abovethetop = function (e, i) {
    return t(window).scrollTop() >= t(e).offset().top + t(e).height() - i.threshold
  }, t.rightofscreen = function (e, i) {
    return t(window).width() + t(window).scrollLeft() <= t(e).offset().left - i.threshold
  }, t.leftofscreen = function (e, i) {
    return t(window).scrollLeft() >= t(e).offset().left + t(e).width() - i.threshold
  }, t.inviewport = function (e, i) {
    return !(t.rightofscreen(e, i) || t.leftofscreen(e, i) || t.belowthefold(e, i) || t.abovethetop(e, i))
  }, t.extend(t.expr[":"], {
    "below-the-fold": function (e, i, o) {
      return t.belowthefold(e, {threshold: 0})
    }, "above-the-top": function (e, i, o) {
      return t.abovethetop(e, {threshold: 0})
    }, "left-of-screen": function (e, i, o) {
      return t.leftofscreen(e, {threshold: 0})
    }, "right-of-screen": function (e, i, o) {
      return t.rightofscreen(e, {threshold: 0})
    }, "in-viewport": function (e, i, o) {
      return t.inviewport(e, {threshold: 0})
    }
  })
}(jQuery), $(window).scroll(function () {
  hb_animated_contents()
}), $(window).load(function () {
  hb_animated_contents()
}), function (t) {
  function e() {
    if (t(".megamenu").length) {
      var e = t("#header .container"), i = e.offset(), o = e.width(), l = parseFloat(e.css("padding-left")),
          a = i.left + l;
      t(document).width() <= 991 ? t(".megamenu li.mega > .sub-menu").each(function (e, i) {
        t(this).removeAttr("style")
      }) : t(document).width() >= 992 && ("rtl" == t("html").attr("dir") ? t(".megamenu li.mega > .sub-menu").each(function (e, i) {
        t(this).removeAttr("style"), t(this).outerWidth(!1) >= o && t(this).css("width", Math.round(o) + "px");
        t(".megamenu").offset();
        var l = t(this).parent(), n = l.offset().left + l.outerWidth(!1), s = t(this).outerWidth(!1) - (n - a);
        s > 0 && t(this).css("right", "-" + s + "px")
      }) : t(".megamenu li.mega > .sub-menu").each(function (e, i) {
        t(this).removeAttr("style"), t(this).outerWidth(!1) >= o && t(this).css("width", Math.round(o) + "px");
        t(".megamenu").offset();
        var l = t(this).parent().offset().left + t(this).outerWidth(!1) - (a + o);
        l > 0 && t(this).css("left", "-" + l + "px")
      }))
    }
  }

  t(window).resize(function () {
    e(), setTimeout(function () {
      e()
    }, 800), setTimeout(function () {
      e()
    }, 1600)
  }), window.addEventListener && window.addEventListener("orientationchange", e, !1), t(document).ready(function () {
    e(), setTimeout(function () {
      e()
    }, 800), setTimeout(function () {
      e()
    }, 1600), t(document).on("click", ".megamenu .td-horizontal-menu.mobile-navigation li.has-child .toggle-submenu", function () {
      if (t(this).parent().siblings(".active").length) {
        var e = t(this).parent().siblings(".active");
        e.children("ul").stop().slideUp(200), e.children(".toggle-submenu").children(".fa").removeClass("fa-angle-up").addClass("fa-angle-down"), e.removeClass("active")
      }
      t(this).parent().hasClass("active") ? (t(this).parent().removeClass("active").children("ul").stop().slideUp(200), t(this).parent().children(".toggle-submenu").children(".fa").removeClass("fa-angle-up").addClass("fa-angle-down")) : (t(this).parent().addClass("active").children("ul").stop().slideDown(200), t(this).parent().children(".toggle-submenu").children(".fa").removeClass("fa-angle-down").addClass("fa-angle-up"))
    })
  })
}(jQuery);