<?php

/*
Template Name: Schedule
 */

the_post();

$yyyy = isset($_GET['yyyy']) ? (int)$_GET['yyyy'] : date('Y');
$mm = isset($_GET['mm']) ? (int)$_GET['mm'] : date('n');
$dd = isset($_GET['dd']) ? (int)$_GET['dd'] : date('j');

$startdate = date('Ymd', mktime(0, 0, 0, $mm, $dd, $yyyy));
$enddate = date('Ymd', mktime(0, 0, 0, $mm, $dd + 14, $yyyy));

$programs = get_uplink_programs_by_date( get_uplink_site(), $startdate, $enddate );

$current_url = get_canonical_url();
$next_url = get_canonical_url() . '?' . http_build_query(array(
    'yyyy' => date('Y', mktime(0, 0, 0, $mm, $dd + 14, $yyyy)),
    'mm' => date('n', mktime(0, 0, 0, $mm, $dd + 14, $yyyy)),
    'dd' => date('j', mktime(0, 0, 0, $mm, $dd + 14, $yyyy)),
  ) );
$prev_url = get_canonical_url() . '?' . http_build_query(array(
    'yyyy' => date('Y', mktime(0, 0, 0, $mm, $dd - 14, $yyyy)),
    'mm' => date('n', mktime(0, 0, 0, $mm, $dd - 14, $yyyy)),
    'dd' => date('j', mktime(0, 0, 0, $mm, $dd - 14, $yyyy)),
  ));

get_template_part( 'partials/header' )?>

<div class="js-headerWrap">
  <?php get_template_part( 'navs/global', get_uplink_site() )?>
  <div class="l-header_sub">
    <div class="header_sub-inner">
      <h2 class="header_sub-heading">
        スケジュール
        <span>SCHEDULE</span>
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
        <a href="<?php echo $prev_url?>">過去</a>
        <a href="<?php echo $current_url?>">現在</a>
        <a href="<?php echo $next_url?>">未来</a>
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
      <a href="<?php echo $prev_url?>">過去</a>
      <a href="<?php echo $current_url?>">現在</a>
      <a href="<?php echo $next_url?>">未来</a>
    </div>
  </div>
</section>

<?php get_template_part( 'partials/footer' );