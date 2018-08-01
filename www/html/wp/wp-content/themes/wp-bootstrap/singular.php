<?php

/* ----------------------------------------------------------

  ￼Template

---------------------------------------------------------- */

get_template_part('partials/head');

the_post();

$image_main = get_field('image_main');

?>

<div class="c-header_page">
  <h2 class="c-heading_page">PROGRESS</h2>
</div>

<div class="l-content">

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

  <section class="c-body_detail">
    <div class="c-wysiwyg">
      <?php the_content()?>
    </div>
  </section>

  </div>
</div>

<?php get_template_part('partials/foot');