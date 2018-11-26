<?php

the_post();

get_template_part( 'partials/header' )?>

<div class="js-headerWrap">
  <?php get_template_part( 'navs/global', get_uplink_site() )?>
</div>

<div class="l-wrap">

<div class="wysiwyg-wrap">
  <div class="l-wysiwyg">

    <h2>Page Not Found</h2>

  </div>
</div>

<?php get_template_part( 'partials/footer' );