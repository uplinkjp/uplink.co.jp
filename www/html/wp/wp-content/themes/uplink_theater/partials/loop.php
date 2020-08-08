<article class="list_archive-item"><a href="<?php the_permalink()?>">
  <?php if( have_img() ):?><p class="list_archive-thumb" style="background-image: url(<?php echo get_the_post_thumbnail_url( null, 'large' )?>)"></p>
  <?php else:?><p class="list_archive-thumb" style="background-image: url('<?php echo get_template_directory_uri()?>/img/no-image.png')"></p><?php endif?>
  <h1 class="list_archive-heading">
    <?php the_title()?>
    <?php if( $original_title = get_field('original_title') ):?><small class="original-title"><?php echo $original_title?></small><?php endif?>
  </h1>
  <p class="list_archive-text"><?php the_field('date_description')?></p>
</a></article>