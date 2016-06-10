jQuery(function($) {
	aniscroll = new WOW({
		boxClass: 'aniscroll',
		mobile: false
	});

	aniscroll.init();
	
	$("#landing-page-parallax").parallax("50%",0.55);

	$("#btn_register").on("click", function(e) {
		e.stopPropagation();
		$("#register_form").find('[data-toggle=dropdown]').dropdown('toggle');
	});
});
