<?php

global $programs;

if ($programs):

foreach( $programs as $date => $programs_by_day ):

$time = strtotime($date);

?>

<div class="list-calendar-wrap" id="<?php echo date('Ymd', $time)?>">
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
            <p class="list-calendar-date"><?php echo date('H:i', $timeline->startTime / 1000)?><span>—<?php echo date('H:i', $timeline->endTime / 1000)?></span></p>
            <?php if($timeline->remark):?><p class="list-calendar-text"><?php echo nl2br($timeline->remark)?></p><?php endif?>
          </div>
          <p class="button-purchase <?php echo $timeline->class?>"><?php if( $timeline->limit_status !== 'over' && $timeline->time_status !== 'over' && $timeline->time_status !== 'notyet' && $timeline->time_status !== 'door' ):?><a href="<?php echo $timeline->permalink?>" target="_blank"><span><?php echo $timeline->status_label?></span></a><?php else:?><span><span><?php echo $timeline->status_label?></span></span><?php endif?></p>
        </div>
        <?php endforeach?>
      </article>
    </li><?php
    wp_reset_postdata();
    endif;

    endforeach;
    endif;
    ?>
  </ul>
</div>

<?php endforeach?>

<?php endif?>
