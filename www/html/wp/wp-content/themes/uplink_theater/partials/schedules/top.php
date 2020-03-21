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
  <?php echo file_get_contents( get_alt_scheduler() )?>
  <p class="list-readmore"><a href="<?php echo home_url( 'schedule' )?>#<?php echo date('Ymd', time())?>">今月のスケジュール</a></p>
</section>