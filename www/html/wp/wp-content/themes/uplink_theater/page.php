<?php

the_post();

get_template_part( 'partials/header' )?>

<?php get_template_part( 'partials/nav' )?>

<div class="l-wrap">

<div class="wysiwyg-wrap">
  <div class="l-wysiwyg">

    <?php the_content()?>

  </div>
</div>

<?php get_template_part( 'partials/footer' );