<?php

global $programs;

the_post();

$startdate = date('Ymd', strtotime('today'));
$enddate = date('Ymd', strtotime('+ 2 day'));

$programs = get_uplink_programs_by_date( get_uplink_site(), $startdate, $enddate );

get_template_part( 'partials/header' )?>

<div class="js-headerWrap">
  <?php get_template_part( 'navs/global', get_uplink_site() )?>
</div>

<?php get_template_part( 'partials/slider', 'top' )?>

<div class="l-wrap">

  <?php

  $news_query = new WP_Query( array(
    'post_type'         => 'news',
    'posts_per_page'    => 10,
  ));

  if ($news_query->have_posts()):
  ?>
  <section>
    <h2 class="section-heading">
      お知らせ
      <span>NEWS</span>
    </h2>

    <ul class="list-news">

      <?php

      while( $news_query->have_posts() ):

      $news_query->the_post();

      ?><li><a href="<?php the_permalink()?>">
        <div class="list-news-inner">
          <p class="list-news-date"><?php echo get_the_date( $d = 'Y.m.d' )?><span>NEW</span></p>
          <p class="list-news-text"><?php the_title()?></p>
        </div>
      </a></li><?php endwhile?>

    </ul>
    <p class="list-readmore"><a href="<?php echo home_url('news')?>">お知らせ一覧</a></p>
  </section><?php endif?>

  <section>
    <div class="archive_shcedule-header_wrap">
      <h2 class="section-heading">
        今日と明日のスケジュール
        <span>TODAY & TOMORROW</span>
      </h2>
      <ul class="list-tag">
        <li><span class="tag-film">上映</span></li>
        <li><span class="tag-events">イベント</span></li>
        <li><span class="tag-gallery">ギャラリー</span></li>
        <li><span class="tag-market">マーケット</span></li>
      </ul>
    </div>
    <?php get_template_part( 'partials/schedule', 'top' )?>
    <p class="list-readmore"><a href="<?php echo home_url( 'schedule' )?>">今月のスケジュール</a></p>
  </section>

<?php get_template_part( 'partials/footer' );