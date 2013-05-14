$(function() {
	$( "#datepicker" ).datepicker({
		showOn: "button",
		buttonImage: "/img/pickerBtn.png",
		buttonImageOnly: true,
		beforeShow: true
	});
	$( "#datepicker" ).datepicker( "option", "dateFormat", 'D, M dd, yy' );
	
});