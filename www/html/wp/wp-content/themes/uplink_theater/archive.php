<?php get_template_part( 'partials/header' )?>

<div class="js-headerWrap">
  <?php get_template_part( 'navs/global', get_uplink_site() )?>
  <?php get_template_part( 'navs/detail' )?>
</div>

<div class="l-wrap">

<section class="l-archive">
  <div class="list_archive">

  <?php
  while( have_posts() ):
  the_post();

  get_template_part( 'partials/loop', 'panel' );

  endwhile?>

  </div>
</section>

<?php get_template_part( 'partials/footer' );