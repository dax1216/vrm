$(document).ready(function(){
	$('#improved .headArc h5').click(function(e){
		e.preventDefault();
		$(this).closest('li').find('.contentAc').not(':animated').slideToggle();
	});
});