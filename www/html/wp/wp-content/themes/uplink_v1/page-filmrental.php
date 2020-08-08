<?php /* Template Name: 配給作品 自主上映 */?>
	
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_meta.inc.php");?>
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_linkfile.inc.php");?>
	
	<!-- news str -->
	<link rel="stylesheet" href="/ex/css/film.css" type="text/css" />
	<link rel="stylesheet" href="/ex/css/film-320.css" media="screen and (max-width: 480px)" />
	<!-- news end -->
	
	<title>自主上映のご案内 | UPLINK</title>
	<meta property="og:image" content="http://www.uplink.co.jp/ex/img/img_rental.jpg" />
	<meta name="Description" content="あなたの街で映画を自主上映してみませんか？アップリンク自主上映情報を掲載しています。" />
	<meta name="Keywords" content="自主上映,アップリンク,UPLINK,映画,ビデオ,アート,書籍,シネマ,映像,フィルム,インディペンデント" />
    
    
	
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_analytics.inc.php");?>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_head.inc.php");?>
<!-- pagewidth str -->
<div id="pagewidth">
	<!-- header str -->
	<header>
		<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_header_nav.inc.php");?>
	</header>
	<!-- header end -->
	
	<!-- container str -->
	<div id="container" class="clearfix film list rental">
		<!-- maincontents str -->
		<div id="maincontents">
			<nav id="pan">
				<p><a href="/">ホーム</a> &#8250; <em>自主上映のご案内</em> </p>
			</nav>
			
			<section class="posts">
				<header class="contents-title">
					<h1>自主上映のご案内<br />
					あなたの街で映画を自主上映してみませんか？</h1>
				</header>
				
				<!-- post str -->
				<article class="clearfix post">
					<p>アップリンク配給の映画を学校・公民館・カフェ・イベントスペースなどで自主上映して頂くことが可能です。ただし作品によって映画料やレンタル方法に多少の違いのあるものがあります。上映作品、上映素材などをご確認の上、<a href="/film/rental/howto/#rental4">お問い合わせ</a>ください。<br />

また、各地映画祭での上映は自主上映（学校や公民館など、公共施設での限定上映）と料金設定が異なりますので、こちらも担当者に<a href="/film/rental/howto/#rental4">お問い合わせ</a>ください。</p>
					
					<ul class="rentalmenu">
						<li class="howto"><a href="/film/rental/howto/">上映までの手順・料金など</a></li>
						<li class="rentallist"><a href="/film-tag/rental" target="_blank">自主上映可能な作品</a></li>
						<li class="contact"><a href="/film/rental/howto/#rental4">お申込み・お問合せ</a></li>
						<li class="faq"><a href="/film/rental/faq/">よくあるご質問</a></li>
						<li class="report"><a href="/news-filmrental/example" target="_blank">過去の自主上映会例</a></li>
					</ul>
				</article>
				<!-- post end -->
				
			</section>
			
			
			
			<section class="posts">
				<header class="contents-title">
					<h2>お知らせ　<small><a href="/news-filmrental/news/" target="_blank">&#8250; 自主上映のお知らせ一覧はこちら</a></small></h2>
				</header>
				
				<?php
				$args = array(
					 'post_type' => 'news', /* 投稿タイプを指定 */
					 'paged' => $paged,
					 'posts_per_page' => '3',
					 'news-filmrental' => 'news',
				); ?>
				<?php query_posts( $args ); ?>
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); /* ループ開始 */ ?>
				
				<?php if ( has_post_thumbnail() ): // アイキャッチがあるとき ?>
				<!-- post str -->
				<article class="clearfix post news">
					<header>
						<time datetime="<?php echo get_the_date(); ?>" pubdate="pubdate"><?php echo get_the_date(); ?> 更新</time>
						<h2><a href="<?php the_permalink() ?>" target="_blank"><?php the_title(); ?></a><?php
						$days=14; //6日間表示
						$today=date('U');
						$entry=get_the_time('U');
						$sa=date('U',($today - $entry))/86400;
						if( $days > $sa ){
						echo '<span class="newmark">new</span>';
						}
						?></h2>
					</header>
					<figure><a href="<?php the_permalink() ?>"><?php
						$title= get_the_title();
						the_post_thumbnail(array( 200, 140 ),
						array( 'alt' =>$title, 'title' => $title)); ?></a></figure>
				</article>
				<!-- post end -->
				<?php else: // アイキャッチがないとき ?>
				<!-- post str -->
				<article class="clearfix post news">
					<header class="noimg">
						<time datetime="<?php echo get_the_date(); ?>" pubdate="pubdate"><?php echo get_the_date(); ?> 更新</time>
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a><?php
						$days=14; //6日間表示
						$today=date('U');
						$entry=get_the_time('U');
						$sa=date('U',($today - $entry))/86400;
						if( $days > $sa ){
						echo '<span class="newmark">new</span>';
						}
						?></h2>
					</header>
				</article>
				<!-- post end -->
				<?php endif; // アイキャッチがないとき END ?>
				
				<?php endwhile; ?>
				<?php else: ?>
				<article class="clearfix post">
					<p>投稿がありません</p>
				</article>
				<?php endif; ?>

			</section>

			
	
			<section class="posts rentallist">
				<header class="contents-title">
					<h2>PICK UP!　<small><a href="/film-tag/rental" target="_blank">&#8250; すべての自主上映可能な作品一覧はこちら</a></small></h2>
				</header>
				<?php
				$args = array(
					 'post_type' => 'film', /* 投稿タイプを指定 */
					 'posts_per_page' => '10',
					 'paged' => $paged,
					 'film-rental' => 'recommend',
				); ?>
				<?php query_posts( $args ); ?>
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post();
					/* ループ開始 */ ?>
				<!-- post str -->
				<article class="clearfix post">
					<header>
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<?php if ( post_custom('film_main_1') ) : ?><p><?php $date = post_custom("film_main_1"); echo date('Y年劇場公開作品', strtotime($date)); ?></p><?php endif; ?>
					</header>
					<figure>
						<a href="<?php the_permalink() ?>">
						<?php if ( has_post_thumbnail() ): // アイキャッチがあるとき ?>
						<?php
						$title= get_the_title();
						the_post_thumbnail(array( 'thumbnail' ),
						array( 'alt' =>$title, 'title' => $title)); ?>
						<?php else: // アイキャッチがないとき ?>
						<img src="/ex/img/img_no.gif" width="200" height="140">
						<?php endif; ?>
						</a>
					</figure>
				</article>
				<!-- post end -->
				<?php endwhile; ?>
				<?php else: ?>
				<article class="clearfix post">
					<p>投稿がありません</p>
				</article>
				<?php endif; ?>
			</section>
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi('<nav id="pager">','</nav>'); } ?>
			<?php wp_reset_query(); ?>
			
			<!--section class="posts news">
				<header class="contents-title">
					<h2>自主上映のスケジュール</h2>
				</header-->
				<!-- post str -->
				<!--article>
					<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;mode=AGENDA&amp;height=450&amp;wkst=2&amp;hl=ja&amp;bgcolor=%23FFFFFF&amp;src=rlajgrh7lcnd0go3pmcvkli6n0%40group.calendar.google.com&amp;color=%23B1365F&amp;ctz=Asia%2FTokyo" style=" border-width:0 " width="670" height="450" frameborder="0" scrolling="no"></iframe>
					<p class="right">
						<a class="target" target="_blank" href="https://www.google.com/calendar/embed?src=rlajgrh7lcnd0go3pmcvkli6n0%40group.calendar.google.com&ctz=Asia/Tokyo">大きなカレンダーを表示</a>
					</p>
				</article-->
				<!-- post end -->
			<!--/section-->
			
			<div class="banner"><a href="/film/rental/campaign/campaign01.php#campaign2"><img src="campaign/img/banner_120407.gif" width="500" height="100"></a></div>
			
		</div>
		<!-- maincontents end -->
				
		<!-- sidearea str -->
		<div id="sidearea">
			<aside class="box">
				<ul class="categorys rental">
					<li class="sub"><a href="/film/rental/">自主上映のご案内</a></li>
					<li class="archive">
						<ul>
							<li><a href="/film/rental/howto/">上映までの手順・料金</a></li>
							<li><a href="/film/rental/faq/">よくあるご質問</a></li>
						</ul>
					</li>
				</ul>
				<ul class="categorys films">
					<li class="sub rentallist"><a href="/film-tag/rental" target="_blank">自主上映可能な作品</a></li>
				</ul>
				<ul class="categorys news">
					<li><a href="/news-filmrental/example">過去の自主上映会例</a></li>
				</ul>
			</aside>
		</div>
		<!-- sidearea end -->
	</div>
	<!-- container end -->
</div>
<!-- pagewidth end -->
<!-- footer str -->
<footer id="footer-nav">
	<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_footer_nav.inc.php");?>
</footer>
<!-- footer end -->
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_foot.inc.php");?>
</body>
</html>