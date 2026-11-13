//<![CDATA[
$(window).load(function () {
	tdquickview.initQuickViewContainer();
});

$(document).ready(function () {
	$('.btn-quickview').click(function(){
		$(this).addClass('loading');
	});
});

var tdquickview = {
	'initQuickViewContainer' : function () {
		var modelQuickview = '';
		modelQuickview += '<div id="quickview-modal" class="modal fade quickview" tabindex="-1" role="dialog" aria-hidden="true">'
			modelQuickview += '<div class="modal-dialog" role="document">'
				modelQuickview += '<div class="modal-content">'
					modelQuickview += '<div class="modal-header">'
						modelQuickview += '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'
							modelQuickview += '<span aria-hidden="true"><i class="fa fa-close"></i></span>'
						modelQuickview += '</button>'
					modelQuickview += '</div>'
					modelQuickview += '<div class="modal-body">'
					modelQuickview += '</div>'
				modelQuickview += '</div>'
			modelQuickview += '</div>'
		modelQuickview += '</div>'
		$('body').append(modelQuickview);
	},
	'ajaxView'	: function (url) {
		if(url.search('route=product/product') != -1) {
			url = url.replace('route=product/product', 'route=product/tdquickview');
		} else {
			url = 'index.php?route=product/tdquickview/seoview&ourl=' + url;
		}
		$.ajax({
			url 		: url,
			type		: 'get',
			success		: function(json) {
				$('#quickview-modal .modal-body').html(json['html']);
				$('#quickview-modal').modal('show');
				$('.btn-quickview').removeClass('loading');
			}
		});
	}
};
//]]>