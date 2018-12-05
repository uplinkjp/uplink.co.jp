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

<script>
(function() {
var cx = '011475598064287174110:tkrdki_mq-m';
var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
  '//www.google.com/cse/cse.js?cx=' + cx;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
})();
</script>

<?php get_template_part( 'partials/footer' );