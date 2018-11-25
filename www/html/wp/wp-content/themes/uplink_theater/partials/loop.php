<article class="list_archive-item"><a href="<?php the_permalink()?>">
  <?php if( have_img() ):?><p class="list_archive-thumb" style="background-image: url(<?php echo get_the_post_thumbnail_url( null, 'large' )?>)"></p>
  <?php else:?><p class="list_archive-thumb" style="background-image: url('noimg')"></p><?php endif?>
  <h1 class="list_archive-heading"><?php the_title()?></h1>
  <p class="list_archive-text"><?php the_remark()?></p>
</a></article>