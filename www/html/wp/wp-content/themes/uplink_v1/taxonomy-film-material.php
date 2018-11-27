<?php get_header('film'); ?>
	
	<!-- container str -->
	<div id="container" class="clearfix film list films">
		<!-- maincontents str -->
		<div id="maincontents">
			<nav id="pan">
				<p><a href="/">ホーム</a> &#8250; <a href="/film/">配給作品</a> &#8250; <em>上映素材：<?php single_term_title('', true); ?></em></p>
			</nav>
			
			<!-- posts str -->
			<section class="posts">
				<header class="contents-title">
					<h1>配給作品 - 上映素材：<?php single_term_title('', true); ?></h1>
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
				<!-- post str -->
				<article class="clearfix post">
					<header>
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<?php if ( post_custom('schedule_2') ) : ?><p><?php echo post_custom('schedule_2'); ?></p><?php endif; ?>
						<?php echo get_the_term_list( $post->ID, 'film-tag', '<ul class="tag clearfix"><li>', '</li><li>', '</li></ul>' ); ?>
					</header>
					<figure>
						<a href="<?php the_permalink() ?>">
						<?php if ( has_post_thumbnail() ): // アイキャッチがあるとき ?>
						<?php
						$title= get_the_title();
						the_post_thumbnail(array( 'thumbnail' ),
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