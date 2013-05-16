$(function() {
	$( "#datepicker" ).datepicker({
		showOn: "button",
		buttonImage: "/img/pickerBtn.png",
		buttonImageOnly: true,
		minDate: new Date()
		
	});
	$( "#datepicker" ).datepicker( "option", "dateFormat", 'D, M dd, yy' );
	
});