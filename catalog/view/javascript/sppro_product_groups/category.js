$(document).ready(function() {
    $('body').on('click', '.product-layout .product-groups-product[data-product]', function() {
        current_product = $(this).parents('.product-layout');
        load_product_id = $(this).attr('data-product');
        list_type = $('.btn-group.btn-group-sm .active').attr('id');
        $.get('/index.php?route=extension/module/sppro_product_groups/getProductForList&product=' + load_product_id + '&list_type=' + list_type, function(html) {
            current_product.replaceWith(html);
        });
        return false;
    });
});