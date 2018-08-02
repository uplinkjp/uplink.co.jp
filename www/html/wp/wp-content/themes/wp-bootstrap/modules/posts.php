<?php

$q = cts_get_wp_query();

?>
<div class="l-inner">
  <ul class="c-panel c-colWrap" data-col="<?php echo get_grid_sizes(get_sub_field('grid_sizes'))?>">
    <?php
    while($q->have_posts())
    {

      $q->the_post();
      get_template_part('partials/panel');

    }?>
  </ul>
</div>
<?php

wp_reset_postdata();

?>