<?php get_header('film'); ?>

	<!-- container str -->
	<div id="container" class="clearfix film individual films">
		<!-- maincontents str -->
		<div id="maincontents">
			<nav id="pan">
				<p><a href="/">ホーム</a> &#8250; <a href="/film/">配給作品</a> &#8250; <em>詳細</em></p>
			</nav>

			<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<!-- post str -->
			<article class="clearfix post">
				<header>
					<h2><?php the_date("Y年配給作品"); ?></h2>
					<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
					<?php if ( post_custom('schedule_2') ) : ?>
						<p><?php echo post_custom('schedule_2'); ?></p>
					<?php endif; ?>
					
					<?php echo get_the_term_list( $post->ID, 'film-tag', '<ul class="tag clearfix"><li>', '</li><li>', '</li></ul>' ); ?>
					
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
					<?php if (is_object_in_term($post->ID, 'film-tag','rental')): ?>
					<ul>
						<li class="rental">この作品は自主上映可能です<p>料金など詳細については<a href="/film/rental/" target="_blank">自主上映のご案内</a>のページをご覧ください</p></li>
					</ul>
					<?php endif; ?>

					
					<dl class="clearfix">
					<?php if ( post_custom('film_1') ) : ?>
						<dt>原題</dt>
							<dd><?php echo post_custom('film_1'); ?></dd>
					<?php endif; ?>
					<?php if ( post_custom('film_main_1') ) : ?>
						<dt>劇場公開日</dt>
							<dd><?php $date = post_custom("film_main_1"); echo date('Y年n月j日', strtotime($date)); ?></dd>
					<?php endif; ?>
					<?php if ( post_custom('film_main_4') ) : ?>
						<dt>国内配給期限</dt>
							<dd><?php if ( post_custom('film_main_4') ) : ?><?php $date = post_custom("film_main_4"); echo date('Y年n月j日', strtotime($date)); ?>まで<?php endif; ?></dd>
					<?php endif; ?>
					<?php if ( post_custom('schedule_5') ) : ?>
						<dt>作品分数</dt>
							<dd><?php echo post_custom('schedule_5'); ?></dd>
					<?php endif; ?>
					
					<?php echo get_the_term_list( $post->ID, 'film-material', '<dt>上映素材</dt><dd>', '、', '</dd>' ) ?>
							
					<?php if ( post_custom('film_2') ) : ?>
						<dt>提供元</dt>
							<dd><?php echo post_custom('film_2'); ?></dd>
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

					<?php if ( post_custom('film_3') ) : ?>
						<dt>予告編</dt>
							<dd><a href="<?php echo post_custom('film_3'); ?>" target="_blank">YOUTUBE</a></dd>
					<?php endif; ?>

					</dl>
				</section>
				
				
				<?php if($post->post_content) : ?>
				<!--本文-->
				<section class="clearfix body">
					<?php the_content(); ?>
				</section>
				<?php endif; ?>
				
				
				<?php if ( post_custom('film_sell_img_1') or post_custom('film_sell_1') or post_custom('film_sell_2') or post_custom('film_sell_3') or post_custom('film_sell_5') or post_custom('film_sell_7') or post_custom('film_sell_10') ) : ?>
				<section class="data">
					<h2>発売情報</h2>
					
					<?php if ( post_custom('film_sell_img_1') ) : ?>
					<figure>
						<?php $image_id = post_custom('film_sell_img_1'); echo wp_get_attachment_link($image_id, array(500, 450)); ?>
					</figure>
					<?php endif; ?>
					
					<dl class="clearfix">
					<?php if ( post_custom('film_sell_1') ) : ?>
						<dt>商品名</dt>
							<dd><?php echo post_custom('film_sell_1'); ?></dd>
					<?php endif; ?>
					<?php if ( post_custom('film_main_2') ) : ?>
						<dt>発売日</dt>
							<dd><?php $date = post_custom("film_main_2"); echo date('Y年n月j日', strtotime($date)); ?></dd>
					<?php endif; ?>
					
					<?php if ( post_custom('film_sell_3') or post_custom('film_sell_5') or post_custom('film_sell_7') ) : ?>
						<dt>ソフト</dt>
							<dd>
							<a href="<?php echo post_custom('film_sell_3'); ?>" target="_blank"><?php if ( post_custom('film_main_2') ) : ?><?php echo post_custom('film_sell_2'); ?><?php else : ?><?php echo ('商品を購入する') ?><?php endif; ?></a>  
							<a href="<?php echo post_custom('film_sell_5'); ?>" target="_blank"><?php echo post_custom('film_sell_4'); ?></a> 
							<a href="<?php echo post_custom('film_sell_7'); ?>" target="_blank"><?php echo post_custom('film_sell_6'); ?></a> 
							</dd>
					<?php endif; ?>
					
					<?php if ( post_custom('film_sell_10') ) : ?>
						<dt>動画配信</dt>
							<dd><a href="<?php echo post_custom('film_sell_10'); ?>" target="_blank">配信先一覧はこちら</a></dd>
					<?php endif; ?>
					</dl>
				</section>
				<?php endif; ?>
	

				<section class="clearfix body">
				
				<?php if ( post_custom('film_txt_1') ) : ?>
					<section class="introduction">
						<h2>イントロダクション</h2>

						<p><?php echo nl2br(get_post_meta($post->ID, 'film_txt_1', true)); ?></p>
					</section>
				<?php endif; ?>
				<?php if ( post_custom('film_txt_2') ) : ?>
					<section class="story">
						<h2>ストーリー</h2>
						<p><?php echo nl2br(get_post_meta($post->ID, 'film_txt_2', true)); ?></p>
					</section>
				<?php endif; ?>
				<?php if ( post_custom('film_txt_3') ) : ?>
					<section class="credit">
						<h2>クレジット</h2>
						<p><?php echo nl2br(get_post_meta($post->ID, 'film_txt_3', true)); ?></p>
					</section>
				<?php endif; ?>
				
				<?php if ( post_custom('film_flyer_1') or post_custom('film_flyer_2') or post_custom('film_flyer_3') or post_custom('film_flyer_4') or post_custom('film_flyer_5') ) : ?>
					<section class="flyer">
						<h2>ちらし</h2>
						<?php if ( post_custom('film_flyer_5') ) : ?>
						<?php
						$pdfs01 = get_post_meta($post->ID, 'film_flyer_5', false);
						foreach($pdfs01 as $pdf01){
						$pdf01 = wp_get_attachment_url($pdf01);
						}
						?>
						<p><a href="<?php echo $pdf01;?>" target="_blank">ちらしのPDFをダウンロードする</a></p>
						<?php endif; ?>
						<figure>
							<?php if ( post_custom('film_flyer_1') ) : ?><?php $image_id = post_custom('film_flyer_1'); echo wp_get_attachment_link($image_id, array(300, 400)); ?><?php endif; ?>
							<?php if ( post_custom('film_flyer_2') ) : ?><?php $image_id = post_custom('film_flyer_2'); echo wp_get_attachment_link($image_id, array(300, 400)); ?><?php endif; ?>
							<?php if ( post_custom('film_flyer_3') ) : ?><?php $image_id = post_custom('film_flyer_3'); echo wp_get_attachment_link($image_id, array(300, 400)); ?><?php endif; ?>
							<?php if ( post_custom('film_flyer_4') ) : ?><?php $image_id = post_custom('film_flyer_4'); echo wp_get_attachment_link($image_id, array(300, 400)); ?><?php endif; ?>
						</figure>
					</section>
				<?php endif; ?>
					
				<?php if ( post_custom('film_photo_1') or post_custom('film_photo_2') or post_custom('film_photo_3') or post_custom('film_photo_4') ) : ?>
					<section class="still">
						<h2>場面写真</h2>
						<figure>
							<?php if ( post_custom('film_photo_1') ) : ?><?php $image_id = post_custom('film_photo_1'); echo wp_get_attachment_link($image_id, array(300, 169)); ?><?php endif; ?>
							<?php if ( post_custom('film_photo_2') ) : ?><?php $image_id = post_custom('film_photo_2'); echo wp_get_attachment_link($image_id, array(300, 169)); ?><?php endif; ?>
							<?php if ( post_custom('film_photo_3') ) : ?><?php $image_id = post_custom('film_photo_3'); echo wp_get_attachment_link($image_id, array(300, 169)); ?><?php endif; ?>
							<?php if ( post_custom('film_photo_4') ) : ?><?php $image_id = post_custom('film_photo_4'); echo wp_get_attachment_link($image_id, array(300, 169)); ?><?php endif; ?>
						</figure>
					</section>
				<?php endif; ?>
				
				<?php if ( post_custom('film_3') ) : ?>
					<section class="trailer">
						<h2>予告編</h2>
						<?php
							$youtube_url = post_custom('film_3');
							preg_match('/\?v=([^&]+)/',$youtube_url,$match);
							$youtube_id = $match[1];
						?>
						<p><iframe width="640" height="360" src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></p>
					</section>
				<?php endif; ?>						
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
				<ul class="tag">
					<?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'film-tag', 'show_count' => 0 , 'orderby' => 'term_order' )); ?>
				</ul>
							
				<ul class="categorys">	
					<li class="sub"><a href="/film/">配給作品</a></li>
					<li class="archive">
						<ul>
							<?php wp_get_archives('post_type=film&type=yearly'); ?> 
						</ul>
					</li>
				</ul>

				<ul class="categorys">	
					<li class="sub">上映素材</li>
					<li class="archive">
						<ul>
							<?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'film-material', 'show_count' => 0 , 'orderby' => 'term_order' )); ?>
						</ul>
					</li>
				</ul>
				
			</aside>

			<aside class="box">
				<ul class="categorys rental">
					<li><a href="/film/rental/" target="_blank">自主上映のご案内</a></li>
				</ul>
				<ul class="categorys">
					<li><a href="/film-tag/rental">自主上映可能な作品</a></li>
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