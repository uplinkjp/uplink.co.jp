<?php
/* Template Name: イベントindex */
get_header('event');
?>

	<!-- container str -->
	<div id="container" class="clearfix schedule list event">
		<!-- maincontents str -->
		<div id="maincontents">
			<nav id="pan">
				<p><a href="/">ホーム</a> &#8250; <em>イベント</em></p>
			</nav>
			
			<!-- posts str -->
			<section class="posts">
				<header class="contents-title">
					<h1>イベント</h1>
				</header>
					 
				<?php
				$args = array(
					 'post_type' => 'event', /* 投稿タイプを指定 */
					 'posts_per_page' => '15',
					 'paged' => $paged,
					 'event-new' => 'new',
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
						<?php echo get_the_term_list( $post->ID, 'event-tag', '<ul class="tag clearfix"><li>', '</li><li>', '</li></ul>' ); ?>
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
			<!-- posts end -->
			
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
					<li class="sub"><a href="/event/">イベント</a></li>
					<li class="tag">
						<ul>
							<?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'event-tag', 'show_count' => 0)); ?>
						</ul>
					</li>
					
				</ul>
				
				<ul class="service">
					<li><a href="/event/info">整理券について</a></li>
					<li><a href="/info/member">UPLINK会員制について</a></li>
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
<?php get_footer(); ?>