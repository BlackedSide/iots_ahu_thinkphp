function resize_window(){
	$("#left").height($(window).height()-82);
	$("#right").height($(window).height()-82).width($(window).width()-282);
}
$(function(){
	resize_window();
	$(window).resize(function(){
		resize_window();
	})
})