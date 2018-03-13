// $(document).ready(function() {

// 加载数据
	var API_URL = "data-sdzx.json";
	$.ajax({
		url: API_URL,
		async: false,
		success: function(res) {
			js = res.js;
			yc = res.yc;
			cm = res.cm;
		},
		dataType: "json"
	});

	var size;
	$('.apartment').click(function() {
		$('#simple').attr('page',1);

		var apart = $(this).attr('id');
		var showaccount;
		$('#turnapart').attr('apartment',apart);

		if( apart == "cm" ) {
			$('#apart_a').text('>  文化传媒中心');
			showaccount = 2;
			size = 280;
		} else if( apart == "yc" ) {
			$('#apart_a').text('>  运营策划中心');
			showaccount = 2;
			size = 280;
		} else {
			$('#apart_a').text('>  技术研发中心');
			showaccount = 4;
			size = 135;
		}
		
		var nowdata = getnowdata();

		var show =           nowdata.show;
		var	classifyname =   nowdata.classifyname;
		var	classify =       nowdata.classify;
		var	activityrecord = nowdata.activityrecord;
		var	workrecord =　   nowdata.workrecord;

		// classify 改变分类数据
		var category = $('#category');
		var categorylen = $(classifyname).length;
		var clen = $(classify[0]).length;
		var cend = parseInt(showaccount * 3);

		$('.kinds').remove();
		for( var i = 0; i < categorylen; i++) {
			$(category).append('<p class="kinds" classify=" ' + i + '">' + classifyname[i] + '</p>');
		}

		var simplekid = $('#simple').children();
		for( var i = 0; i < $(simplekid).length; i++) {
			$(simplekid[i]).remove();
		}

		if( cend < clen) {
			clen = cend;
		}

		addsimpleitem(0,clen,cend,classify[0],size);

		$('.kinds').click(function() {
			turnkinds($(this),classify);
		});
		turnclassify(classify[0],showaccount,size);
		$('#more').show();

		// actshow
		$('#single').css('background-image','url(' + show[0].img + ')');
		$(".actname").text(show[0].name);
		$(".actauthor").text(show[0].author);
		$(".acttime").text(show[0].time);
		$(".illstration").text(show[0].text);

		// record
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
		
		var acrecordshow = $('#acrecordshow');
		var alen = $(activityrecord).length;
		showusual(alen,$(acrecordshow),activityrecord);

		var worecordshow = $('#worecordshow');
		var wlen = $(workrecord).length;
		showusual(wlen,$(worecordshow),workrecord);

	});

	function getnowdata() {
		var apart = $('#turnapart').attr('apartment');
		if( apart == "cm") {
			da = cm;
		}else if( apart == "yc") {
			da = yc;
		}else {
			da = js;
		}
		return da;
	}
	
	var nowdata = getnowdata();

	var show =           nowdata.show;
	var	classifyname =   nowdata.classifyname;
	var	classify =       nowdata.classify;
	var	activityrecord = nowdata.activityrecord;
	var	workrecord =　   nowdata.workrecord;

	

// });