<?php get_header('market'); ?>
	
	<!-- container str -->
	<div id="container" class="clearfix schedule individual market">
		<!-- maincontents str -->
		<div id="maincontents">
			<nav id="pan">
				<p><a href="/">ホーム</a> &#8250; <a href="/market/">マーケット</a> &#8250; <em>詳細</em></p>
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
				include('cinra-css.php');
				echo get_schedule_by_post($post->ID);
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
					<li><a href="/market/#market1">マーケットについて</a></li>
					<li><a href="/market/#market2">出店スケジュール</a></li>
					<li><a href="/market/#market3">オンラインショップ</a></li>
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