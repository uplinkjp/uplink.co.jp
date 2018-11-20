<?php

/*
Template Name: Schedule
 */

the_post();

$yyyy = isset($_GET['yyyy']) ? (int)$_GET['yyyy'] : date('Y');
$mm = isset($_GET['mm']) ? (int)$_GET['mm'] : date('n');

$startdate = date('Ymd', mktime(0, 0, 0, $mm, 1, $yyyy));
$enddate = date('Ymd', mktime(0, 0, 0, $mm + 1, 0, $yyyy));

$programs = get_uplink_programs_by_date( $startdate, $enddate );

// echo '<pre>';print_r($programs);echo '</pre>';exit;

$current_url = get_canonical_url();
$next_url = get_canonical_url() . '?' . http_build_query(array(
    'yyyy' => date('Y', mktime(0, 0, 0, $mm+1, 1, $yyyy)),
    'mm' => date('n', mktime(0, 0, 0, $mm+1, 1, $yyyy))
  ) );
$prev_url = get_canonical_url() . '?' . http_build_query(array(
    'yyyy' => date('Y', mktime(0, 0, 0, $mm-1, 1, $yyyy)),
    'mm' => date('n', mktime(0, 0, 0, $mm-1, 1, $yyyy))
  ));

get_template_part( 'partials/header' )?>

<div class="js-headerWrap">
  <?php get_template_part( 'navs/global', get_uplink_site() )?>
  <div class="l-header_sub">
    <div class="header_sub-inner">
      <h2 class="header_sub-heading">
        今月のスケジュール
        <span>MONTHLY SCHEDULE</span>
      </h2>
    </div>
  </div>
</div>

<?php get_template_part( 'partials/nav', 'schedule' )?>

<div class="l-wrap">
  <section>
  <div class="archive_shcedule-header_wrap">
    <div class="archive_shcedule-header">
      <h1 class="archive_header-heading"><?php echo date('Y.m', mktime(0, 0, 0, $mm, 1, $yyyy))?></h1>
      <div class="archive_header-nav">
        <a href="<?php echo $prev_url?>">前の月</a>
        <a href="<?php echo $current_url?>">今月</a>
        <a href="<?php echo $next_url?>">次の月</a>
      </div>
    </div>
    <ul class="list-tag">
      <li><span class="tag-film">上映</span></li>
      <li><span class="tag-events">イベント</span></li>
      <li><span class="tag-gallery">ギャラリー</span></li>
      <li><span class="tag-market">マーケット</span></li>
    </ul>
  </div>

  <?php get_template_part('partials/schedule')?>

  <div class="archive_shcedule-header">
    <h1 class="archive_header-heading"><?php echo date('Y.m', mktime(0, 0, 0, $mm, 1, $yyyy))?></h1>
    <div class="archive_header-nav">
      <a href="<?php echo $prev_url?>">前の月</a>
        <a href="<?php echo $current_url?>">今月</a>
        <a href="<?php echo $next_url?>">次の月</a>
    </div>
  </div>
</section>

<?php get_template_part( 'partials/footer' );





/*

GET /data/v1/programs[?after=日時][&before=日時][&movie_id=作品ID][&movies={true|false}]

// $theaters = get_uplink_theaters();
// echo '<pre>';print_r($theaters);echo '</pre>';exit;

// $theater = get_uplink_theater( 'shibuya' );
// echo '<pre>';print_r($theater);echo '</pre>';exit;

// $screens = get_uplink_screens();
// $screens = get_uplink_screens( 'shibuya' );
// echo '<pre>';print_r($screens);echo '</pre>';exit;

$programs = get_uplink_programs_by_date( '20181001', '20181130' );
echo '<pre>';print_r($programs);echo '</pre>';exit;

$programs = get_uplink_programs( array(
  'after' => '20181101',
  'before' => '20181130',
  'movies' => true
));
echo '<pre>';print_r($programs);echo '</pre>';exit;


echo __FILE__.' - '.__LINE__;exit;

*/