$(function(){
	$('#slides').slides({
		play: 5000,
		crossfade: true,
		generateNextPrev: true,
		pagination: true,
		fadeSpeed: 999,
		slideSpeed: 1500,
		currentClass: 'current',
		effect: 'slide'
	});
	$('#slides_two').slides({
		//generateNextPrev: true,
		fadeSpeed: 999,
		slideSpeed: 800,
		crossfade: true,
		play: 0
	});

});

