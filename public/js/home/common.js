$(document).ready(function() {
	$('#sdother').find('nav').append('<a href="#" class="">>&nbsp&nbsp三大中心</a> <a href="#" id="apart_a">>&nbsp&nbsp技术研发中心</a>');
	$('#fmother').find('nav').append('<a href="#" class="">>&nbsp&nbsp组织风貌</a>');
	$('#spother').find('nav').append('<a href="#" class="">>&nbsp&nbsp组织视频</a>');

// 样式修改
	var stage = $('#stage');
	var skip = $('.skip');
	var w = $(stage).css('width');
	var h = parseInt(w) * 9 / 16;
	var sh = 0.5 * h - 10;

	$(stage).css('height',h);
	$(skip).css('height',sh * 2/3);
	$(skip).css('padding-top',sh *1/3);


// aside固定
	var ot = $(".skip-1").offset().top;

	$(window).scroll(function() {
		var st = $(window).scrollTop();
		var width = parseInt($("article").css('width')) * 0.32;
		var fot = parseInt($("footer").offset().top);
		var fh = (-1) * parseInt($("footer").css('height'));
		var left = parseInt($("section").css('width')) + parseInt($("article").offset().left);

		if( parseInt(st) >= parseInt(ot) && ( parseInt(st) <= ( fot - 700) ) ) {
			$("aside").fadeIn(600,function() {
				$("aside").css('position','fixed').css('width',width).css('height',700).css('top',0).css('left',left).css('padding-top',0);
			});
		}else if( parseInt(st) > ( fot - 700 ) ) {
			$("aside").fadeOut(600);
		}else{
			$("aside").fadeIn(600,function() {
				$("aside").css('position','static');
				$('.little').css('padding-top',60);
			});
		}
	});

// 展示遮罩层
	var showcontainer = $('#bigshowcontainer');
	$(showcontainer).css('height',$(document).height());
	$(showcontainer).hide();

	var w = parseInt( $(showcontainer).css('width') ) * 0.8;
	var h = parseInt(w) * 9 / 16;

	function bigshow(con) {

		con.css('height',h);

		$(window).resize(function() {
			var w = parseInt( $(showcontainer).css('width') ) * 0.8;
			var h = parseInt(w) * 9 / 16;
			con.css('height',h);
		});

		$(showcontainer).append(con);
		$(showcontainer).show(600);
	}

	$(showcontainer).click(function() {
		$(showcontainer).hide(400);
		$(showcontainer).children().remove();
	});

	var simplecon = $('#simple').find('.content');
	$(simplecon).click(function() {
		bigshow($(this).clone().addClass("showcontent").css('margin-top',$(window).scrollTop()));
	});

	var single = $('#single');
	$(single).click(function() {
		bigshow($(this).clone().addClass("showcontent").css('opacity',1).css('margin-top',$(window).scrollTop()));
	});

	var img = $('.imgshow').find("div");
	$(img).click(function() {
		bigshow($(this).clone().addClass("showcontent").css('margin-top',$(window).scrollTop()));
	});

});
