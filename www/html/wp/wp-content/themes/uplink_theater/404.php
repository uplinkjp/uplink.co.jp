<?php

the_post();

get_template_part( 'partials/header' )?>

<div class="js-headerWrap">
  <?php get_template_part( 'navs/global', get_uplink_site() )?>
  <?php get_template_part( 'navs/detail', '404' )?>
</div>

<div class="l-wrap">

<div class="wysiwyg-wrap">
  <div class="l-wysiwyg">

    <p>お探しのページは見つかりませんでした</p>
    <p>ページ上部のメニュー、または下部のメニューから改めて検索してください</p>

  </div>
</div>

<?php get_template_part( 'partials/footer' );