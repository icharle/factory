$(document).ready( function(){
// 加载默认数据	
	var acrecordshow = $('#acrecordshow');
	var alen = $(activityrecord).length;
	showusual(alen,$(acrecordshow),activityrecord);

	var worecordshow = $('#worecordshow');
	var wlen = $(workrecord).length;
	showusual(wlen,$(worecordshow),workrecord);

	function showusual(len,item,data) {
		for( var i = 0; i < len; i++) {
			item.append('<div class="repart" part="' + i + ' ">');

			var da = $(data[i])[0];
			var itemkid = item.children();

			$(itemkid[i]).append(
				'<div class="name">' + da.name + 
				'</div> <div class="illustation">' + da.illustation + 
				'</div> <div class="mediashow" part="' + i +
				'"> <span class="prearrow" id="mspre"></span> <div class="imgshow" page="1" lastni="0">' + 
				'<div class="smallimg smallleft"></div> <div class="bigimg"></div>' +
				'<div class="smallimg smallright"></div> </div> <span class="nexarrow" id="msnex"></span> </div>'
			);

			$(itemkid[i]).find(".smallleft").css('background-image','url(' + da.imgs[0].img + ')');
			$(itemkid[i]).find(".bigimg").css('background-image','url(' + da.imgs[1].img + ')');
			$(itemkid[i]).find(".smallright").css('background-image','url(' + da.imgs[2].img + ')');
			
		}
	}


// 轮播
	var nexarrow = $('.nexarrow');
	var prearrow = $('.prearrow');
	var num = 3;
	var ni = 1;

	$(prearrow).click(function() {
		var imgshow = $(this).parent().find(".imgshow");
		var part = $(this).parent().attr('part');
		var data = $(activityrecord[parseInt(part)]);
		data = data[0].imgs;
		var len = $(data).length;
		lunbo(len,num,ni,-1,$(imgshow),false,1,data);
	});

	$(nexarrow).click(function() {
		var imgshow = $(this).parent().find(".imgshow");
		var part = $(this).parent().attr('part');
		var data = $(activityrecord[parseInt(part)]);
		data = data[0].imgs;
		var len = $(data).length;
		lunbo(len,num,ni,1,$(imgshow),false,1,data);
	});


// 时光轴样式
	timeline($(acrecordshow),activityrecord,$('.activity'));
	timeline($(worecordshow),workrecord,$('.work'));
	function timeline(scollitem,data,linefather) {
		for( var j = 0; j < alen; j++) {
			linefather.find('#line').append('<span class="linedot" dot="' + j + '">' + data[j].time + '</span>');
		}
		var kid = scollitem.children();
		var linedot = linefather.find('#line').children();
		for( var i = 0; i < $(kid).length; i++) {
			var _top = $(kid[i]).offset().top;
			$(linedot[i]).offset({top:_top + 10,left:170});
		}
		scollitem.scroll(function() {
			for( var i = 0; i < $(kid).length; i++) {
				var _top = $(kid[i]).offset().top;
				$(linedot[i]).offset({top:_top + 10,left:170});
			}
		});
		
	}



});