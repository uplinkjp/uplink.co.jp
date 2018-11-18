<?php get_template_part( 'partials/header' )?>

<?php get_template_part( 'partials/nav', get_post_type() )?>

<div class="l-wrap">

<section class="l-archive">
  <h2 id="nowplaying" class="section-heading">
    公開中の作品
    <span>NOW PLAYING</span>
  </h2>

  <div class="list_archive">

    <?php
    while( have_posts() ):
    the_post();

    get_template_part( 'partials/loop', 'panel' );

    endwhile?>

  </div>

  <h2 id="commingsoon" class="section-heading">
    近日公開の作品
    <span>COMMING SOON</span>
  </h2>

  <div class="list_archive">

    <?php
    while( have_posts() ):
    the_post();

    get_template_part( 'partials/loop', 'panel' );

    endwhile?>

  </div>
</section>

<?php get_template_part( 'partials/footer' );