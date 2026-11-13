current_width = jQuery(window).width();
min_width = 992;
mobile = current_width < min_width;

function swapChildren(obj1, obj2)
{
	var temp = obj2.children().detach();
	obj2.empty().append(obj1.children().detach());
	obj1.append(temp);
}

function toggleMobileStyles()
{
	if (mobile) {
		jQuery("*[id^='_desktop_']").each(function(idx, el) {
			var target = jQuery('#' + el.id.replace('_desktop_', '_mobile_'));
			if (target.length) {
				swapChildren(jQuery(el), target);
			}
		});
	} else {
		jQuery("*[id^='_mobile_']").each(function(idx, el) {
			var target = jQuery('#' + el.id.replace('_mobile_', '_desktop_'));
			if (target.length) {
				swapChildren(jQuery(el), target);
			}
		});
	}
}

jQuery(window).on('resize', function() {
	var _cw = current_width;
	var _mw = min_width;
	var _w = jQuery(window).width();
	var _toggle = (_cw >= _mw && _w < _mw) || (_cw < _mw && _w >= _mw);
	current_width = _w;
	mobile = current_width < min_width;
	if (_toggle) {
		toggleMobileStyles();
	}
});

jQuery(document).ready(function() {
	if (mobile) {
		toggleMobileStyles();
	}
});
