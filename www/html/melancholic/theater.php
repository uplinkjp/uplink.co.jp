<?php require("./ex/inc/_head_meta.php");?>
	<title>劇場情報 - 映画『メランコリック』公式サイト</title>
	<meta name="twitter:title" content="劇場情報 - 映画『メランコリック』公式サイト">

<?php require("./ex/inc/_head_links.php");?>
  <meta name="Description" content="2019年8月3日（土）より全国順次公開　バイトを始めた銭湯は、深夜に風呂場で人を殺していたー。日々を憂鬱と感じるすべての人に送る、巻き込まれ型サスペンス・コメディ。" />
    <meta property="og:image" content="http://www.uplink.co.jp/melancholic/ex/img/ogp.jpg" />
    <meta property="twitter:image" content="http://www.uplink.co.jp/melancholic/ex/img/ogp.jpg" />
    <meta name="twitter:description" content="2019年8月3日（土）より全国順次公開　バイトを始めた銭湯は、深夜に風呂場で人を殺していたー。日々を憂鬱と感じるすべての人に送る、巻き込まれ型サスペンス・コメディ。" />
	
	

	
	<script src="/allgovernmentslie/ex/js/jquery.flatheights.js"></script>
	<script>
		$(window).load(function() {
			//PC環境の場合
			if (window.matchMedia( '(min-width: 484px)' ).matches) {
				/* 要素を2つずつの組に分ける */
				var sets = [], temp = [];
				$('.ken , .theaters').each(function(i) {
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
			//モバイル環境の場合
			} else {
				//なし
			};
		});

		$(window).load(function() {
			//PC環境の場合
			if (window.matchMedia( '(min-width: 484px)' ).matches) {
				/* ターゲットリンク */
				var headerheight = 130; //ヘッダの高さ
				$('a[href^=#]').click(function(){
					var href= $(this).attr("href");
					var target = $(href == "#" || href == "" ? 'html' : href);
					var position = target.offset().top-headerheight; //ヘッダの高さ分位置をズラす
					$("html, body").animate({scrollTop:position}, 500, "swing");
					return false;
				});
			//モバイル環境の場合
			} else {
				//なし
			};
		});
		

	</script>

</head>
<body class="second fade theater">
<a name="pagetop" id="pagetop"></a>	
<?php require("./ex/inc/_head_analytics.php");?>
<?php require("./ex/inc/_body_snscode.php");?>
<div id="container">

<?php require("./ex/inc/_body_menu.php");?>

	<!-- section body str -->
	<section id="body" class="second theater">
			
		<!-- content_str -->
		<article class="page">
		
				<h1>劇場情報</h1>

				<header class="ken-list">
					<nav>
						<ul class="theater-list clearfix">
							<li><a class="001" href="#001">関東</a></li>
							<li><a class="002" href="#002">北海道・東北</a></li>
							<li><a class="003" href="#003">甲信越・北陸</a></li>
							<li><a class="004" href="#004">中部</a></li>
							<li><a class="005" href="#005">近畿</a></li>
							<li><a class="006" href="#006">中国・四国</a></li>
							<li class="last"><a class="007" href="#007">九州・沖縄</a></li>
						</ul>
					</nav>
				</header>
				
				<!-- contents str -->
				<section class="contents clearfix">

					<?php require("./ex/inc/_theater.inc");?>
                    
				</section>
				<!-- contents end -->
						
		</article>
		<!-- content_end -->
		
	</section>
	<!-- section body end -->
	
<?php require("./ex/inc/_body_foot_sp_menu.php");?>
	
	<!-- section_str -->
	<section id="uplink" class="clearfix wow fadeIn">
		
		<ul class="footer-logo">
			<li><a href="http://www.uplink.co.jp/" target="_blank" class="img-over"><img src="ex/img/uplink_logo_foot.png" width="50" alt="UPLINK" title="アップリンク"></a></li>
			<li><a href="http://jgmp.co.jp/" target="_blank" class="img-over"><img src="ex/img/jgmp_logo_foot.svg" width="120" alt="UPLINK" title="神宮前プロデユース"></a></li>
			<li><a href="http://one-goose.com/ " target="_blank" class="img-over"><img src="ex/img/onegoose_logo_foot.png" width="160" alt="UPLINK" title="ワングース"></a></li>
		</ul>
			
		
		<ul class="clearfix footer-sns">
			<li class="icon facebook"><a href="https://www.facebook.com/uplink.co.jp" target="_blank" class="img-over"><i class="fa fa-facebook-square"></i></a></li>
			<li class="icon twitter"><a href="https://twitter.com/uplink_jp" target="_blank" class="img-over"><i class="fa fa-twitter-square"></i></a></li>
			<li class="icon instagram last"><a href="http://instagram.com/uplink_film" target="_blank" class="img-over"><i class="fa fa-instagram"></i></a></li>
		</ul>
		
	</section>
	<!-- section_end -->
	
</div>
<div id="backtotop"><a href="#pagetop">Pagetop</a></div>
</body>
</html>