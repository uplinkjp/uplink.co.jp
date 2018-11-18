<?php get_template_part( 'partials/header' )?>

<?php get_template_part( 'partials/nav', get_post_type() )?>

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