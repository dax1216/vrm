$(document).ready(function(){
	$('#improved .headArc').click(function(e){
		e.preventDefault();
		$(this).closest('li').find('.contentAc').not(':animated').slideToggle();
	});
});