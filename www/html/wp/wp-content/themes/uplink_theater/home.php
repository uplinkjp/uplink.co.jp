<?php

the_post();

$startdate = date('Ymd', strtotime('today'));
$enddate = date('Ymd', strtotime('+ 2 day'));

$programs = get_uplink_programs_by_date( $startdate, $enddate );

get_template_part( 'partials/header' )?>

<div class="js-headerWrap">
  <?php get_template_part( 'navs/global', get_uplink_site() )?>
</div>

<?php get_template_part( 'partials/slider', 'top' )?>

<div class="l-wrap">

  <section>
    <h2 class="section-heading">
      お知らせ
      <span>NEWS</span>
    </h2>

    <ul class="list-news">

      <li><a href="">
        <div class="list-news-inner">
          <p class="list-news-date">2018.08.16<span>NEW</span></p>
          <p class="list-news-text">ハービー・山口写真展「今日は、映画を観に行く」撮影プロジェクトの被写体募集！</p>
        </div>
      </a></li>

      <li><a href="">
        <div class="list-news-inner">
          <p class="list-news-date">2018.08.16<span>NEW</span></p>
          <p class="list-news-text">スタッフ募集（アップリンク吉祥寺劇場運営、経理事務）</p>
        </div>
      </a></li>

      <li><a href="">
        <div class="list-news-inner">
          <p class="list-news-date">2018.08.16<span>NEW</span></p>
          <p class="list-news-text">渋谷・吉祥寺店共通の「新・アップリンク会員制度」のお得な早期受付スタート！および会員料金の改定について</p>
        </div>

      </a></li>

      <li><a href="">
        <div class="list-news-inner">
          <p class="list-news-date">2018.08.16<span>NEW</span></p>
          <p class="list-news-text">大好評につきアンコール上映決定！！映画『ラ・チャナ』超貴重特別映像限定上映！！！</p>
        </div>

      </a></li>

      <li><a href="">
        <div class="list-news-inner">
          <p class="list-news-date">2018.08.16<span>NEW</span></p>
          <p class="list-news-text">パワフルな映画と料理で夏の疲れを吹き飛ばす！ 映画『ラ・チャナ』× Tabelaのコラボレーションメニュー登場 ！</p>
        </div>
      </a></li>

    </ul>
    <p class="list-readmore"><a href="">お知らせ一覧</a></p>
  </section>

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