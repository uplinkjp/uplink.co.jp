jQuery(function(){
window.onload = function(){
$(function() {
$("#loading").fadeOut();
$("#appears-block").fadeIn();
});
}

jQuery.event.add(window,"load",function(){
setTimeout(function(){
$("#loading").stop().animate({opacity:'0'},100);
$("#appears-block").stop().animate({opacity:'1'},100);
},100);
});
});


$(window).load(function() {

	var $win = $(window),
	$header = $('#menu'),
	headerHeight = $header.outerHeight(),
	startPos = 0;

	$win.on('load scroll', function() {
	var value = $(this).scrollTop();
	if ( value > startPos && value > headerHeight ) {
		$header.css('top', '-' + headerHeight + 'px');
	} else {
		$header.css('top', '0');
	}
		startPos = value;
	});

});



var windowWidth = $(window).width();
var windowS = 640;
if (windowWidth <= windowS) {
$(window).load(function() {
var hmainsp = $('.img-main-sp').height();
$('.title').css("min-height", hmainsp + "px");
});$(window).resize(function() {
var hmainsp = $('.img-main-sp').height();
$('.title').css("min-height", hmainsp + "px");
});
} else {
$(window).load(function() {
var hmainpc = $('.img-main-pc').height();
$('.title').css("min-height", hmainpc + "px");
});$(window).resize(function() {
var hmainpc = $('.img-main-pc').height();
$('.title').css("min-height", hmainpc + "px");
});
}


var windowWidth = $(window).width();
var windowS = 640;
if (windowWidth <= windowS) {

} else {
$(window).load(function() {
var hstorypc = $('.img-story-pc').height();
$('#story').css("min-height", hstorypc + "px");
$('#body #index-about #story .txt .txt-in').css("min-height", hstorypc + "px");	
	
});$(window).resize(function() {
var hstorypc = $('.img-story-pc').height();
$('#story').css("min-height", hstorypc + "px");
$('#body #index-about #story .txt .txt-in').css("min-height", hstorypc + "px");
});
}



jQuery.event.add(window,"load",function(){
	$(".img-main-pc").css({opacity:'0'});
	setTimeout(function(){
		$(".img-main-pc").css({display:'block'});
		$(".img-main-pc").stop().animate({opacity:'1'},500);
	},300);
});


jQuery.event.add(window,"load",function(){
	$(".txt-main").css({opacity:'0'});
	setTimeout(function(){
		$(".txt-main").css({display:'block'});
		$(".txt-main").stop().animate({opacity:'1'},1000);
	},800);
});


jQuery.event.add(window,"load",function(){
	$(".catch-main").css({opacity:'0'});
	setTimeout(function(){
		$(".catch-main").css({display:'block'});
		$(".catch-main").stop().animate({opacity:'1'},1500);
	},1200);
});

jQuery.event.add(window,"load",function(){
	$(".release").css({opacity:'0'});
	setTimeout(function(){
		$(".release").css({display:'block'});
		$(".release").stop().animate({opacity:'1'},1000);
	},1400);
});

jQuery.event.add(window,"load",function(){
	$("#index-about").css({opacity:'0'});
	setTimeout(function(){
		$("#index-about").css({display:'block'});
		$("#index-about").stop().animate({opacity:'1'},1000);
	},1400);
});

jQuery.event.add(window,"load",function(){
	$("#index-main").css({opacity:'0'});
	setTimeout(function(){
		$("#index-main").css({display:'block'});
		$("#index-main").stop().animate({opacity:'1'},300);
	},300);
});






jQuery(function(){
	$("#backtotop").hide();
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

$(window).load(function(){
    $('html,body').animate({ scrollTop: 0 }, '1');
});
