<?php get_header('event'); ?>
	
	<!-- container str -->
	<div id="container" class="clearfix schedule individual event">
		<!-- maincontents str -->
		<div id="maincontents">
			<nav id="pan">
				<p><a href="/">ホーム</a> &#8250; <a href="/event/">イベント</a> &#8250; <em>詳細</em></p>
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
						<li class="btn-hatena"><a href="http://b.hatena.ne.jp/entry/<?php the_permalink() ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?>" data-hatena-bookmark-layout="standard" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script></li>
						<li class="btn-google"><g:plusone size="medium"></g:plusone></li>
						<li class="btn-facebook"><div class="fb-like" data-href="<?php the_permalink() ?>" data-send="false" data-layout="button_count" data-width="115" data-show-faces="false"></div></li>
						<li class="btn-twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>" data-text="<?php the_title(); ?> - <?php echo post_custom('schedule_2'); ?> | <?php bloginfo('name'); ?>" data-via="uplink_jp" data-lang="ja" data-related="webdice">ツイート</a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
						<?php echo get_the_term_list( $post->ID, 'event-tag', '<li><ul class="tag clearfix"><li>', '</li><li>', '</li></ul></li>' ); ?>
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
					</dl>
				</section>
				<section class="clearfix body">
					<?php the_content(); ?>
				</section>

			</article>
			<!-- post end -->
			<?php endwhile; ?>
			<?php endif; ?>

			
		</div>
		<!-- maincontents end -->

		<!-- sidearea str -->
		<div id="sidearea">
			<aside class="box">
				<ul class="calendar">
					<li><a href="#">今月のカレンダー</a></li>
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