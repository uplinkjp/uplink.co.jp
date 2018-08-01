<?php

/* ----------------------------------------------------------

  ￼Archive

---------------------------------------------------------- */

get_template_part('partials/head');

$term_key = get_termkey();

$show_billboard = false;

?>

  <?php

  // while (have_rows('billboard', $term_key))
  // {
  //   the_row($term_key);
  //   $show_billboard = get_sub_field('is_show', $term_key);
  //   var_dump($show_billboard);exit;
  //   if ( $show_billboard ) get_template_part('partials/billboard');
  // }
  ?>

<section class="l-section">
  <div class="l-inner">
    <ul class="c-panel c-colWrap" data-col="3-1-1">
      <?php

      while( have_posts() )
      {

        the_post();
        get_template_part('partials/panel');

      }?>
    </ul>
  </div>
</section>

<?php get_template_part('partials/foot');