$(function() {
	$(window).on('changed.zf.mediaquery', breakpoint_changed).trigger('changed.zf.mediaquery', Foundation.MediaQuery.current);

	function breakpoint_changed(event, newSize, oldSize) {
		var $breadcrumbs = $('.breadcrumbs').find('.crumb');
		$breadcrumbs.removeClass('truncated');

		if(newSize == 'small') {
			$breadcrumbs.each(function(i, el) {
				if(i > 0 && i < $breadcrumbs.length - 1) {
					$(el).addClass('truncated');
				}
			});
		}
	}
});
