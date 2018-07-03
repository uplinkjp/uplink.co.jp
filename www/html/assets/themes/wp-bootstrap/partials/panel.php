<li>
  <a href="<?php the_permalink()?>">
    <div class="panel-image">
      <img src="<?php the_img('image_main', 'large')?>" alt="">
    </div>
    <div class="panel-text">
      <h2 class="c-text_primary"><?php the_title()?></h2>
      <p class="c-text_date"><?php echo get_the_date()?></p>
    </div>
  </a>
</li>