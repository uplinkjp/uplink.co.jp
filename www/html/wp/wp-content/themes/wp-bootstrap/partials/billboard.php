<?php

$image_main = get_sub_field('image_main');

if (!$image_main)
{
  $image_main = get_field('image_main');
}

?>
<div class="c-keyvisual">
  <div class="c-keyvisual-inner">
    <h1 class="c-keyvisual-heading"><?php the_sub_field('title')?></h1>
    <p class="c-keyvisual-lead"><?php the_sub_field('caption')?></p>
    <?php

      if ($links = get_field_by_lang('links')):

    ?><ul class="c-snsIcons">
      <?php foreach($links as $link):?><li><a href="<?php echo $link['url']?>"<?php if($link['is_blank']):?> target="_blank"<?php endif?>><i class="fa fa-<?php the_vendor_by_url($link['url'])?>"></i></a></li><?php endforeach?>
    </ul><?php endif?>
  </div>
  <div class="c-keyvisual-image" style="background-image:url(<?php the_img($image_main, 'large')?>)"></div>
</div>