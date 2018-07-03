// .corner
jQuery(function(){
	$('.corner').corner("5px");
});

// always remove outlines
jQuery("a").each(function(){
	this.onmouseup = this.blur();
});

// JavaScript Document
jQuery(function(){
	// hide #back-top first
	$("#backtotop").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#backtotop').fadeIn();
			} else {
				$('#backtotop').fadeOut();
			}
		});
	});
});

// google +1
window.___gcfg = {lang: 'ja'};
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
po.src = 'https://apis.google.com/js/plusone.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();


// #calendar dt.day
// (function() {
// 	$(function() {
// 		$('#calendar dt.day').each(function() {
// 			$(this).next().find('dl dt').each(function() {
// 				$(this).compareHeight();
// 			});
// 			$(this).compareHeight({'trimHeight':-11});
// 		});
// 	});
// 	
// 	$.fn.compareHeight = function(config) {
// 		var defaults={
// 			trimHeight:0
// 		}
// 		var opt=$.extend(defaults, config);
// 		
// 		var hdt = $(this).height();
// 		var hdd = $(this).next().height();
// 		if (hdt > hdd) $(this).next().css('minHeight', hdt);
// 		if (hdt < hdd) $(this).css('minHeight', hdd + opt.trimHeight);
// 		return $(this);
// 	};
// })(jQuery);

//#single-schedule
$(function(){
    /* 要素を2つずつの組に分ける */
    var sets = [], temp = [];
    $('#calendar dt.day, #calendar dd').each(function(i) {
        temp.push(this);
        if (i % 2 == 1) {
            sets.push(temp);
            temp = [];
        }
    });
    if (temp.length) sets.push(temp);

    /* 各組ごとに高さ揃え */
    $.each(sets, function() {
        $(this).flatHeights();
    });
});

//#single-schedule
$(function(){
    /* 要素を2つずつの組に分ける */
    var sets = [], temp = [];
    $('#single-schedule dt.day, #single-schedule dd.day').each(function(i) {
        temp.push(this);
        if (i % 2 == 1) {
            sets.push(temp);
            temp = [];
        }
    });
    if (temp.length) sets.push(temp);

    /* 各組ごとに高さ揃え */
    $.each(sets, function() {
        $(this).flatHeights();
    });
});


//google カスタム検索 スケジュール
(function() {
var cx = '011475598064287174110:tkrdki_mq-m';
var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
	'//www.google.com/cse/cse.js?cx=' + cx;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
})();


//widgetoon.js Twitterカウント
widgetoon_main();