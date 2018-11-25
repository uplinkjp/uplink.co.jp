<?php
/* Template Name: お知らせrecruit */
get_header('news');
?>
	
	<!-- container str -->
	<div id="container" class="clearfix news list">
		<!-- maincontents str -->
		<div id="maincontents">
			<nav id="pan">
				<p><a href="/">ホーム</a> &#8250; <a href="/news/">お知らせ</a> &#8250; <em>採用</em> </p>
			</nav>
			
			<section class="posts">
				<header class="contents-title">
					<h1>お知らせ - 採用</h1>
				</header>
				
				<?php $wp_query;
				$args = array_merge(
				  $wp_query->query,
				  array(
					'posts_per_page' => 10
				  )
				);
				query_posts( $args ); ?>
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post();
				/* ループ開始 */?>
				
				<?php if ( has_post_thumbnail() ): // アイキャッチがあるとき ?>
				<!-- post str -->
				<article class="clearfix post">
					<header>
						<time datetime="<?php echo get_the_date(); ?>" pubdate="pubdate"><?php the_date(); ?> 更新</time>
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
					<figure><a href="<?php the_permalink() ?>"><?php
						$title= get_the_title();
						the_post_thumbnail(array( 200, 140 ),
						array( 'alt' =>$title, 'title' => $title)); ?></a></figure>
				</article>
				<!-- post end -->
				<?php else: // アイキャッチがないとき ?>
				<!-- post str -->
				<article class="clearfix post">
					<header class="noimg">
						<time datetime="<?php echo get_the_date(); ?>" pubdate="pubdate"><?php the_date(); ?> 更新</time>
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
			
			<?php if(function_exists('wp_pagenavi')) { wp_pagenavi('<nav id="pager">','</nav>'); } ?>
			<?php wp_reset_query(); ?>
			
		</div>
		<!-- maincontents end -->
				
		<!-- sidearea str -->
		<div id="sidearea">				
			<aside class="box">
				<ul class="categorys">
					<li><a href="/info/">会社概要</a></li>
					<li><a href="/news/">お知らせ</a></li>
					<li><a href="/news/recruit">採用</a></li>
					<li><a href="/info/privacypolicy">個人情報の取り扱い</a></li>
					<li><a href="/info/information_en">English information</a></li>
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