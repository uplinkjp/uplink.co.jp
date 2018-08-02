	<link rel="stylesheet" href="/evolution/ex/css/default.css" />
	<link rel="stylesheet" href="/evolution/ex/css/layout.css?date=20171224" />
	<link rel="stylesheet" href="/evolution/ex/css/layout-320.css?date=20171224" media="screen and (max-width:480px)" />
	<link rel="stylesheet" href="/evolution/ex/css/animate.css" />
	<link rel="stylesheet" href="/evolution/ex/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/evolution/ex/css/flexslider.css" type="text/css" />

	<script src="http://jsoon.digitiminimi.com/js/widgetoon.js"></script>
	<script src="/evolution/ex/js/jquery-1.11.1.min.js"></script>
	<script src="/evolution/ex/js/jquery.infinitescroll.min.js"></script>
	<script src="/evolution/ex/js/wow.min.js"></script>
	<script src="/evolution/ex/js/jquery.common.js"></script>

	<script>
	new WOW().init();
	
	$(function() {
		var agent = navigator.userAgent;
		var contentWidth = 1024; //コンテンツ幅
		var breakPoint = 641; //ブレイクポイント
	 
		if((agent.search(/iPhone/) != -1)||(agent.search(/iPad/) != -1)||(agent.search(/Android/) != -1)){
			var windowWidth = $(window).width();    
			if((windowWidth <= contentWidth)&&(windowWidth >=breakPoint)){        
				zoom = (windowWidth / contentWidth)*100;
				$('body').css('zoom',zoom+'%');
			}
		}
	});
	</script>


	<meta name="Keywords" content="UPLINK, アップリンク" />
	<meta property="og:type" content="article" />
	<meta property="og:locale" content="ja_JP" />
	<meta property="fb:app_id" content="241640882531831" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@evolution_movie" />


