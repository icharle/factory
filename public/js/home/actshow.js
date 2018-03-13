// 轮播小点样式
	var w = $('#stage').css('width');
	var h = parseInt(w) * 9 / 16 - 30;
	var pl = parseInt(w) * 0.4;
	var showlen = $(show).length;

	for( var i = 0; i < showlen; i++) {
		$('#singledots').append('<li class="dot"></li>');
	}
	$('#singledots').css('width',parseInt(showlen * 15) + (parseInt(showlen) + 1) * 8).css('margin-top',h).css('padding-left',pl);

// 加载默认数据
var index = parseInt(0);
	$('#single').css('background-image','url(' + show[index].img + ')');
	$(".actname").text(show[index].name);
	$(".actauthor").text(show[index].author);
	$(".acttime").text(show[index].time);
	$(".illstration").text(show[index].text);

	$('#stage').mouseout(function() {
		autoplay(showlen,1,0,1,$('.actshow'),$('#singledots'),6,$(show),2500);
	}).mouseover(function() {
		stopplay($('.actshow'));
	});