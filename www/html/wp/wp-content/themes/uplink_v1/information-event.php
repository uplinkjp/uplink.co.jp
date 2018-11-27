<?php
/* Template Name: イベントinformation */
get_header('event');
?>
	
	<!-- container str -->
	<div id="container" class="clearfix schedule list event info">
		<!-- maincontents str -->
		<div id="maincontents">
			<nav id="pan">
				<p><a href="/">ホーム</a> &#8250; <a href="/event/">イベント</a> &#8250; <em>整理券について</em></p>
			</nav>
			
			<article class="clearfix post">
				<header class="contents-title">
					<h1>整理券について</h1>
				</header>
				<section class="body">
						
					<!-- contents str -->
					<a name="info1" id="info1"></a>
					<section class="contents">
						<section class="content">
							<h3><strong>開場の1時間前から整理券を配布</strong></h3>
							<ul class="important">
								<li>開場は上映開始の15分前、整理番号順に入場</li>
								<li>上映作品により開場時間が10分前の場合もございます。</li>
								<li>全席自由席</li>
							</ul>
						</section>
						<section class="content">
							<ul>
								<li>整理券をお持ちのお客様でも開場時に会場にいらっしゃらない場合は、ご入場を優先致しませんので、お気をつけ下さい。</li>
							</ul>
						</section>
					</section>
					<!-- contents end -->
				</section>
			</article>
		</div>
		<!-- maincontents end -->
		
		<!-- sidearea str -->
		<div id="sidearea">
			<aside class="box">
				<ul class="calendar">
					<li><a href="/schedule">今月のカレンダー</a></li>
				</ul>
			</aside>
				
			<aside class="box">
				<ul class="categorys">
					<li class="sub"><a href="/event/">イベント</a></li>
					<li class="tag">
						<ul>
							<?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'event-tag', 'show_count' => 0)); ?>
						</ul>
					</li>
					
				</ul>
				
				<ul class="service">
					<li><a href="/event/info">整理券について</a></li>
					<li><a href="/info/member/">UPLINK会員制について</a></li>
				</ul>
			</aside>
			
			<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_address.inc.php");?>
			<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_twitter_f.inc.php");?>
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