$(function() {
	$( "#datepicker" ).datepicker({
		showOn: "button",
		buttonImage: "/img/pickerBtn.png",
		buttonImageOnly: true
		
	});
	$( "#datepicker" ).datepicker( "option", "dateFormat", 'D dd, yy' );
});