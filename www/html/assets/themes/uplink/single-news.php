<?php get_header('news'); ?>

	<!-- container str -->
	<div id="container" class="clearfix news individual">
		<!-- maincontents str -->
		<div id="maincontents">
			<nav id="pan">
				<p><a href="/">ホーム</a> &#8250; <a href="/news/">お知らせ</a> &#8250; <em>詳細</em></p>
			</nav>
			
			<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<!-- post str -->
			<article class="clearfix post">
				<header>
					<time datetime="<?php echo get_the_date(); ?>" pubdate="pubdate"><?php the_date(); ?> 更新</time>
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
					
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