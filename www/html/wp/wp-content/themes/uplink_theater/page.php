<?php

the_post();

get_template_part( 'partials/header' )?>

<div class="js-headerWrap">
  <?php get_template_part( 'navs/global', get_uplink_site() )?>
  <?php get_template_part( 'navs/detail', get_post_type() )?>
</div>

<div class="l-wrap">

<div class="wysiwyg-wrap">
  <div class="l-wysiwyg">

    <?php the_content()?>

  </div>
</div>

<?php get_template_part( 'partials/footer' );