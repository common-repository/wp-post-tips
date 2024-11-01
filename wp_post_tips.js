jQuery(document).ready(function($) {
	$('.widget_links li').hover(function() {
		var bubble = '<div class="bubble1">' + $('a', this).attr("title") + '</div>';
		if($("div", this).length == 0 && !$('a', this).attr("title") == 0) {
		//if($("li + div").length == 0 && !$('a', this).attr("title") == 0) {
			$(this).append(bubble);
		}
		//console.log($("div, this + div >.bubble"));
		
		//console.log($("li + div"));
		$("div", this).stop().animate({ marginLeft: 110, opacity: 1 }, 'fast');
		//$("li + div").stop().animate({ marginLeft: 110, opacity: 1 }, 'fast');
	},function() {
		$("div", this).animate({ marginLeft: 100, opacity: 0 }, 'fast');
		//$("li + div").animate({ marginLeft: 100, opacity: 0 }, 'fast');
	});
});