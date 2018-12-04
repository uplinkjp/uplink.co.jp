<?php

global $programs;

if ($programs):

foreach( $programs as $date => $programs_by_day ):

$time = strtotime($date);

?>

<div class="list-calendar-wrap">
  <div class="list-calendar-header is-<?php echo get_weekday_class( date('w', $time) )?>">
    <p class="list-calendar-header-inner"><?php echo date('m.d', $time)?><span><?php echo get_weekday_label(date('w', $time))?></span></p>
  </div>
  <ul class="list-calendar">
    <?php
    if( $programs_by_day ):
    foreach($programs_by_day as $movie_id => $program):

    $post = $program['post'];

    if ($post):
    setup_postdata($post);
    ?>
    <li class="tagged-<?php echo get_uplink_post_class()?>">
      <article>
        <h1 class="list-calendar-heading"><a href="<?php the_permalink()?>"><?php the_title()?></a></h1>
        <?php foreach( $program['timelines'] as $timeline ):?>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date"><?php echo date('H:i', $timeline->startTime / 1000 + (9 * 60 * 60))?><span>—<?php echo date('H:i', $timeline->endTime / 1000 + (9 * 60 * 60))?></span></p>
            <?php if($timeline->remark):?><p class="list-calendar-text"><?php echo nl2br($timeline->remark)?></p><?php endif?>
          </div>
          <p class="button-purchase is-<?php echo $timeline->class?>"><a href="<?php echo $timeline->permalink?>" target="_blank"><span><?php echo $timeline->status_label?></span></a></p>
        </div>
        <?php endforeach?>
      </article>
    </li><?php
    wp_reset_postdata();
    endif;

    endforeach;
    endif;
    ?>
    <?php /* li class="tagged-gallery">
      <article>
        <h1 class="list-calendar-heading">レディ・バード</h1>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date">10:15<span>—11:53</span></p>
            <p class="list-calendar-text">【サービスデー】</p>
          </div>
          <p class="button-purchase is-red"><a href=""><span>販売終了</span></a></p>
        </div>
      </article>
    </li>
    <li class="tagged-market">
      <article>
        <h1 class="list-calendar-heading">カランコエの花</h1>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date">10:15<span>—11:53</span></p>
            <p class="list-calendar-text">【予告なし】【5分前開場】【上映後舞台挨拶】登壇者：有佐、手島実優、石本径代、中川駿</p>
          </div>
          <p class="button-purchase is-yellow1"><a href=""><span>購入する</span></a></p>
        </div>
      </article>
    </li */?>
  </ul>
</div>

<?php endforeach?>

<?php endif?>




<?php /*

<div class="list-calendar-wrap">
  <div class="list-calendar-header is-saturday">
    <p class="list-calendar-header-inner">09.01<span>土</span></p>
  </div>
  <ul class="list-calendar">
    <li class="tagged-film">
      <article>
        <h1 class="list-calendar-heading">かみさまとのやくそく～あなたは親を選んで生まれてきた～</h1>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date">10:15<span>—11:53</span></p>
            <p class="list-calendar-text">【予告なし】【上映後舞台挨拶】登壇者：加藤よしひろ(加藤姉妹父親)</p>
          </div>
        </div>
      </article>
    </li>
    <li class="tagged-events">
      <article>
        <h1 class="list-calendar-heading">マガディーラ 勇者転生</h1>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date">10:15<span>—11:53</span></p>
            <p class="list-calendar-text">【サービスデー】</p>
          </div>
        </div>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date">10:15<span>—11:53</span></p>
            <p class="list-calendar-text">【サービスデー】</p>
          </div>
          <p class="button-purchase is-yellow2"><a href=""><span>当日窓口</span></a></p>
        </div>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date">10:15<span>—11:53</span></p>
            <p class="list-calendar-text">【サービスデー】</p>
          </div>
          <p class="button-purchase is-green2"><a href=""><span>購入する</span></a></p>
        </div>
      </article>
    </li>
    <li class="tagged-gallery">
      <article>
        <h1 class="list-calendar-heading">レディ・バード</h1>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date">10:15<span>—11:53</span></p>
            <p class="list-calendar-text">【サービスデー】</p>
          </div>
          <p class="button-purchase is-red"><a href=""><span>販売終了</span></a></p>
        </div>
      </article>
    </li>
    <li class="tagged-market">
      <article>
        <h1 class="list-calendar-heading">カランコエの花</h1>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date">10:15<span>—11:53</span></p>
            <p class="list-calendar-text">【予告なし】【5分前開場】【上映後舞台挨拶】登壇者：有佐、手島実優、石本径代、中川駿</p>
          </div>
          <p class="button-purchase is-yellow1"><a href=""><span>購入する</span></a></p>
        </div>
      </article>
    </li>
  </ul>
</div>
<div class="list-calendar-wrap">
  <div class="list-calendar-header is-holiday">
    <p class="list-calendar-header-inner">09.01<span>日</span></p>
  </div>
  <ul class="list-calendar">
    <li class="tagged-film">
      <article>
        <h1 class="list-calendar-heading">かみさまとのやくそく～あなたは親を選んで生まれてきた～</h1>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date">10:15<span>—11:53</span></p>
            <p class="list-calendar-text">【予告なし】【上映後舞台挨拶】登壇者：加藤よしひろ(加藤姉妹父親)</p>
          </div>
          <p class="button-purchase is-yellow2"><a href=""><span>購入する</span></a></p>
        </div>
      </article>
    </li>
    <li class="tagged-film">
      <article>
        <h1 class="list-calendar-heading">映画『聖なる呼吸：ヨガのルーツに出会う旅』DVD発売記念トーク＋ヨガ体験付き上映会（ゲスト：柳生直子先生）</h1>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date">10:15<span>—11:53</span></p>
            <p class="list-calendar-text">【ダイジェスト版上映】上映後特典映像上映+トーク＆アーサナミニレクチャーあり（ゲスト：柳生直子先生）</p>
          </div>
          <p class="button-purchase is-red"><a href=""><span>購入する</span></a></p>
        </div>
      </article>
    </li>
    <li class="tagged-film">
      <article>
        <h1 class="list-calendar-heading">レディ・バード</h1>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date">10:15<span>—11:53</span></p>
            <p class="list-calendar-text">【予告なし】</p>
          </div>
          <p class="button-purchase is-green1"><a href=""><span>購入する</span></a></p>
        </div>
      </article>
    </li>
  </ul>
</div>
<div class="list-calendar-wrap">
  <div class="list-calendar-header">
    <p class="list-calendar-header-inner">09.02<span>月</span></p>
  </div>
  <ul class="list-calendar">
    <li class="tagged-film">
      <article>
        <h1 class="list-calendar-heading">かみさまとのやくそく～あなたは親を選んで生まれてきた～</h1>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date">10:15<span>—11:53</span></p>
            <p class="list-calendar-text">【予告なし】【上映後舞台挨拶】登壇者：加藤よしひろ(加藤姉妹父親)</p>
          </div>
          <p class="button-purchase is-yellow2"><a href=""><span>購入する</span></a></p>
        </div>
      </article>
    </li>
    <li class="tagged-film">
      <article>
        <h1 class="list-calendar-heading">映画『聖なる呼吸：ヨガのルーツに出会う旅』DVD発売記念トーク＋ヨガ体験付き上映会（ゲスト：柳生直子先生）</h1>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date">10:15<span>—11:53</span></p>
            <p class="list-calendar-text">【ダイジェスト版上映】上映後特典映像上映+トーク＆アーサナミニレクチャーあり（ゲスト：柳生直子先生）</p>
          </div>
          <p class="button-purchase is-red"><a href=""><span>購入する</span></a></p>
        </div>
      </article>
    </li>
    <li class="tagged-film">
      <article>
        <h1 class="list-calendar-heading">レディ・バード</h1>
        <div class="list-calendar-inner">
          <div class="list-calendar-information">
            <p class="list-calendar-date">10:15<span>—11:53</span></p>
            <p class="list-calendar-text">【予告なし】</p>
          </div>
          <p class="button-purchase is-green1"><a href=""><span>購入する</span></a></p>
        </div>
      </article>
    </li>
  </ul>
</div>

*/?>