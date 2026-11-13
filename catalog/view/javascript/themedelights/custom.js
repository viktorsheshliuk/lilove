var responsiveflag = false;
var responsiveflag1 = false;

$(document).ready(function () {
	hoverToolTip();
	responsiveResize();
	dropDown();
	$(window).resize(responsiveResize);
	tdimglazyload();
	$('.owl-carousel').on('translate.owl.carousel', function(e){
		tdimglazyload();
	});
	$('a[data-toggle="tab"]').on('shown.bs.tab', function () {
		$(window).trigger('scroll');
	});

	/*====== responsive menu  ==== */
	$('body').on('click', '.header-toggle', function(e){
		$('body').addClass('header-active');
		e.stopPropagation();
	});
	$('body').on('click', '#header-nav-close, .mobile-header-overlay', function(e){
		$('body').removeClass('header-active');
		e.stopPropagation();
	});

	// category droupdown
	$(document).on('click', '.category-top-menu li.category-dropdown-menu .toggle-category', function(){
        if ($(this).parent().siblings('.active').length) {
            var old_open = $(this).parent().siblings('.active');
            old_open.children('ul').stop().slideUp(200);
            old_open.children('.toggle-category').children('.fa').removeClass('fa-angle-up').addClass('fa-angle-down');
            old_open.removeClass('active');
        }
        if ($(this).parent().hasClass('active')) {
            $(this).parent().removeClass('active').children('ul').stop().slideUp(200);
            $(this).parent().children('.toggle-category').children('.fa').removeClass('fa-angle-up').addClass('fa-angle-down');
        } else {
            $(this).parent().addClass('active').children('ul').stop().slideDown(200);
            $(this).parent().children('.toggle-category').children('.fa').removeClass('fa-angle-down').addClass('fa-angle-up');
        }
    });

	/*======  Carousel For tdserviceblock  ==== */
	var tdservice = $("#tdservice-carousel");
	tdservice.owlCarousel({
		autoplay: 3000,
		dots:false,
		nav:false,
		rewind:true,
		rtl:($("html").attr('dir')=="rtl") ? true : false,
		responsiveClass:true,
		responsive:{
			0:{
				items:1
			},
			544:{
				items:1
			},
			768:{
				items:2
			},
			992:{
				items:2
			},
			1200:{
				items:3
			},
			1560:{
				items:3
			}
		}
	});

	SetOwlCarouselFirstLast();
    tdservice.on('translated.owl.carousel', function(event) {
        SetOwlCarouselFirstLast();
    });

    function SetOwlCarouselFirstLast(){
        var total = $('#tdservice-carousel .owl-stage .owl-item.active').length;

        $('#tdservice-carousel .owl-stage .owl-item').removeClass('first last');

        $('#tdservice-carousel .owl-stage .owl-item.active').each(function(index){
            if (index === 0) {
                $(this).addClass('first');
            }
            if (index === total - 1 && total>1) {
                $(this).addClass('last');
            }
        });
    }

    /*======  parallax  ==== */
    var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);
	if(!isMobile) {
		if($(".parallax").length) {
			$(".parallax").sitManParallex({  invert: false });
		};
	} else {
		$(".parallax").sitManParallex({  invert: true });
	}

	/*======  lang and currency  ==== */
	$('#language_selector').css('display','inline-block');
	$('#currency_selector').css('display','inline-block');

	/*====== Back to Top Button ==== */
	$(window).scroll(function() {
		if ($(this).scrollTop() > 500) {
			$('.backtotop').fadeIn(500);
		} else {
			$('.backtotop').fadeOut(500);
		}
	});
	$('.backtotop').click(function(e) {
		e.preventDefault();
		$('html, body').animate({scrollTop: 0}, 800);
	});

	// Product List

	$('#list-view').click(function() {
		$('#content .product-grid > .clearfix').remove();
		$('#content .row > .product-grid').attr('class', 'product-layout product-list col-xs-6');
		$('#content .row > .product-layout').each(function(index, element) {
			var html = '';
			html = '<div class="product-thumb">';
				html += '<div class="row">';
					html += '<div class="thumbnail-container col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-3">';
						html += '<div class="image">' + $(element).find('.image').html() + '</div>';
					html += '</div>';
					html += '<div class="caption col-xs-12 col-sm-6 col-md-8 col-lg-8 col-xl-9">';
						html += '<div class="product-title" itemprop="name">'+ $(element).find('.product-title').html() + '</div>';
						var hookReviews = $(element).find('.rating').html();
						if (hookReviews != null) {
							html += '<div class="rating" itemprop="aggregateRating" itemscope="" itemtype="https://schema.org/AggregateRating">' + hookReviews + '</div>';
						}
						var price = $(element).find('.price').html();
						if (price != null) {
							html += '<div class="price">'+ price + '</div>';
						}
						html += '<p class="product-desc" itemprop="description">'+ $(element).find('.product-desc').html() + '</p>';
							html += '<div class="button-container">';
								html += '<div class="product-add-to-cart">' + $(element).find('.product-add-to-cart').html() + '</div>';
								html += '<div class="quick-view-wrapper">' + $(element).find('.quick-view-wrapper').html() + '</div>';
								html += '<div class="compare">' + $(element).find('.compare').html() + '</div>';
								html += '<div class="wishlist">' + $(element).find('.wishlist').html() + '</div>';
							html += '</div>';
				    html += '</div>';
				html += '</div>';
			html += '</div>';
			$(element).html(html);
		});
		$('#grid-view').removeClass('active');
		$('#list-view').addClass('active');
		tdimglazyload();
		hoverToolTip();
		localStorage.setItem('display', 'list');
	});

	// Product Grid
	$('#grid-view').click(function() {
		var cols = $('#right-column, #left-column').length;

		if (cols == 2) {

			$('#content .product-list').attr('class', 'product-layout product-grid col-xs-6 col-sm-6 col-md-4 col-lg-6 col-xl-6');
		} else if (cols == 1) {
			$('#content .product-list').attr('class', 'product-layout product-grid  col-xs-6 col-sm-6 col-md-4 col-lg-6 col-xl-4');
		} else {
			$('#content .product-list').attr('class', 'product-layout product-grid  col-xs-6 col-sm-6 col-md-4 col-lg-4 col-xl-3');
		}
		$('#content .row > .product-layout').each(function(index, element) {
			var html = '';
			html = '<div class="product-thumb">';
					html += '<div class="thumbnail-container">';
						html += '<div class="image">' + $(element).find('.image').html() + '</div>';
					html += '</div>';
					html += '<div class="caption">';
					html += '<div class="product-title" itemprop="name">'+ $(element).find('.product-title').html() + '</div>';
					var price = $(element).find('.price').html();
					if (price != null) {
						html += '<div class="price">'+ price + '</div>';
					}
					html += '<p class="product-desc" itemprop="description">'+ $(element).find('.product-desc').html() + '</p>';
					html += '<div class="cart-content">';
						html += '<div class="product-add-to-cart">' + $(element).find('.product-add-to-cart').html() + '</div>';
						var hookReviews = $(element).find('.rating').html();
						if (hookReviews != null) {
							html += '<div class="rating" itemprop="aggregateRating" itemscope="" itemtype="https://schema.org/AggregateRating">' + hookReviews + '</div>';
						}
					html += '</div>';
				html += '</div>';
			html += '</div>';
			$(element).html(html);
		});
		$('#list-view').removeClass('active');
		$('#grid-view').addClass('active');
		tdimglazyload();
		hoverToolTip();
		localStorage.setItem('display', 'grid');
	});

	if (localStorage.getItem('display') == 'list') {
		$('#list-view').trigger('click');
		$('#list-view').addClass('active');
	} else {
		$('#grid-view').trigger('click');
		$('#grid-view').addClass('active');
	}
	changeProductQuantity();

});

function changeProductQuantity() {
    jQuery(document).on( 'click', '.quantity button', function( event ) {
        event.preventDefault();

        var $button = jQuery( this ),
        $qty = $button.parent().siblings( '#input-quantity' ),
        current = parseInt( $qty.val(), 10 ),
        min = parseInt( $qty.attr( 'min' ), 10 ),
        max = parseInt( $qty.attr( 'max' ), 10 );

        min = min ? min : 0;
        max = max ? max : current + 1;

        if ( $button.hasClass( 'decrease' ) && current > min ) {
            $qty.val( current - 1 );
            $qty.trigger( 'change' );
        }

        if ( $button.hasClass( 'increase' ) && current < max ) {
            $qty.val( current + 1 );
            $qty.trigger( 'change' );
        }
    });
}

$(window).load(function() {
  $("#page-loader").fadeOut("slow");
});

function responsiveResize()
{
	if ($(window).width() <= 991 && responsiveflag == false) {
		accordion('enable');
		accordionFooter('enable');
		responsiveflag = true;
	} else if ($(window).width() >= 992) {
		accordion('disable');
		accordionFooter('disable');
		responsiveflag = false;
	}
}

function accordion(status)
{
	if(status == 'enable') {
		var accordion_selector = '#right-column .block .title_block, #left-column .block .title_block';

		$(accordion_selector).on('click', function(e){
			$(this).toggleClass('active').parent().find('.block_content').stop().slideToggle('medium');
			$(window).trigger('scroll');
			e.preventDefault();
		});
		$('#right-column, #left-column').addClass('accordion').find('.block .block_content').slideUp('fast');
	} else {
		$('#right-column .block .title_block, #left-column .block .title_block').removeClass('active').off().parent().find('.block_content').removeAttr('style').slideDown('fast');
		$('#left-column, #right-column').removeClass('accordion');
	}
}

function accordionFooter(status)
{
	if (status == 'enable') {
		$('#footer h4.title_block').on('click', function(e){
			$(this).toggleClass('active').parent().find('.toggle-footer').stop().slideToggle('medium');
			$(window).trigger('scroll');
			e.preventDefault();
		})
		$('#footer').addClass('accordion').find('.toggle-footer').slideUp('fast');
	} else {
		$('#footer h4.title_block').removeClass('active').off().parent().find('.toggle-footer').removeAttr('style').slideDown('fast');
		$('#footer').removeClass('accordion');
	}
}

function stickyHeader() {
  var fixed = $(".header-top");
  var navPos = fixed.offset().top;
  var height = parseInt(fixed.outerHeight(false));
  var outerHeight = parseInt($("#header").height());
  $(window).scroll(function() {
    if ($(window).width() > 991) {
      if ($(this).scrollTop() > outerHeight) {
        fixed.addClass("fixed");
        $('header#header').addClass("header-length").css('marginTop', height);
      }
      else {
        fixed.removeClass("fixed");
        $('header#header').removeClass("header-length").removeAttr( 'style' );;
      }
    }
    else {
      fixed.removeClass("fixed");
      $('header').removeClass("header-length").removeAttr( 'style' );;
    }
  });
}
$(document).ready(function() {stickyHeader();});
$(window).resize(function() {stickyHeader();});

function hoverToolTip() {
    var targets = $('[data-hover~=tooltip]'),
        target  = false,
        tooltip = false,
        title   = false;

    targets.bind('mouseenter', function() {
        target  = $(this);
        tip     = target.attr('title');
        tooltip = $('<div id="tdtooltip"></div>');

        if (!tip || tip == '') {
            return false;
        }

        target.removeAttr('title');
        tooltip.css('opacity', 0)
               .html(tip)
               .appendTo('body');

        var init_tooltip = function(){
            if ($('.product-container').width() < tooltip.outerWidth() * 1.5) {
                tooltip.css('max-width', $(window).width() / 2);
            } else {
                tooltip.css('max-width', 340);
            }

            var pos_left = target.offset().left + (target.outerWidth() / 2) - (tooltip.outerWidth() / 2),
                pos_top = target.offset().top - tooltip.outerHeight() - 20;

            if (pos_left < 0) {
                pos_left = target.offset().left + target.outerWidth() / 2 - 20;
                tooltip.addClass('left');
            } else {
                tooltip.removeClass('left');
            }

            if (pos_left + tooltip.outerWidth() > $(window).width()) {
                pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20;
                tooltip.addClass('right');
            } else {
                tooltip.removeClass('right');
            }

            if (pos_top < 0) {
                var pos_top  = target.offset().top + target.outerHeight();
                tooltip.addClass('top');
            } else {
                tooltip.removeClass('top');
            }

            tooltip.css({left: pos_left, top: pos_top}).animate({top: '+=10', opacity: 1}, 50);
        };

        init_tooltip();
        $(window).resize(init_tooltip);

        var remove_tooltip = function(){
            tooltip.animate({ top: '-=10', opacity: 0}, 50, function(){
                $(this).remove();
            });

            target.attr('title', tip);
        };

        target.bind('mouseleave', remove_tooltip);
        tooltip.bind('click', remove_tooltip);
    });
}
/* Inview */
(function($){$.belowthefold=function(element,settings){var fold=$(window).height()+$(window).scrollTop();return fold<=$(element).offset().top-settings.threshold;};$.abovethetop=function(element,settings){var top=$(window).scrollTop();return top>=$(element).offset().top+$(element).height()-settings.threshold;};$.rightofscreen=function(element,settings){var fold=$(window).width()+$(window).scrollLeft();return fold<=$(element).offset().left-settings.threshold;};$.leftofscreen=function(element,settings){var left=$(window).scrollLeft();return left>=$(element).offset().left+$(element).width()-settings.threshold;};$.inviewport=function(element,settings){return!$.rightofscreen(element,settings)&&!$.leftofscreen(element,settings)&&!$.belowthefold(element,settings)&&!$.abovethetop(element,settings);};$.extend($.expr[':'],{"below-the-fold":function(a,i,m){return $.belowthefold(a,{threshold:0});},"above-the-top":function(a,i,m){return $.abovethetop(a,{threshold:0});},"left-of-screen":function(a,i,m){return $.leftofscreen(a,{threshold:0});},"right-of-screen":function(a,i,m){return $.rightofscreen(a,{threshold:0});},"in-viewport":function(a,i,m){return $.inviewport(a,{threshold:0});}});})(jQuery);

$(window).scroll(function () {
	hb_animated_contents();
});
$(window).load(function () {
	hb_animated_contents();
});

function hb_animated_contents() {
	$(".hb-animate-element:in-viewport").each(function (i) {
		var $this = $(this);
		if (!$this.hasClass('hb-in-viewport')) {
			setTimeout(function () {
				$this.addClass('hb-in-viewport');
			}, 30 * i);
		}
	});
}

function dropDown()
{
	elementClick = '#header .current';
	elementSlide =  '.toogle_content';
	activeClass = 'active';

	$(elementClick).on('click', function(e){
		e.stopPropagation();
		var subUl = $(this).next(elementSlide);
		if(subUl.is(':hidden'))
		{
			subUl.slideDown();
			$(this).addClass(activeClass);
		}
		else
		{
			subUl.slideUp();
			$(this).removeClass(activeClass);
		}
		$(elementClick).not(this).next(elementSlide).slideUp();
		$(elementClick).not(this).removeClass(activeClass);
		e.preventDefault();
	});

	$(elementSlide).on('click', function(e){
		e.stopPropagation();
	});

	$(document).on('click', function(e){
		e.stopPropagation();
		var elementHide = $(elementClick).next(elementSlide);
		$(elementHide).slideUp();
		$(elementClick).removeClass('active');
	});
}

(function($) {
    function menuAutoAlign(){
        if($('.megamenu').length) {
            var menuContainer = $('#header .container'),
                menuContainerPosition = menuContainer.offset(),
                menuContainerWidth = menuContainer.width(),
                menuContainerPadding = parseFloat(menuContainer.css('padding-left')),
                menuContainerLeftEdge = menuContainerPosition.left + menuContainerPadding,
                menuContainerRightEdge = menuContainerLeftEdge + menuContainerWidth;
            if ($(document).width() <= 991) {
                $('.megamenu li.mega > .sub-menu').each(function(index, element) {
                    $(this).removeAttr("style");
                });
            } else if($(document).width() >= 992) {
                if ($("html").attr('dir')=="rtl") {
                    $('.megamenu li.mega > .sub-menu').each(function(index, element) {
                        $(this).removeAttr("style");
                        if ($(this).outerWidth(false) >= menuContainerWidth) {
                            $(this).css('width', Math.round(menuContainerWidth) + 'px');
                        }
                        var tdmenu = $('.megamenu').offset();
                        var menuItem = $(this).parent();
                        var offset_right = ((menuItem.offset().left + menuItem.outerWidth(false)));

                        var i = ($(this).outerWidth(false) - (offset_right - menuContainerLeftEdge));
                        if (i > 0) {
                            $(this).css('right', '-' + (i) + 'px');
                        }
                    });
                } else {
                    $('.megamenu li.mega > .sub-menu').each(function(index, element) {
                        $(this).removeAttr("style");
                        if ($(this).outerWidth(false) >= menuContainerWidth) {
                            $(this).css('width', Math.round(menuContainerWidth) + 'px');
                        }
                        var tdmenu = $('.megamenu').offset();
                        var menuItem = $(this).parent();

                        var i = (menuItem.offset().left + $(this).outerWidth(false)) - (menuContainerLeftEdge + menuContainerWidth);
                        if (i > 0) {
                            $(this).css('left', '-' + (i) + 'px');
                        }
                    });
                }
            }
        }
    }

    $(window).resize(function() {
        menuAutoAlign();
        setTimeout(function() { menuAutoAlign(); }, 800);
        setTimeout(function() { menuAutoAlign(); }, 1600);
    });
    if (window.addEventListener) {
        window.addEventListener("orientationchange", menuAutoAlign, false);
    }
    $(document).ready(function() {
        menuAutoAlign();
        setTimeout(function() { menuAutoAlign(); }, 800);
        setTimeout(function() { menuAutoAlign(); }, 1600);

        $(document).on('click', '.megamenu .td-horizontal-menu.mobile-navigation li.has-child .toggle-submenu', function(){
            if ($(this).parent().siblings('.active').length) {
                var old_open = $(this).parent().siblings('.active');
                old_open.children('ul').stop().slideUp(200);
                old_open.children('.toggle-submenu').children('.fa').removeClass('fa-angle-up').addClass('fa-angle-down');
                old_open.removeClass('active');
            }
            if ($(this).parent().hasClass('active')) {
                $(this).parent().removeClass('active').children('ul').stop().slideUp(200);
                $(this).parent().children('.toggle-submenu').children('.fa').removeClass('fa-angle-up').addClass('fa-angle-down');
            } else {
                $(this).parent().addClass('active').children('ul').stop().slideDown(200);
                $(this).parent().children('.toggle-submenu').children('.fa').removeClass('fa-angle-down').addClass('fa-angle-up');
            }
        });
    });
})(jQuery);

function tdimglazyload() {
    jQuery('img.lazy').Lazy({
        scrollDirection: 'vertical',
        visibleOnly: true,
        onError: function(element) {
            console.log('error loading ' + element.data('src'));
        },
        afterLoad: function(element) {
            element.addClass('loaded');
            element.attr({'data-lazyloading': 1});
        },
    });
}
