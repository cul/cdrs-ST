jQuery(document).ready(function($) {
	function updateColumnHeights() {
		var height = Math.max($('.home-first-post').height(),
							$('.home-periscope').height());
		$('.home-first-post').height(height);
		$('.home-periscope').height(height);
	}
	$(window).on('resize', function(){  updateColumnHeights(); });
	$(document).ready(function(){ updateColumnHeights(); });
})