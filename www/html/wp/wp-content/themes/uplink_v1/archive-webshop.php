<?php
/* Template Name: WEBSHOP index */
get_header('webshop');
?>
	<!-- container str -->
	<div id="container" class="clearfix webshop list">
		<!-- maincontents str -->
		<div id="maincontents">
			<nav id="pan">
				<p><a href="/">ホーム</a> &#8250; <em>WEBSHOP</em></p>
			</nav>
			
			
			<a name="webshop1" id="webshop1"></a>
			<section class="posts">
				<header class="contents-title">
					<h1>WEBSHOPについて</h1>
				</header>
				<!-- post str -->
				<article class="clearfix post">
				
					<p>このページでは、アップリンク直販で通信販売を受け付けている商品をご紹介しています。この他にも、渋谷アップリンク2階の<a href="/market/">UPLINK MARKET</a>店頭では様々な商品を御取扱いしています。ご来店もお待ちしております。UPLINK発売のDVDなどをオンラインにてご購入の際は下記のSHOPをご利用ください。</p>
					
					<ul class="link">
						<li class="target"><a href="http://www.amazon.co.jp/gp/redirect.html?ie=UTF8&location=http%3A%2F%2Fwww.amazon.co.jp%2Fs%3Fie%3DUTF8%26field-title%3D%26field-binding_browse-bin%3D%26node%3D%26redirect%3Dtrue%26sort%3D-releasedate%26field-price%3D%26search-alias%3Ddvd%26ref_%3Dsr_adv_dvd%26Adv-Srch-Dvd-Submit.y%3D11%26field-subtitled%3D%26field-pct-off%3D%26Adv-Srch-Dvd-Submit.x%3D36%26field-original%3D%26field-dvd-region%3D%26field-keywords%3D%25E3%2582%25A2%25E3%2583%2583%25E3%2583%2597%25E3%2583%25AA%25E3%2583%25B3%25E3%2582%25AF%26emi%3D%26field-director%3D%26field-actor%3D&tag=thecorporatio-22&linkCode=ur2&camp=247&creative=7399" target="_blank">Amazon.co.jp</a></li>
						<li class="target"><a href="http://www.7netshopping.jp/spc/shop/uplink/" target="_blank">セブンネットショッピング</a></li>
					</ul>
					<br class="clear" />
					
				</article>
				<!-- post end -->
			</section>
			
			<a name="webshop2" id="webshop2"></a>
			<section class="posts">
				<header class="contents-title">
					<h1>通信販売受付中の商品</h1>
				</header>
				<?php
				$args = array(
					 'post_type' => 'webshop', /* 投稿タイプを指定 */
					 'paged' => $paged,
					 'posts_per_page' => '30',
				); ?>
				<?php query_posts( $args ); ?>
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post();
					/* ループ開始 */ ?>
				<!-- post str -->
				<article class="clearfix post">
					<header>
						<h2><a href="<?php echo post_custom('webshop_2'); ?>" target="_blank"><?php the_title(); ?></a></h2>
						<?php if ( post_custom('webshop_1') ) : ?><p><?php echo post_custom('webshop_1'); ?></p><?php endif; ?>
						
						<?php if ( post_custom('webshop_2') ) : ?><p><a href="<?php echo post_custom('webshop_2'); ?>" target="_blank" class="simple-btn">≫ 通信販売で購入する</a></p><?php endif; ?>
					</header>
					<figure>
						<a href="<?php echo post_custom('webshop_2'); ?>" target="_blank">
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
			
			
		</div>
		<!-- maincontents end -->
		
		<!-- sidearea str -->
		<div id="sidearea">
			<aside class="box">
				<ul class="categorys">
					<li class="sub"><a href="#webshop1">WEBSHOPについて</a></li>
					<li class="sub"><a href="#webshop2">通信販売受付中の商品</a></li>
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