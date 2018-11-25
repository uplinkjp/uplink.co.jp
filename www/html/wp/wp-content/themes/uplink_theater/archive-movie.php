<?php get_template_part( 'partials/header' )?>

<div class="js-headerWrap">
  <?php get_template_part( 'navs/global', get_uplink_site() )?>
  <?php get_template_part( 'navs/detail', get_post_type() )?>
</div>

<div class="l-wrap">

<section class="l-archive">
  <h2 id="nowplaying" class="section-heading">
    公開中の作品
    <span>NOW PLAYING</span>
  </h2>

  <div class="list_archive">

    <?php

    $args = array(
      'post_type'         => 'movie',
      'posts_per_page'    => -1,
      'tax_query'         => array(
        array(
          'taxonomy'    => 'movie_status',
          'field'       => 'slug',
          'terms'       => array( 'nowshowing' ),
        ),
      ),
    );

    $q = new WP_Query( $args );

    while( $q->have_posts() ):
    $q->the_post();

    get_template_part( 'partials/loop', 'panel' );

    endwhile?>

  </div>

  <h2 id="commingsoon" class="section-heading">
    近日公開の作品
    <span>COMING SOON</span>
  </h2>

  <div class="list_archive">

    <?php

    $args = array(
      'post_type'         => 'movie',
      'posts_per_page'    => -1,
      'tax_query'         => array(
        array(
          'taxonomy'    => 'movie_status',
          'field'       => 'slug',
          'terms'       => array( 'comingsoon' ),
        ),
      ),
    );

    $q = new WP_Query( $args );

    while( $q->have_posts() ):
    $q->the_post();

    get_template_part( 'partials/loop', 'panel' );

    endwhile?>

  </div>
</section>

<?php get_template_part( 'partials/footer' );