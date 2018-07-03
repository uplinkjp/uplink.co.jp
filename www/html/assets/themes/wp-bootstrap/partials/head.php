<!DOCTYPE html>
<html lang="<?php echo get_locale()?>">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <?php wp_head()?>

  <link rel="apple-touch-icon-precomposed" href="">
  <link rel="icon" sizes="16x16" href="">
  <link rel="icon" sizes="32x32" href="">
  <link rel="icon" sizes="48x48" href="">
</head>
<body <?php body_class()?>>

<div class="l-wrapper">

  <header class="c-header_global">
    <?php if(get_logo()):?><h1 class="c-header_global-logo">
      <a href="<?php echo home_url('/')?>"><?php the_logo()?></a>
    </h1><?php endif?>
    <div class="c-header_global-tools">
      <?php if ( has_nav_menu( 'drawer_nav' )):?><div class="c-navi_drawer js-drawer">
        <div class="c-navi_drawer-icon" ref="switch">
          <i></i>
        </div>
        <div class="c-navi_drawer-content" ref="content">
          <?php
          wp_nav_menu(array(
            'theme_location'    => 'drawer_nav',
            'container_class'   => 'collapse navbar-collapse',
            'menu_class'        => 'c-navi_drawer-content-list',
            'walker'            => new WP_Walker_Drawer(),
            'depth'             => 2,
          ))?>
        </div>
      </div><?php endif?>
      <?php if(use_search()):?><div class="c-header_global-search">
        <i class="fa fa-search"></i>
      </div><?php endif?>
    </div>
  </header>

<div class="l-container">

