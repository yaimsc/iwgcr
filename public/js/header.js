$(window).scroll(function() {
  var scroll = $(window).scrollTop();
	$("#img-salto").css({
		transform: 'translate3d(0%, -'+(scroll/100)+'%, 0) scale('+(100 + scroll/8)/100+')',
		//"-webkit-filter": "blur(" + (scroll/200) + "px)",
		//filter: "blur(" + (scroll/200) + "px)"
	});
});