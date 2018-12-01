<?php get_template_part( 'partials/header' )?>

<div class="js-headerWrap">
  <?php get_template_part( 'navs/global', get_uplink_site() )?>
  <?php get_template_part( 'navs/detail', get_post_type() )?>
</div>

<div class="l-wrap">

<section class="l-archive">
  <ul class="list-news">

  <?php
  while( have_posts() ):
  the_post();

  get_template_part( 'partials/loop', 'news' );

  endwhile?>

  </ul>
</section>

<?php wp_paginate()?>

<?php get_template_part( 'partials/footer' );