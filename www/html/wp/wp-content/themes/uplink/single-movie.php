<?php get_header('movie');?>

	<!-- container str -->
	<div id="container" class="clearfix schedule individual movie">
		<!-- maincontents str -->
		<div id="maincontents">
			<nav id="pan">
				<p><a href="/">ホーム</a> &#8250; <a href="/movie/">上映</a> &#8250; <em>詳細</em></p>
			</nav>

			<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<!-- post str -->
			<article class="clearfix post">
				<header>
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
					<?php if ( post_custom('schedule_2') ) : ?>
						<p><?php echo post_custom('schedule_2'); ?></p>
					<?php endif; ?>
					
					<?php if ( is_object_in_term($post->ID, 'movie-show','') or is_object_in_term($post->ID, 'movie-tag','') ) : ?>
					<ul class="tag clearfix">
					<?php echo get_the_term_list( $post->ID, 'movie-show', '<li>', '</li><li>', '</li>' ); ?>
					<?php echo get_the_term_list( $post->ID, 'movie-tag', '<li>', '</li><li>', '</li>' ); ?>
					</ul>
					<?php endif; ?>
					
					<ul class="socialmedia clearfix">
						<li class="btn-facebook"><div class="fb-like" data-href="<?php the_permalink() ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div></li>
						<li class="btn-twitter"><?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_twitter_btn.inc.php");?></li>
					</ul>

				</header>
				
				<?php if ( the_post_thumbnail ) : ?>
				<figure>
					<?php the_post_thumbnail( 'large' , array('title' => ''.get_the_title().'')  ); ?>
					<?php if ( post_custom('schedule_1') ) : ?>
						<figcaption><?php echo post_custom('schedule_1'); ?></figcaption>
					<?php endif; ?>
				</figure>
				<?php endif; ?>
				
				<section class="data">
					<dl class="clearfix">
					<?php if ( post_custom('schedule_2') ) : ?>
						<dt>日時</dt>
							<dd><?php echo post_custom('schedule_2'); ?></dd>
					<?php endif; ?>
					<?php if ( post_custom('schedule_3') ) : ?>
						<dt>料金</dt>
							<dd><?php echo post_custom('schedule_3'); ?></dd>
					<?php endif; ?>
					<?php if ( post_custom('schedule_4') ) : ?>
						<dt>会場</dt>
							<dd><?php echo post_custom('schedule_4'); ?></dd>
					<?php endif; ?>
					<?php if ( post_custom('schedule_5') ) : ?>
						<dt>作品分数</dt>
							<dd><?php echo post_custom('schedule_5'); ?></dd>
					<?php endif; ?>
					<?php if ( post_custom('schedule_6') or post_custom('schedule_7') or post_custom('schedule_8') ) : ?>
						<dt>リンク</dt>
							<dd class="link">
								<?php if ( post_custom('schedule_6') ) : ?>
									<a href="<?php echo post_custom('schedule_6'); ?>" title="公式サイト" target="_blank">公式サイト</a>&nbsp;
								<?php endif; ?>
								<?php if ( post_custom('schedule_7') ) : ?>
									<a href="<?php echo post_custom('schedule_7'); ?>" title="Twitter" target="_blank">Twitter</a>&nbsp;
								<?php endif; ?>
								<?php if ( post_custom('schedule_8') ) : ?>
									<a href="<?php echo post_custom('schedule_8'); ?>" title="facebook" target="_blank">facebook</a>&nbsp;
								<?php endif; ?>
							</dd>
					<?php endif; ?>
					</dl>
				</section>
				
				<?php
				$type = get_post_type();
				$id = get_the_ID();
				$ticket = file_get_contents( 'http://ticket.uplink.co.jp/api/schedule?'.$type.'='.$id );
				echo $ticket;
				?>
				
				<section class="clearfix body">
					<?php the_content(); ?>
				</section>

			</article>
			<!-- post end -->
			<aside class="widget">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('single') ) : ?><?php endif; ?>
			</aside>
			<?php endwhile; ?>
			<?php endif; ?>

			
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