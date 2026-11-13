$(document).ready(function() {
    $('body').on('click', function(e){ 
        if($('.product-group-select.open').length){
            product_group_select_click = $(e.target).parents('.product-group-select');
            if(product_group_select_click.length){
                $('.product-group-select.open').each(function(){
                    if($(this)[0] != product_group_select_click[0]){
                        $(this).removeClass('open');
                    }
                });
            } else {
                $('.product-group-select.open').removeClass('open');
            }
        }
    });

    $('body').on('click', '.product-group-select .product-group-select-current', function(){
        $(this).parent().toggleClass('open');
    });

    let oldPushState = history.pushState;
    history.pushState = function pushState() {
        let ret = oldPushState.apply(this, arguments);
        window.dispatchEvent(new Event('pushstate'));
        window.dispatchEvent(new Event('locationchange'));
        return ret;
    };

    window.addEventListener('popstate', () => {
        window.dispatchEvent(new Event('locationchange'));
    });
});