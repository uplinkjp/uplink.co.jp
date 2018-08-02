</div>

</div>

<footer class="c-gFooter">
  <?php
  if ( has_nav_menu( 'footer_links' ) )
  {
    wp_nav_menu(array(
      'theme_location'    => 'footer_links',
      'container'         => null,
      'menu_class'        => 'c-gFooter-navi_main',
      'depth'             => 2,
    ));
  }?>

  <div class="c-gFooter-manage">
    <div class="c-gFooter-manage-logo">
      <svg viewBox="0 0 213.9 61.3" style="fill: #000;width: 70px;">
        <use xlink:href="#s-logo-cinra"></use>
      </svg>
    </div>
    <?php
    if ( has_nav_menu( 'footer_links_sub' ) )
    {
      wp_nav_menu(array(
        'theme_location'    => 'footer_links_sub',
        'container'         => null,
        'menu_class'        => 'c-gFooter-navi_sub',
        'depth'             => 1,
      ));
    }?>
  </div>

  <?php

  if ($links = get_field_by_lang('links')):

  ?>
  <ul class="c-gFooter-sns">
    <?php foreach($links as $link):?><li><a href="<?php echo $link['url']?>"<?php if($link['is_blank']):?> target="_blank"<?php endif?>><i class="fa fa-<?php the_vendor_by_url($link['url'])?>"></i></a></li><?php endforeach?>
  </ul><?php endif?>
  <p class="c-gFooter-copyright"><?php the_field_by_lang('copyright')?></p>
</footer>

<?php wp_footer();