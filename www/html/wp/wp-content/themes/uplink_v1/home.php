<?php

if (defined('UPLINK_FORCE_RENEW'))
{
	include( WP_CONTENT_DIR . '/themes/uplink/home-tmp.php' );
	exit;
}

/* Template Name: トップページhome */
get_header('home');

include('cinra-css.php');
?>
		<?php if ( post_custom('page_1') ) : ?>
		<div id="index-slider" class="clearfix">
			<?php echo post_custom('page_1'); ?>
		</div>
		<?php endif; ?>

	</header>
	<!-- header end -->

	<!-- <div id="cloud" class="clearfix">
		<a href="http://www.uplink.co.jp/cloud/" target="_blank" class="pc"><img src="/ex/img/cloud_banner.jpg" width="950" height="120" alt=""/></a>
		<a href="http://www.uplink.co.jp/cloud/" target="_blank" class="sp"><img src="/ex/img/cloud_banner_sp.jpg" alt=""/></a>
	</div> -->

		<div id="cloud" class="clearfix">
		<div class="cloudplango"><a href="http://www.uplink.co.jp/cloud/" target="_blank" class="pc"><img src="/ex/img/uplinkcloud_banner.jpg" width="473" height="120" alt=""/></a></div>
		<div class="cloudplango"><a href="http://plango.uplink.co.jp/" target="_blank" class="pc"><img src="/ex/img/plango_banner.jpg" width="473" height="120" alt=""/></a></div>
		<a href="http://www.uplink.co.jp/cloud/" target="_blank" class="sp"><img src="/ex/img/uplinkcloud_banner_sp.jpg" alt=""/></a>
		<a href="http://plango.uplink.co.jp/" target="_blank" class="sp"><img src="/ex/img/plango_banner-sp.jpg" alt=""/></a>
	</div>

	<div id="news" class="clearfix">
		<section>
			<h1><a href="/news">お知らせ</a></h1>
			<dl>
				<?php
				$args = array(
					 'post_type' => 'news', /* 投稿タイプを指定 */
					 'paged' => $paged,
					 'numberposts' => '5',
					 'posts_per_page' => '5',
					 'news-new' => 'top',
				); ?>
				<?php query_posts( $args ); ?>
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); /* ループ開始 */ ?>
				<dt><?php echo get_the_date(); ?></dt>
					<dd><a href="<?php the_permalink() ?>"><?php the_title(); ?></a><?php
						$days=14; //6日間表示
						$today=date('U');
						$entry=get_the_time('U');
						$sa=date('U',($today - $entry))/86400;
						if( $days > $sa ){
						echo '<span class="newmark">new</span>';
						}
						?></dd>
				<?php endwhile; ?>
				<?php else: ?>
					<dd>投稿がありません</dd>
				<?php endif; ?>
			</dl>
		</section>
	</div>


	<div id="calendar">
		<article>
			<h1><a href="<?php bloginfo('url')?>/schedule/">今日と明日のスケジュール</a></h1>
			<nav>
				<ul class="clearfix">
					<li class="movie">上映</li>
					<li class="event">イベント</li>
					<li class="gallery">ギャラリー</li>
					<li class="market">マーケット</li>
				</ul>
			</nav>

			<div id="schedule-table">

				<?php echo (file_get_contents("http://ticket.uplink.co.jp/api/schedule"))?>

			</div>

			<footer><a href="<?php bloginfo('url')?>/schedule/">今月のカレンダー</a></footer>
		</article>
	</div>


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