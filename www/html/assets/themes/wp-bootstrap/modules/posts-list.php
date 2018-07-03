<?php

$q = cts_get_wp_query();

?>
<div class="l-inner">
  <div class="c-align_right"><a class="c-button_text">すべてのニュースを見る</a></div>
  <div class="c-list_news">
    <ul class="c-list_news-inner">
      <?php
      while($q->have_posts())
      {

        $q->the_post();
        get_template_part('partials/list');

      }?>
    </ul>
  </div>
</div>
<?php

wp_reset_postdata();

?>