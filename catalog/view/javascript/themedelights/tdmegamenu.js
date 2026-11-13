(function($) {
    function mmAutoAlign(){
        if($('.tdmegamenu').length) {
            var mmContainer = $('#header .container'),
                mmContainerPosition = mmContainer.offset(),
                mmContainerWidth = mmContainer.width(),
                mmContainerPadding = parseFloat(mmContainer.css('padding-left')),
                mmContainerLeftEdge = mmContainerPosition.left + mmContainerPadding,
                mmContainerRightEdge = mmContainerLeftEdge + mmContainerWidth;
            if ($(document).width() <= 991) {
                $('.tdmegamenu li.mega > .sub-menu').each(function(index, element) {
                    $(this).removeAttr("style");
                });
            } else if($(document).width() >= 992) {
                if ($("html").attr('dir')=="rtl") {
                    $('.tdmegamenu li.mega > .sub-menu').each(function(index, element) {
                        $(this).removeAttr("style");
                        if ($(this).data('width')) {
                            $(this).css('width', $(this).data('width') + 'px');
                        } else {
                            $(this).css('width', mmContainerWidth);
                        }
                        if ($(this).outerWidth(false) >= mmContainerWidth) {
                            $(this).css('width', Math.round(mmContainerWidth) + 'px');
                        }
                        var tdmenu = $('.tdmegamenu').offset();
                        var menuItem = $(this).parent();
                        var offset_right = ((menuItem.offset().left + menuItem.outerWidth(false)));

                        var i = ($(this).outerWidth(false) - (offset_right - mmContainerLeftEdge));
                        if (i > 0) {
                            $(this).css('right', '-' + (i) + 'px');
                        }
                    });
                } else {
                    $('.tdmegamenu li.mega > .sub-menu').each(function(index, element) {
                        $(this).removeAttr("style");
                        if ($(this).data('width')) {
                            $(this).css('width', $(this).data('width') + 'px');
                        } else {
                            $(this).css('width', mmContainerWidth);
                        }
                        if ($(this).outerWidth(false) >= mmContainerWidth) {
                            $(this).css('width', Math.round(mmContainerWidth) + 'px');
                        }
                        var tdmenu = $('.tdmegamenu').offset();
                        var menuItem = $(this).parent();

                        var i = (menuItem.offset().left + $(this).outerWidth(false)) - (mmContainerLeftEdge + mmContainerWidth);
                        if (i > 0) {
                            $(this).css('left', '-' + (i) + 'px');
                        }
                    });
                }
            }
        }
    }

    $(window).resize(function() {
        mmAutoAlign();
        setTimeout(function() { mmAutoAlign(); }, 800);
        setTimeout(function() { mmAutoAlign(); }, 1600);
    });
    if (window.addEventListener) {
        window.addEventListener("orientationchange", mmAutoAlign, false);
    }

    $(document).ready(function() {
        mmAutoAlign();
        setTimeout(function() { mmAutoAlign(); }, 800);
        setTimeout(function() { mmAutoAlign(); }, 1600);

        $(document).on('click', '.tdmegamenu .td-horizontal-menu.mobile-navigation li.has-child .toggle-submenu', function(){
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