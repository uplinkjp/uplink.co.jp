<li><a href="<?php the_permalink()?>">
  <div class="list-news-inner">
    <p class="list-news-date"><?php echo get_the_date( $d = 'Y.m.d' )?><?php if(is_new()):?><span>NEW</span><?php endif?></p>
    <p class="list-news-text"><?php the_title()?></p>
  </div>
  <?php if( have_img() ):?><p class="list-news-thumb"><img src="<?php echo get_the_post_thumbnail_url( null, 'medium' )?>" alt="<?php echo htmlspecialchars(get_title())?>" /></p><?php endif?>
  <?php /*p class="list-news-thumb"><img src="https://placehold.jp/337x177.png" alt="ハービー・山口写真展「今日は、映画を観に行く」撮影プロジェクトの被写体募集！" /></p */?>
</a></li>