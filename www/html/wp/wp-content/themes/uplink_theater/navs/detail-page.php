<?php

$title_en = get_field('title_en');

?><div class="l-header_sub">
  <div class="header_sub-inner">
    <h2 class="header_sub-heading">
      <?php the_title()?>
      <?php if( $title_en ):?><span><?php echo $title_en ?></span><?php endif?>
    </h2>
  </div>
</div>