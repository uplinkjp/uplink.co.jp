<?php get_header(); ?>

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

				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<!-- post str -->
				<article class="clearfix post">
					<header>
						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
						<p>2012/2/15(水)、2/17(金)、2/20(月)　各日19:00開場 / 19:15上映</p>
						<?php the_tags('<ul class="tag clearfix"><li>','</li><li>','</li></ul>');?>
					</header>
					<figure>
						<a href="<?php the_permalink() ?>">
						<?php if ( has_post_thumbnail() ): // アイキャッチがあるとき ?>
						<?php
						$title= get_the_title();
						the_post_thumbnail(array( 200,140 ),
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

			<nav id="pager">
				<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
			</nav>
		</div>
		<!-- maincontents end -->

<?php get_sidebar(); ?>

	</div>
	<!-- container end -->
</div>
<!-- pagewidth end -->
<?php get_footer(); ?>