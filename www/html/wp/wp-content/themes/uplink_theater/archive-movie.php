<?php get_template_part( 'partials/header' )?>

<div class="js-headerWrap">
  <?php get_template_part( 'navs/global', get_uplink_site() )?>
  <?php get_template_part( 'navs/detail', get_post_type() )?>
</div>

<div class="l-wrap">

<section class="l-archive">

  <?php if (!is_paged()):?>

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

  <?php

  else:

  $args = $wp_query->query_vars;
  $args = array_merge($args, array(
    'post_type'       => 'movie',
    'paged'           => $args['paged'] - 1,
    'tax_query'       => array(
      array(
        'taxonomy'    => 'movie_status',
        'field'       => 'slug',
        'terms'       => array( 'nowshowing', 'comingsoon' ),
        'operator'    => 'NOT IN',
      ),
    ),
  ));

  $q = new WP_Query( $args );

  ?>

  <div class="list_archive">

  <?php
  while( $q->have_posts() ):
  $q->the_post();

  get_template_part( 'partials/loop', 'panel' );

  endwhile?>

  </div>

  <?php endif?>

</section>

<?php wp_paginate()?>

<?php get_template_part( 'partials/footer' );