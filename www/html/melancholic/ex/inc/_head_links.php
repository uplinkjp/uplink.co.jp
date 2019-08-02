	<link rel="stylesheet" href="/melancholic/ex/css/default.css?<?php echo date("YmdHis");?>" />
	<link rel="stylesheet" href="/melancholic/ex/css/layout.css?<?php echo date("YmdHis");?>" />
	<link rel="stylesheet" href="/melancholic/ex/css/layout-320.css?<?php echo date("YmdHis");?>" media="screen and (max-width:480px)" />
	<link rel="stylesheet" href="/melancholic/ex/css/font-awesome.min.css?<?php echo date("YmdHis");?>" />
    <link rel="stylesheet" href="/melancholic/ex/css/animate.css" />
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP|Noto+Serif+JP&display=swap" rel="stylesheet">
	<script src="//jsoon.digitiminimi.com/js/widgetoon.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="/melancholic/ex/js/jquery.common.js?<?php echo date("YmdHis");?>"></script>
    <script src="/melancholic/ex/js/wow.min.js?<?php echo date("YmdHis");?>"></script>
    <script src="/melancholic/ex/js/scrollsmoothly.js?<?php echo date("YmdHis");?>" type="text/javascript"></script>

	<script>
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
	new WOW().init();
	</script>


	<meta name="Keywords" content="UPLINK, アップリンク" />
	<meta property="og:type" content="article" />
	<meta property="og:locale" content="ja_JP" />
	<meta property="fb:app_id" content="241640882531831" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@melancholic1331" />


