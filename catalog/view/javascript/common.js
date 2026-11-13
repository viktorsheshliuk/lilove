var uni_touch_support;
	
if ('ontouchstart' in document.documentElement) uni_touch_support = true;

$(function() {
	if(uni_touch_support) $('body').addClass('touch-support');
});

function getURLVar(key) {
	var value = [];

	var query = String(document.location).split('?');

	if (query[1]) {
		var part = query[1].split('&');

		for (i = 0; i < part.length; i++) {
			var data = part[i].split('=');

			if (data[0] && data[1]) {
				value[data[0]] = data[1];
			}
		}

		if (value[key]) {
			return value[key];
		} else {
			return '';
		}
	}
}

$(document).ready(function() {
	// Highlight any found errors
	$('.text-danger').each(function() {
		var element = $(this).parent().parent();

		if (element.hasClass('form-group')) {
			element.addClass('has-error');
		}
	});

	// Currency
	$('#form-currency .currency-select').on('click', function(e) {
		e.preventDefault();

		$('#form-currency input[name=\'code\']').val($(this).attr('name'));

		$('#form-currency').submit();
	});

	// Language
	$('#form-language .language-select').on('click', function(e) {
		e.preventDefault();

		$('#form-language input[name=\'code\']').val($(this).attr('name'));

		$('#form-language').submit();
	});

	/* Search */
	//$('#search input[name=\'search\']').parent().find('button').on('click', function() {
	$('#search button').on('click', function() {
		var url = $('base').attr('href') + 'index.php?route=product/search';

		var value = $('header #search input[name=\'search\']').val();

		if (value) {
			url += '&search=' + encodeURIComponent(value);
		}

		location = url;
	});
	$('#header_search').on('click', function() {
	 	$('#search_background').addClass('active');
	 	$('#search').addClass('active');
	 	$('.header_right_box').hide();
	 	$('body').addClass('search_open');
	 	$('header #search input[name=\'search\']').focus();

	 });

	$('#search input[name=\'search\']').on('keydown', function(e) {
		if (e.keyCode == 13) {
			$('header #search input[name=\'search\']').parent().find('button').trigger('click');
		}
	});
	$("body").bind("keydown", function(e){
		if ($('#search').hasClass('active')){
			if (e.keyCode == 27) {  //клавиша Esc
 				close_search();
			}
		}
	});

	$('.header__menu-close').click(function() {
      close_mobile_menu(); 
  	});

  	$('#close_search_arrow').click(function(){
  		close_search_mobile();
  	});

  	$('.header__burger').click(function(event){
	    $('.header__menu-mobile').addClass('active');
	    $('#menu_background').addClass('active');
	    $('body').addClass('menu_is-open');
	  });

  	$('#header_mobile_search_icon').click(function(event){
	    $('.header__search-mobile').addClass('active');
	    $('#menu_background').addClass('active');
	    $('body').addClass('menu_is-open');
	    $('#mobile_search').focus();
	  });

	$(document).mouseup( function(e){ // событие клика по веб-документу
		var div = $( "#search" ); // тут указываем ID элемента
		var menu_mobile = $( ".header__menu-mobile" );
		var search_mobile = $( ".header__search-mobile" );
		if ( !div.is(e.target) // если клик был не по нашему блоку
		    && div.has(e.target).length === 0 ) { // и не по его дочерним элементам
			close_search(); // скрываем его
		}
		if ( !menu_mobile.is(e.target) // если клик был не по нашему блоку
		    && menu_mobile.has(e.target).length === 0 ) { // и не по его дочерним элементам
			if($('.header__menu-mobile').hasClass('active')){
				close_mobile_menu();
			} // скрываем меню
		}
		if ( !search_mobile.is(e.target) // если клик был не по нашему блоку
		    && search_mobile.has(e.target).length === 0 ) { // и не по его дочерним элементам
			if (  $('.header__search-mobile').hasClass('active')) {// скрываем меню
				close_search_mobile();
			} 
		}

	});
	function close_search(){
		$('#search_background').removeClass('active');
		$('#search').removeClass('active');
		$('.header_right_box').show();
		$('body').removeClass('search_open');
	}
	$('#search .search_close').on('click', function() {
		close_search();
	});
	function close_mobile_menu(){
	  $('.header__menu-mobile').removeClass('active');
      $('#menu_background').removeClass('active');
      $('body').removeClass('menu_is-open');
	}
	function close_search_mobile(){
	  $('.header__search-mobile').removeClass('active');
      $('#menu_background').removeClass('active');
      $('body').removeClass('menu_is-open');
	}

	// Menu
	$('#menu .dropdown-menu').each(function() {
		var menu = $('#menu').offset();
		var dropdown = $(this).parent().offset();

		var i = (dropdown.left + $(this).outerWidth()) - (menu.left + $('#menu').outerWidth());

		if (i > 0) {
			$(this).css('margin-left', '-' + (i + 10) + 'px');
		}
	});

	// Product List
	$('#list-view').click(function() {
		$('#content .product-grid > .clearfix').remove();

		$('#content .row > .product-grid').attr('class', 'product-layout product-list col-xs-12');
		$('#grid-view').removeClass('active');
		$('#list-view').addClass('active');

		localStorage.setItem('display', 'list');
	});

	// Product Grid
	$('#grid-view').click(function() {
		// What a shame bootstrap does not take into account dynamically loaded columns
		var cols = $('#column-right, #column-left').length;

		if (cols == 2) {
			$('#content .product-list').attr('class', 'product-layout product-grid col-lg-6 col-md-6 col-sm-12 col-xs-6');
		} else if (cols == 1) {
			$('#content .product-list').attr('class', 'product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-6');
		} else {
			$('#content .product-list').attr('class', 'product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-6');
		}

		$('#list-view').removeClass('active');
		$('#grid-view').addClass('active');

		localStorage.setItem('display', 'grid');
	});

	if (localStorage.getItem('display') == 'list') {
		$('#list-view').trigger('click');
		$('#list-view').addClass('active');
	} else {
		$('#grid-view').trigger('click');
		$('#grid-view').addClass('active');
	}

	// Checkout
	$(document).on('keydown', '#collapse-checkout-option input[name=\'email\'], #collapse-checkout-option input[name=\'password\']', function(e) {
		if (e.keyCode == 13) {
			$('#collapse-checkout-option #button-login').trigger('click');
		}
	});

	// tooltips on hover
	$('[data-toggle=\'tooltip\']').tooltip({container: 'body'});

	// Makes tooltips work on ajax generated content
	$(document).ajaxStop(function() {
		$('[data-toggle=\'tooltip\']').tooltip({container: 'body'});
	});

	uniChangeBtn();

	$('#product-product .product__count-plus').click(function(){
		$('#product-product #input-quantity').val(parseInt($('#product-product #input-quantity').val())+1);
	});
	$('#product-product .product__count-minus').click(function(){
		let num = parseInt($('#product-product #input-quantity').val())-1;
		if (num == 0 ){ num = 1;}
		$('#product-product #input-quantity').val(num);
	});
	$('#checkout-cart .product__count-plus').click(function(e){
		e.preventDefault();
		let e_input = $(this).parent().find('input');
		e_input.val(parseInt(e_input.val())+1).change();  
	});
	$('#checkout-cart .product__count-minus').click(function(e){
		e.preventDefault();
		let e_input = $(this).parent().find('input');
		if (parseInt(e_input.val()) > 1) {
			e_input.val(parseInt(e_input.val())-1).change();  
		}
	});
	$('#product-metal .dropdown-menu span').click(function(e){   //выбор опции метала
		e.preventDefault;
		$('#product-metal .dropdown_title').html($(this).html());
		let value = $(this).attr('data-value');
		$('.product__select-metal option[value='+value+']').prop('selected', true).trigger("change");
	});

	$('.modern_select').each(function() {
	    const _this = $(this),
	        selectOption = _this.find('option'),
	        selectOptionLength = selectOption.length,
	        selectedOption = selectOption.filter(':selected'),
	        duration = 0; // длительность анимации 

	    _this.hide();
	    _this.wrap('<div class="modern_select"></div>');
	    $('<div>', {
	        class: 'new-select',
	        text: _this.children('option:selected').text()
	    }).insertAfter(_this);

	    const selectHead = _this.next('.new-select');
	    $('<div>', {
	        class: 'new-select__list'
	    }).insertAfter(selectHead);

	    const selectList = selectHead.next('.new-select__list');
	    for (let i = 1; i < selectOptionLength; i++) {
	        $('<div>', {
	            class: 'new-select__item',
	            html: $('<span>', {
	                text: selectOption.eq(i).text()
	            })
	        })
	        .attr('data-value', selectOption.eq(i).val())
	        .appendTo(selectList);
	    }

	    const selectItem = selectList.find('.new-select__item');
	    selectList.fadeOut(0);
	    selectHead.on('click', function() {
	        if ( !$(this).hasClass('on') ) {
	            $(this).addClass('on');
	            selectList.fadeIn(duration);

	            selectItem.on('click', function() {
	            	
	                let chooseItem = $(this).data('value');

	                $(_this).val(chooseItem).attr('selected', 'selected').trigger('change');
	                selectHead.text( $(this).find('span').text() );

	                selectList.fadeOut(duration);
	                selectHead.removeClass('on');
	            });

	        } else {
	            $(this).removeClass('on');
	            selectList.fadeOut(duration);
	        }
	    });
	});

	function uniChangeBtn() {
		
		// const compare = () => {
		// 	let products = $('.top-menu__compare').data('products');
			
		// 	if(!products) return;
			
		// 	products = String(products).split(',').map(Number);
			
		// 	$('.product-thumb__compare, .product-page__compare-btn').each(function() {
		// 		const pid = Number($(this).attr('onclick').replace(/\D+/g,''));
				
		// 		if(products.indexOf(pid) !== -1) {	
		// 			$(this).attr('onclick', $(this).attr('onclick').replace('compare.add', 'compare.remove')).attr('data-original-title', uniJsVars.compare_btn.text_remove).addClass('active');
		// 		}
		// 	});
		// }
		
		const wishlist = () => {
			let products = $('.top-menu__wishlist').data('products');
			
			if(!products) return;
			
			products = String(products).split(',').map(Number);
			
			$('.product-thumb__wishlist, .product-page__wishlist-btn').each(function() {
				const pid = Number($(this).attr('onclick').replace(/\D+/g,''));
				
				if(products.indexOf(pid) !== -1) {
					$(this).attr('onclick', $(this).attr('onclick').replace('wishlist.add', 'wishlist.remove')).attr('data-original-title', uniJsVars.wishlist_btn.text_remove).addClass('active');
				}
			});
		}
		
		//compare();
		wishlist();
		
		$(document).ajaxStop(() => {
			//compare();
			wishlist();
		});
	}

	$('.product-thumb__compare, .product-page__compare-btn, .product-thumb__wishlist, .product-page__wishlist-btn').click(function(){
		$(this).tooltip('hide');
	});

	$(' .option_metal_select').click(function(){
			$(this).parent().each(function(){
				$(this).children('span').removeClass('selected');
			});
			$(this).addClass('selected');
			let value = $(this).attr('data-value');
			let product_id = $(this).attr('data-product_id');
			//let sel = '.category__select-metal[data-product_id = ' + product_id + '] option[value='+value+']'; console.log(sel);
			$('.category__select-metal[data-product_id = ' + product_id + '] option[value='+value+']').prop('selected', true).trigger("change");
	});


	$(' .select_old select').change(function(){
		let product_id = $(this).attr('data-product_id');
		$(' .options-category.product'+ product_id +' .option__name').html($(this).find('option:selected').text());
	});

	$(document).on("change keydown", ".ui-number__input", function (e) {
         var t = $(this).val();
         ("keydown" == e.type && 13 != e.keyCode) || t < 0 || ((e = $(this).attr("name")), cart.update2(e, t));
    });

	var acc = document.getElementsByClassName("accordion");
	var i;

	for (i = 0; i < acc.length; i++) {
	  acc[i].addEventListener("click", function() {

	    this.classList.toggle("active");

	    var panel = this.nextElementSibling;
	    if (panel.style.display === "block") {
	      panel.style.display = "none";
	    } else {
	      panel.style.display = "block";
	    }
	  });
	}


$('#button-cart').on('click', function() {
	$.ajax({
		url: 'index.php?route=checkout/cart/add',
		type: 'post',
		data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
		dataType: 'json',
		beforeSend: function() {
			$('#button-cart').button('loading');
		},
		complete: function() {
			$('#button-cart').button('reset');
		},
		success: function(json) {
			$('.alert-dismissible, .text-danger').remove();
			$('.form-group').removeClass('has-error');

			if (json['error']) {
				if (json['error']['option']) {
					for (i in json['error']['option']) {
						var element = $('#input-option' + i.replace('_', '-'));

						if (element.parent().hasClass('input-group')) {
							element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
						} else {
							element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
						}
					}
				}

				if (json['error']['recurring']) {
					$('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
				}

				// Highlight any found errors
				$('.text-danger').parent().addClass('has-error');
			}

			if (json['success']) {
				$('.breadcrumb').after('<div class="alert alert-success alert-dismissible">' + json['success'] + '<button type="button" class="close" data-dismiss="alert">&times;</button></div>');

				$('#cart > button').html('<img src="image/catalog/header-cart.svg" alt="Cart" title="Cart"><span id="cart-total"> ' + json['total'] + '</span>');

				$('html, body').animate({ scrollTop: 0 }, 'slow');

				$('#cart > ul').load('index.php?route=common/cart/info ul li');
			}
		},
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
	});
});

$(document).on("click", ".category-top-menu li.category-dropdown-menu .toggle-category", function () {
    if ($(this).parent().siblings(".active").length) {
      var t = $(this).parent().siblings(".active");
      t.children("ul").stop().slideUp(200), t.children(".toggle-category").children(".fa").removeClass("fa-angle-up").addClass("fa-angle-down"), t.removeClass("active")
    }
    $(this).parent().hasClass("active") ? ($(this).parent().removeClass("active").children("ul").stop().slideUp(200), $(this).parent().children(".toggle-category").children(".fa").removeClass("fa-angle-up").addClass("fa-angle-down")) : ($(this).parent().addClass("active").children("ul").stop().slideDown(200), $(this).parent().children(".toggle-category").children(".fa").removeClass("fa-angle-down").addClass("fa-angle-up"))
  });

	$('.js-readmore').readmore({
                speed: 1300,
                collapsedHeight: 166,
                heightMargin: 0,
                moreLink: '<div class="showmore-box"><a href="#" class="showmore-link"><img src="/image/icons/icon-plus-black.png"><span>' + $('.js-readmore').attr('data-more') + '</span></a></div>',
                lessLink: '<div class="showmore-box"><a href="#" class="showless-link"><img src="/image/icons/icon-minus-black.png"><span>' + $('.js-readmore').attr('data-less') + '</span></a></div>',
                embedCSS: false,
                blockCSS: 'display: block; width: 100%;',
                startOpen: false,
                beforeToggle: function() {},
                afterToggle: function() {},
                blockProcessed: function() {}
    });



	

}); //end $(document).ready

// Cart add remove functions
var cart = {
	'add': function(product_id, quantity) {
		$.ajax({
			url: 'index.php?route=checkout/cart/add',
			type: 'post',
			data: 'product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				$('.alert-dismissible, .text-danger').remove();

				if (json['redirect']) {
					location = json['redirect'];
				}

				if (json['success']) {
					$('#content').parent().before('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

					// Need to set timeout otherwise it wont update the total
					setTimeout(function () {
						$('#cart > button').html('<img src="image/catalog/header-cart.png" alt="Cart" title="Cart"><span id="cart-total"> ' + json['total'] + '</span>');
					}, 100);

					$('html, body').animate({ scrollTop: 0 }, 'slow');

					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	},
	'update': function(key, quantity) {
		$.ajax({
			url: 'index.php?route=checkout/cart/edit',
			type: 'post',
			data: 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					$('#cart > button').html('<img src="image/catalog/header-cart.png" alt="Cart" title="Cart"><span id="cart-total"> ' + json['total'] + '</span>');
				}, 100);

				if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
					location = 'index.php?route=checkout/cart';
				} else {
					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	},
	'update2': function(e, t) {
		$.ajax({
			url: 'index.php?route=checkout/cart/cart_edit',
			type: 'post',
			//data: 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			 data: e + "=" + (void 0 !== t ? t : 1),
			dataType: 'json',
			beforeSend: function() {
				//$('#cart > button').button('loading');
			},
			complete: function() {
				//$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					$('#cart > button').html('<img src="image/catalog/header-cart.svg" alt="Cart" title="Cart"><span id="cart-total"> ' + json['total'] + '</span>');
				}, 100);

				if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
					location = 'index.php?route=checkout/cart';
				} else {
					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	},
	'remove': function(key) {
		$.ajax({
			url: 'index.php?route=checkout/cart/remove',
			type: 'post',
			data: 'key=' + key,
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					$('#cart > button').html('<img src="image/catalog/header-cart.png" alt="Cart" title="Cart"><span id="cart-total"> ' + json['total'] + '</span>');
				}, 100);

				if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
					location = 'index.php?route=checkout/cart';
				} else {
					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
}

var voucher = {
	'add': function() {

	},
	'remove': function(key) {
		$.ajax({
			url: 'index.php?route=checkout/cart/remove',
			type: 'post',
			data: 'key=' + key,
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					$('#cart > button').html('<span id="cart-total"><i class="fa fa-shopping-cart"></i> ' + json['total'] + '</span>');
				}, 100);

				if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
					location = 'index.php?route=checkout/cart';
				} else {
					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
}

var wishlist = {
	'add': function(product_id) {
		$.ajax({
			url: 'index.php?route=account/wishlist/add',
			type: 'post',
			data: 'product_id=' + product_id,
			dataType: 'json',
			success: function(json) {
				$('.alert-dismissible').remove();

				if (json['redirect']) {
					location = json['redirect'];
				}

				if (json['success']) {
					$('#content').parent().before('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
				}

				$('#wishlist-total span').html(json['total']);
				$('#wishlist-total span').removeClass('no-items');
				$('#wishlist-total').attr('title', json['total']);

				$('html, body').animate({ scrollTop: 0 }, 'slow');

				
				wishlist.uniWishlistUpd();
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	},
	'remove': function(product_id) {
		$.ajax({
			url: 'index.php?route=account/wishlist/wishlistRemove',
			type: 'post',
			data: 'product_id='+product_id,
			dataType: 'json',
			success: function(json) {
				if (json['success']) {
					
					$('#wishlist-total span').html(json['total']);
					
					wishlist.uniWishlistUpd();
					
					$('.product-thumb__wishlist, .product-page__wishlist-btn').each(function() {
						let pid = Number($(this).attr('onclick').replace(/\D+/g,''));
			
						if(product_id == pid) {
							$(this).attr('onclick', $(this).attr('onclick').replace('wishlist.remove', 'wishlist.add')).attr('data-original-title', uniJsVars.wishlist_btn.text).removeClass('active');
						}
					});
				}
			}
		});
	},
	'uniWishlistUpd': function(){
		
		$.get('index.php?route=account/wishlist', (data) => {
			$('.top-menu__wishlist').data('products', $(data).find('.top-menu__wishlist').data('products'));
		});
	}
}

var compare = {
	'add': function(product_id) {
		$.ajax({
			url: 'index.php?route=product/compare/add',
			type: 'post',
			data: 'product_id=' + product_id,
			dataType: 'json',
			success: function(json) {
				$('.alert-dismissible').remove();

				if (json['success']) {
					$('#content').parent().before('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');

					$('#compare-total').html(json['total']);

					$('html, body').animate({ scrollTop: 0 }, 'slow');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	},
	'remove': function() {

	}
}

/* Agree to Terms */
$(document).delegate('.agree', 'click', function(e) {
	e.preventDefault();

	$('#modal-agree').remove();

	var element = this;

	$.ajax({
		url: $(element).attr('href'),
		type: 'get',
		dataType: 'html',
		success: function(data) {
			html  = '<div id="modal-agree" class="modal">';
			html += '  <div class="modal-dialog">';
			html += '    <div class="modal-content">';
			html += '      <div class="modal-header">';
			html += '        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
			html += '        <h4 class="modal-title">' + $(element).text() + '</h4>';
			html += '      </div>';
			html += '      <div class="modal-body">' + data + '</div>';
			html += '    </div>';
			html += '  </div>';
			html += '</div>';

			$('body').append(html);

			$('#modal-agree').modal('show');
		}
	});
});

// Autocomplete */
(function($) {
	$.fn.autocomplete = function(option) {
		return this.each(function() {
			this.timer = null;
			this.items = new Array();

			$.extend(this, option);

			$(this).attr('autocomplete', 'off');

			// Focus
			$(this).on('focus', function() {
				this.request();
			});

			// Blur
			$(this).on('blur', function() {
				setTimeout(function(object) {
					object.hide();
				}, 200, this);
			});

			// Keydown
			$(this).on('keydown', function(event) {
				switch(event.keyCode) {
					case 27: // escape
						this.hide();
						break;
					default:
						this.request();
						break;
				}
			});

			// Click
			this.click = function(event) {
				event.preventDefault();

				value = $(event.target).parent().attr('data-value');

				if (value && this.items[value]) {
					this.select(this.items[value]);
				}
			}

			// Show
			this.show = function() {
				var pos = $(this).position();

				$(this).siblings('ul.dropdown-menu').css({
					top: pos.top + $(this).outerHeight(),
					left: pos.left
				});

				$(this).siblings('ul.dropdown-menu').show();
			}

			// Hide
			this.hide = function() {
				$(this).siblings('ul.dropdown-menu').hide();
			}

			// Request
			this.request = function() {
				clearTimeout(this.timer);

				this.timer = setTimeout(function(object) {
					object.source($(object).val(), $.proxy(object.response, object));
				}, 200, this);
			}

			// Response
			this.response = function(json) {
				html = '';

				if (json.length) {
					for (i = 0; i < json.length; i++) {
						this.items[json[i]['value']] = json[i];
					}

					for (i = 0; i < json.length; i++) {
						if (!json[i]['category']) {
							html += '<li data-value="' + json[i]['value'] + '"><a href="#">' + json[i]['label'] + '</a></li>';
						}
					}

					// Get all the ones with a categories
					var category = new Array();

					for (i = 0; i < json.length; i++) {
						if (json[i]['category']) {
							if (!category[json[i]['category']]) {
								category[json[i]['category']] = new Array();
								category[json[i]['category']]['name'] = json[i]['category'];
								category[json[i]['category']]['item'] = new Array();
							}

							category[json[i]['category']]['item'].push(json[i]);
						}
					}

					for (i in category) {
						html += '<li class="dropdown-header">' + category[i]['name'] + '</li>';

						for (j = 0; j < category[i]['item'].length; j++) {
							html += '<li data-value="' + category[i]['item'][j]['value'] + '"><a href="#">&nbsp;&nbsp;&nbsp;' + category[i]['item'][j]['label'] + '</a></li>';
						}
					}
				}

				if (html) {
					this.show();
				} else {
					this.hide();
				}

				$(this).siblings('ul.dropdown-menu').html(html);
			}

			$(this).after('<ul class="dropdown-menu"></ul>');
			$(this).siblings('ul.dropdown-menu').delegate('a', 'click', $.proxy(this.click, this));

		});
	}
})(window.jQuery);
(function($){
	var Modules = {
		init:function(options, el) {
            var base = this;
			
			base.$elem = $(el);
			base.$elem2 = $(el).children();
			base.options = $.extend({}, $.fn.uniModules.options, options);
			
			base.load();
        },
		load:function() {
			var base = this;
			
			base.wrapper = (base.$elem2.closest('.tab-content').length) ? base.$elem2.closest('.tab-content') : base.$elem;
			
			if((base.options.type == 'grid' && module_on_mobile == 'carousel' && base.wrapper.width()+20 < 768) || base.wrapper.closest('#column-left, #column-right').length) {
				base.options.type = 'carousel';
			}
			
			if(base.wrapper.closest('#column-left, #column-right').length) {
				base.options.items = {0: {items: 1}};
			}
			
			if (base.options.type == 'grid') {
				base.$elem2.children().wrap('<div class="uni-module__item" style="width:'+base.items()+'"></div>');
			} else {
				base.$elem2.addClass('owl-carousel').owlCarousel({
					responsive:base.options.items,
					responsiveBaseElement:base.wrapper,
					dots:base.options.dots,
					mouseDrag:true,
					loop:base.options.loop,
					autoplay:base.options.autoplay,
					nav:true,
					margin:10,
					navText:['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
				});
				
				if(base.$elem2.width() == 0) {
					const item = base.$elem2.find('.owl-item'), item_width = base.items();
					
					item.css({width: item_width});
					base.$elem2.find('.owl-stage').css({width:item.length * item_width});
				}
			}
			
			base.update();
			base.reload();
			base.responsive();
		},
		items:function() {
			var base = this, match = -1, width = base.wrapper.width();
			
			width += (base.wrapper.attr('class') == 'tab-content' && width < 520) ? 10 : 20;
			
			$.each(base.options.items, (breakpoint) => {
				if (breakpoint <= width && breakpoint > match) {
					match = Number(breakpoint);
				}
			});
			
			const items = base.options.items[match]['items']
			
			return (base.options.type == 'carousel') ? width/items : 100/items+'%';
		},
		update:function() {
			var base = this, div_arr = base.options.autoheight;
			
			if($(window).width() < 575 && $('.'+div_arr[0]).closest('.product-thumb').length) {
				div_arr = [];
			}
			
			if(div_arr.length) {
				for (i in div_arr) {
					var maxheight = 0, $elem = base.$elem2.find('.'+div_arr[i]);
				
					if($elem.css('display') !== 'none' || uni_touch_support) {
						$elem.css('height', '');

						$.each($elem, function() {
							if($(this).height() > maxheight) {
								maxheight = $(this).height();
							}
						});
				
						if(maxheight > 0) $elem.height(maxheight);
					}
				}
			}
			
			base.$elem2.addClass('load-complete');
		},
		responsive:function() {
            var base = this, lastWindowWidth = $(window).width();
			
			base.resizer = () => {
                if ($(window).width() != lastWindowWidth || uni_touch_support) {
					if (base.options.type == 'grid') {	
						base.$elem2.children().css('width', base.items());
					}
					
					base.update();
                }
            };
			
			$(window).resize(base.resizer);
        },
		reload:function() {
			var base = this, div = base.$elem.parent(), modal = div.hasClass('modal-body') ? true : false, tab = div.hasClass('tab-pane') ? div.attr('id') : false;
			
			if(modal) {
				setTimeout(() => {
					base.update();
				}, 750);
			}
			
			if(tab) {
				div.parent().prev().find('li a').on('shown.bs.tab', function(e) {
					if($(this).attr('href') == '#'+tab) {
						base.update();
					}
				});
			}
		}
	};
	
	$.fn.uniModules = function(options) {		
		return this.each(function() {
            if ($(this).data('uni-modules-init') === true) {
                return false;
            }
			
            $(this).data('uni-modules-init', true);
			
            var module = Object.create(Modules);
            module.init(options, this);
        });
	};
	
	if(typeof(items_on_mobile) == 'undefined') items_on_mobile = 2;
	
	$.fn.uniModules.options = {
		type 	   :'carousel',
		//items	   :{0:{items:items_on_mobile},700:{items:3},1050:{items:4},1400:{items:5}},
		items	   :{0:{items:items_on_mobile},700:{items:3},952:{items:4},1400:{items:4}},
		autoheight :[],
		dots	   :true,
		loop	   :false,
		autoplay   :false
	};

	var Timer = {
		init:function(options, el) {
            var base = this;
			
			base.options = $.extend({}, $.fn.uniTimer.options, options);
			base.days = 24*60*60, base.hours = 60*60, base.minutes = 60;
			
			var date_arr = base.options.date.split('-'),
				year = parseFloat(date_arr[0]), 
				month = parseFloat(date_arr[1])-1, 
				day = parseFloat(date_arr[2]);
			
			base.$date = (new Date(year, month, day)).getTime();
			base.$elem = $(el);
			
			if(base.$date > (new Date()).getTime())	{
				base.load();
			}
        },
		load:function() {
			var base = this, i = 4;
			
			html = '<div class="uni-timer">';
			
			for(i in base.options.texts){
				html += '<div class="uni-timer__group g-'+i+'">';
				html += '<div class="uni-timer__digit"></div>';
				
				if(!base.options.hideText) html += '<div class="uni-timer__text">'+base.options.texts[i]+'</div>';
				
				html += '</div>';
			}
			
			html += '</div>';
			
			base.$elem.append(html);
			base.digits = base.$elem.find('.uni-timer__digit');
			base.count();
		},
		count:function() {
			var base = this, left, d, h, m, s;
			
			left = Math.floor((base.$date - (new Date()).getTime())/1000);
			
			left = left > 0 ? left : 0;
			
			d = Math.floor(left / base.days);
			left -= d*base.days;
			h = Math.floor(left / base.hours);
			left -= h*base.hours;
			m = Math.floor(left / base.minutes);
			left -= m*base.minutes;
			s = left;
			
			base.switchDigit(base.digits.eq(0), d);
			base.switchDigit(base.digits.eq(1), h);
			base.switchDigit(base.digits.eq(2), m);
			base.switchDigit(base.digits.eq(3), s);
			
			if (d == 0) base.hideGroup(0);
			if (h == 0) base.hideGroup(1);
			
			setTimeout(() => { 
				base.count();
			}, 1000);
		},
		switchDigit:function(position, number) {
			if(position.data('digit') != number){
				position.data('digit', number).text(number);
			}
		},
		hideGroup:function(num) {
			var base = this;
			
			if(base.options.hideIsNull) {
				base.$elem.find('.uni-timer__group.g-'+num).hide();
			}
		}
	}
	
	$.fn.uniTimer = function(options) {		
		return this.each(function() {
            if ($(this).data("uni-timer-init") === true) {
                return false;
            }
			
            $(this).data("uni-timer-init", true);
			
            var timer = Object.create(Timer);
            timer.init(options, this);
        });
	};
	
	$.fn.uniTimer.options = {
		date		:'0000-00-00',
		texts		:['Дней','Часов','Минут','Секунд'],
		hideText	:false,
		hideIsNull	:false
	};
})(jQuery);
