<?php
/* Template Name: マーケットindex */
get_header('market');
?>
	<!-- container str -->
	<div id="container" class="clearfix schedule list market">
		<!-- maincontents str -->
		<div id="maincontents">
			<nav id="pan">
				<p><a href="/">ホーム</a> &#8250; <em>マーケット</em></p>
			</nav>
			
			
			<a name="market1" id="market1"></a>
			<section class="posts">
				<header class="contents-title">
					<h1>マーケットについて</h1>
				</header>
				<!-- post str -->
				<article class="clearfix post">
					
					<p>渋谷アップリンク2階のUPLINK MARKETでは様々な商品を販売中。多種多様な商品をそろえてお待ちしています。入荷情報は<a href="https://www.facebook.com/uplink.market" target="_blank">facebook</a>でご紹介します。</p>
					
					<ul class="link">
						<li><a href="/info/map/">地図</a></li>
						<li class="target"><a href="https://www.facebook.com/uplink.market" target="_blank">facebook</a></li>
					</ul>
					
					<br class="clear" />
					
				</article>
				<!-- post end -->
			</section>
			
			<a name="market2" id="market2"></a>
			<section class="posts">
				<header class="contents-title">
					<h1>出店スケジュール</h1>
				</header>
				<?php
				$args = array(
					 'post_type' => 'market', /* 投稿タイプを指定 */
					 'paged' => $paged,
					 'posts_per_page' => '10',
					 'market-new' => 'market-active',
				); ?>
				<?php query_posts( $args ); ?>
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post();
					/* ループ開始 */ ?>
				<!-- post str -->
				<article class="clearfix post">
					<header>
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<?php if ( post_custom('schedule_2') ) : ?><p><?php echo post_custom('schedule_2'); ?></p><?php endif; ?>
					</header>
					<figure>
						<a href="<?php the_permalink() ?>">
						<?php if ( has_post_thumbnail() ): // アイキャッチがあるとき ?>
						<?php
						$title= get_the_title();
						the_post_thumbnail(array( 200, 140 ),
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
			
			<a name="market3" id="market3"></a>
			<section class="posts">
				<header class="contents-title">
					<h1>オンラインショップ</h1>
				</header>
				<!-- post str -->
				<article class="clearfix post">
					<p>UPLINK発売のDVDなどのご購入の際は下記のSHOPをご利用ください。</p>
					<ul class="link">
						<li class="target"><a href="http://www.amazon.co.jp/gp/redirect.html?ie=UTF8&location=http%3A%2F%2Fwww.amazon.co.jp%2Fs%3Fie%3DUTF8%26field-title%3D%26field-binding_browse-bin%3D%26node%3D%26redirect%3Dtrue%26sort%3D-releasedate%26field-price%3D%26search-alias%3Ddvd%26ref_%3Dsr_adv_dvd%26Adv-Srch-Dvd-Submit.y%3D11%26field-subtitled%3D%26field-pct-off%3D%26Adv-Srch-Dvd-Submit.x%3D36%26field-original%3D%26field-dvd-region%3D%26field-keywords%3D%25E3%2582%25A2%25E3%2583%2583%25E3%2583%2597%25E3%2583%25AA%25E3%2583%25B3%25E3%2582%25AF%26emi%3D%26field-director%3D%26field-actor%3D&tag=thecorporatio-22&linkCode=ur2&camp=247&creative=7399" target="_blank">Amazon.co.jp</a></li>
					</ul>
				</article>
				<!-- post end -->
			</section>
			
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
					<li><a href="#market1">マーケットについて</a></li>
					<li><a href="#market2">出店スケジュール</a></li>
					<li><a href="#market3">オンラインショップ</a></li>
					<li class="target"><a href="https://www.facebook.com/pages/%E3%82%A2%E3%83%83%E3%83%97%E3%83%AA%E3%83%B3%E3%82%AF%E3%83%9E%E3%83%BC%E3%82%B1%E3%83%83%E3%83%88/460210010661707" target="_blank">facebook</a></li>
				</ul>
				
				<ul class="service">
					<li><a href="/info/member/">UPLINK会員制について</a></li>
				</ul>
			</aside>
			
			<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_address.inc.php");?>
			<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_facebook_market.inc.php");?>
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