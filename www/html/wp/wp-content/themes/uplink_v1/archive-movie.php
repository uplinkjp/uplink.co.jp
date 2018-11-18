<?php
/* Template Name: 上映index */
get_header('movie');
?>
	
	<!-- container str -->
	<div id="container" class="clearfix schedule list movie">
		<!-- maincontents str -->
		<div id="maincontents">
			<nav id="pan">
			<?php if ( !is_paged() ) : /* 1ページ目*/ ?>
				<p><a href="/">ホーム</a> &#8250; <em>上映</em></p>
			<?php else: /* 2ページ目*/ ?>
				<p><a href="/">ホーム</a> &#8250; <a href="/movie/">上映</a> &#8250; <em>近日公開の作品</em></p>
			<?php endif; ?>
			</nav>
			
			<?php if ( !is_paged() ) : /* 2ページ目以降は表示しない */ ?>
			<!-- posts str -->
			<section class="posts">
				<header class="contents-title">
					<h1>公開中の作品</h1>
				</header>
				<?php
				$args = array(
					'post_type' => 'movie', /* 投稿タイプを指定 */
					'movie-show' => 'nowshowing',
					'posts_per_page' => '50',
				); ?>
				<?php $my_posts = get_posts( $args ); ?>
				<?php if (have_posts()) : ?>
				<?php global $post;/* グローバル変数から値を取得 */
					 foreach ( $my_posts as $post ) :/* $my_postsを$postへ代入 */
					 setup_postdata( $post ); ?>
				<!-- post str -->
				<article class="clearfix post">
					<header>
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<?php if ( post_custom('schedule_2') ) : ?><p><?php echo post_custom('schedule_2'); ?></p><?php endif; ?>
						<?php echo get_the_term_list( $post->ID, 'movie-tag', '<ul class="tag clearfix"><li>', '</li><li>', '</li></ul>' ); ?>
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
				<?php endforeach; // end of the loop. ?>
				<?php wp_reset_postdata(); ?>
				<?php else: ?>
				<article class="clearfix post">
					<p>投稿がありません</p>
				</article>
				<?php endif; ?>
			</section>
			<?php endif; /* 2ページ目以降は表示しない */ ?>
		
			
			
			<section class="posts">
				<header class="contents-title">
					<h1>近日公開の作品</h1>
				</header>
				<?php
				$args = array(
					 'post_type' => 'movie', /* 投稿タイプを指定 */
					 'posts_per_page' => '10',
					 'paged' => $paged,
					 'movie-show' => 'comingsoon',
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
						<?php echo get_the_term_list( $post->ID, 'movie-tag', '<ul class="tag clearfix"><li>', '</li><li>', '</li></ul>' ); ?>
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
					<?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'movie-show', 'show_count' => 0)); ?>
				</ul>
				
				<ul class="service">
					<li><a href="/movie/info#info1">鑑賞券・オンライン券</a></li>
					<li><a href="/movie/info#info2">サービスデー・各種割引</a></li>
					<li><a href="/movie/info#info3">学生団体割引</a></li>
					<li><a href="/info/member/">UPLINK会員制について</a></li>
				</ul>
			</aside>
			
			<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_address.inc.php");?>
			
			<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_twitter_x.inc.php");?>
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