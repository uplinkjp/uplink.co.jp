<?php

/* ----------------------------------------------------------

  ￼Page

---------------------------------------------------------- */

get_template_part('partials/head');

the_post();

$show_billboard = false;
$image_main = get_field('image_main');

while (have_rows('billboard'))
{
  the_row();
  $show_billboard = get_sub_field('is_show');
  if ( $show_billboard ) get_template_part('partials/billboard');
}
?>

<div class="l-content">

  <?php if(!$show_billboard):?>
  <div class="c-header_detail">
    <?php if($image_main):?><div class="c-header_detail-image">
      <img src="<?php the_img($image_main, 'large')?>" alt="">
    </div><?php endif?>
    <div class="c-header_detail-data">
      <h1 class="c-heading_primary"><?php the_title()?></h1>
      <p class="c-text_date"><?php echo get_the_date()?></p>
      <div class="c-share_content">
        <div class="c-share_content-heading">Share on</div>
        <ul class="c-share_content-list">
          <li><a href="https://www.facebook.com/share.php?u=<?php the_permalink()?>" rel="nofollow" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
          <li><a href="https://twiter.com/share?url=<?php the_permalink()?>"><i class="fa fa-twitter"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
  <?php endif?>

  <section class="l-section">
    <?php the_content()?>
  </section>

  </div>
</div>

<?php get_template_part('partials/foot');