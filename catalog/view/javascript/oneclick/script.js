function oc_update_price() {
    if($('.oc input[name="quantity"]').val() > 0){
        oc_update();
    } else {
        $('.oc input[name="quantity"]').val('1');
    }
}
function oc_popup(product_id) {
    $.magnificPopupNew.open({
        tLoading: '<img src="catalog/view/javascript/oneclick/loading.gif" alt="Loading..." />',
        items: {
            src: 'index.php?route=extension/module/oneclick&prod_id='+product_id,
            type: 'ajax'
        },
        callbacks: {
            ajaxContentAdded: function() {
                $('.oc input[name="quantity"]').on('change', function(){
                    if($(this).val() > 0){
                        oc_update();
                    }
                });

                checkedOptions_array = [];
                let checkedOptions =   $('#product div[id^="input-option"] input:checked');
                checkedOptions.each(function(index, element){
                    checkedOptions_array.push(element.value)
                    
                });

                $('table[id^="oc-option-"]').each(function(index, element) {
                    
                      $(element).find('input').each(function (index1, element1) { 
                          if ( checkedOptions_array[index] ==   element1.value){
                             $(element1).prop("checked", true);
                          }
                     });
                 });

                $('.mfpnew-close svg').on('click',function() {
                    $.magnificPopupNew.close();
                });
            },
          }
    });
}
function oc_submit(){
    $.ajax({
        async: true,
        cache: false,
        url: 'index.php?route=extension/module/oneclick/confirm',
        type: 'post',
        data: $('.oc-body input[type=\'hidden\'], .oc-body input[type=\'text\'], .oc-body input[type=\'radio\']:checked, .oc-body input[type=\'checkbox\']:checked, .oc-body select, .oc-body textarea, .oc-footer input[type=\'checkbox\']:checked'),
        dataType: 'json',
        beforeSend: function() {
            $('#oc_submit').text(oc_params['order_button_text_loading']);
        },
        success: function(json) {
            $('.oc-form-group').removeClass('has-error');
            $('.oc-error').remove();
            if(json['error']){
                if(json['error']['firstname']){
                    oc_error('firstname', json['error']['firstname']);
                }
                if(json['error']['lastname']){
                    oc_error('lastname', json['error']['lastname']);
                }
                if(json['error']['telephone']){
                    oc_error('telephone', json['error']['telephone']);
                }
                if(json['error']['email']){
                    oc_error('email', json['error']['email']);
                }
                if(json['error']['address_1']){
                    oc_error('address_1', json['error']['address_1']);
                }
                if(json['error']['comment']){
                    oc_error('comment', json['error']['comment']);
                }
                if(json['error']['agree']){
                    $('.oc-footer p label').after('<br /><span class="oc-error">'+json['error']['agree']+'</span>');
                }
                if (json['error']['option']) {
                    for (i in json['error']['option']) {
                        var element = $('#oc-option-' + i.replace('_', '-'));

                        if (element.parent().hasClass('input-group')) {
                            element.parent().after('<div class="oc-error">' + json['error']['option'][i] + '</div>');
                        } else {
                            element.after('<div class="oc-error">' + json['error']['option'][i] + '</div>');
                        }
                    }
                }
            }
            if(json['success']){
                $('.oc .oneclick_wrapper').css('padding','30px 40px');
                $('.oc .oc-head').css('padding','0 25px');
                $('.oc-head').html(json['success']);
                $('.oc-body').html('<svg class="success" width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.5 37L32.5684 47.5002C32.785 47.7511 33.1779 47.7309 33.3607 47.4544C34.8669 45.177 40.7723 36.257 45 30M70 36C70 54.7777 54.7777 70 36 70C17.2223 70 2 54.7777 2 36C2 17.2223 17.2223 2 36 2C54.7777 2 70 17.2223 70 36Z" stroke="#29A645" stroke-width="3" stroke-linecap="round"/></svg>');

                $('#oc_submit').replaceWith('<button class="hidden btn btn-danger pull-right" onclick="$.magnificPopupNew.close(); return true;">'+oc_params['close_button_text']+'</button>');
                $('.oc-footer').html(json['text_wait_callback']);
				if (typeof remarketingQuickOrder == 'function') {
					remarketingQuickOrder(json);
				}
                //document.location = '/index.php?route=checkout/success';
                
            }else{
                $('#oc_submit').text(oc_params['order_button_text']);
            }
        }
    });
}
function oc_error(field, error){
    $('.oc-' + field).addClass('has-error');
    $('.oc-' + field + ' input,.oc-' + field + ' textarea').after('<span class="oc-error"><svg width="16" height="16" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.5 14.5C11.0899 14.5 14 11.5899 14 8C14 4.41015 11.0899 1.5 7.5 1.5C3.91015 1.5 1 4.41015 1 8C1 11.5899 3.91015 14.5 7.5 14.5Z" stroke="#EA4335" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.5 4.5V7.5" stroke="#EA4335" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M7.5 11C7.77614 11 8 10.7761 8 10.5C8 10.2239 7.77614 10 7.5 10C7.22386 10 7 10.2239 7 10.5C7 10.7761 7.22386 11 7.5 11Z" fill="#EA4335" stroke="#EA4335" stroke-linecap="round" stroke-linejoin="round"/></svg>'+error+'</span>');
}
function oc_update(){
    $.ajax({
        async: true,
        cache: false,
        url: 'index.php?route=extension/module/oneclick/update',
        type: 'post',
        data: $('.oc-body input[type=\'hidden\'], .oc-body input[type=\'text\'], .oc-body input[type=\'radio\']:checked, .oc-body input[type=\'checkbox\']:checked, .oc-body select, .oc-body textarea'),
        dataType: 'json',
        success: function(json) {
            if(json['total']){
                $('.oc-total span').text(json['total']);
            }
            if(json['special'] && json['price']){
                $('.oc-price span').remove();
                $('.oc-price').prepend('<span class="oc-special">' + json['price'] + '</span> <span>' + json['special'] + '</span>');
            }else if(json['price']){
                $('.oc-price span').remove();
                $('.oc-price').prepend('<span>' + json['price'] + '</span>');
            }
        }
    });
}
function oc_descr(){
    if($('.oc-show-descr').hasClass('oc-hide')){
        $('.oc-description').slideUp('fast', function(){
            $('.oc-show-descr').text(oc_params['descr_show_text']).removeClass('oc-hide');
        });
    }else{
        $('.oc-description').slideDown('fast', function(){
            $('.oc-show-descr').text(oc_params['descr_hide_text']).addClass('oc-hide');
        });
    }
}
function oc_set_main_image(src, obj){
    $('.oc-main-image img').attr('src', src);
    $('.oc-thumbs img').removeClass('active');
    obj.addClass('active');
}
function updateocButtons(oc_params){
    if(typeof(oc_params) != 'undefined'){
        if(oc_params['show_in_cat']){                    
            $.each(oc_params['list_btns'], function(key, btn_params){
                if(typeof($(btn_params['list_product_block'])) !== 'undefined'){
                    if(btn_params['list_position'] == 1){
                        $.each($(btn_params['list_product_block']+" [onclick^='"+oc_params['list_selector']+"']"), function() {
                          var product_id = $(this).attr('onclick').match(/[0-9]+/);
                          $(this).closest(btn_params['list_product_block']).find(btn_params['list_element']).before('<div class="'+btn_params['list_btn_block_class']+'"><button class="'+btn_params['list_btn_class']+'">'+oc_params['button_text']+'</button></div>').prev().attr('onclick', 'oc_popup(\'' + product_id + '\');');
                        });
                    }else if(btn_params['list_position'] == 2){
                        $.each($(btn_params['list_product_block']+" [onclick^='"+oc_params['list_selector']+"']"), function() {
                          var product_id = $(this).attr('onclick').match(/[0-9]+/);
                          if(!$(this).closest(btn_params['list_product_block']).find(btn_params['list_element'] + ' + ' + btn_params['list_btn_block_class']).length){
                                $(this).closest(btn_params['list_product_block']).find(btn_params['list_element']).after('<div class="'+btn_params['list_btn_block_class']+'"><button class="'+btn_params['list_btn_class']+'">'+oc_params['button_text']+'</button></div>').next().attr('onclick', 'oc_popup(\'' + product_id + '\');');
                          }
                        });
                    }
                }
            });
        }
        if(oc_params['show_in_prod']){
            if(typeof($('input[name=\'product_id\']')) !== 'undefined'){
                if(oc_params['product_position'] == 1){
                    $(oc_params['product_element']).before('<div class="'+oc_params['product_btn_block_class']+'"><button class="'+oc_params['product_btn_class']+'">'+oc_params['button_text']+'</button></div>').prev().attr('onclick', 'oc_popup(\'' + $('input[name=\'product_id\']').val() + '\');');
                } else if(oc_params['product_position'] == 2){
                    $(oc_params['product_element']).after('<div class="'+oc_params['product_btn_block_class']+'"><button class="'+oc_params['product_btn_class']+'">'+oc_params['button_text']+'</button></div>').next().attr('onclick', 'oc_popup(\'' + $('input[name=\'product_id\']').val() + '\');');
                }
            }
        }
    }
    console.log('oc update');
}
$(function() {
    updateocButtons(oc_params);
});

(function(b,f,i){function l(){b(this).find(c).each(j)}function m(a){for(var a=a.attributes,b={},c=/^jQuery\d+/,e=0;e<a.length;e++)if(a[e].specified&&!c.test(a[e].name))b[a[e].name]=a[e].value;return b}function j(){var a=b(this),d;a.is(":password")||(a.data("password")?(d=a.next().show().focus(),b("label[for="+a.attr("id")+"]").attr("for",d.attr("id")),a.remove()):a.realVal()==a.attr("placeholder")&&(a.val(""),a.removeClass("placeholder")))}function k(){var a=b(this),d,c;placeholder=a.attr("placeholder");
b.trim(a.val()).length>0||(a.is(":password")?(c=a.attr("id")+"-clone",d=b("<input/>").attr(b.extend(m(this),{type:"text",value:placeholder,"data-password":1,id:c})).addClass("placeholder"),a.before(d).hide(),b("label[for="+a.attr("id")+"]").attr("for",c)):(a.val(placeholder),a.addClass("placeholder")))}var g="placeholder"in f.createElement("input"),h="placeholder"in f.createElement("textarea"),c=":input[placeholder]";b.placeholder={input:g,textarea:h};!i&&g&&h?b.fn.placeholder=function(){}:(!i&&g&&
!h&&(c="textarea[placeholder]"),b.fn.realVal=b.fn.val,b.fn.val=function(){var a=b(this),d;if(arguments.length>0)return a.realVal.apply(this,arguments);d=a.realVal();a=a.attr("placeholder");return d==a?"":d},b.fn.placeholder=function(){this.filter(c).each(k);return this},b(function(a){var b=a(f);b.on("submit","form",l);b.on("focus",c,j);b.on("blur",c,k);a(c).placeholder()}))})(jQuery,document,window.debug);