<?php

if( have_rows('slides') ):

?><section class="l-slider">
  <div class="js-slick slider-inner">
    <?php

    while( have_rows('slides') ):

    the_row();

    $slide_image = get_sub_field('image');

    ?><div><a href="<?php the_sub_field('url')?>">
      <p class="slider-toptext"><span><?php the_sub_field('date_description')?></span></p>
      <img src="<?php the_img($slide_image, 'large')?>">
      <p class="slider-bottomtext"><span><?php the_sub_field('caption')?></span></p>
    </a></div><?php endwhile?>
  </div>
</section>
<?php endif?>