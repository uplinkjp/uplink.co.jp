<?php get_template_part( 'partials/html_head' )?>
<body <?php echo body_class()?>>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.2";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<header class="l-header">
  <div class="header-inner">
    <h1 class="header-logo">
      <a href="<?php echo parent_url()?>">UPLINK</a>
    </h1>
    <div class="header-body">
      <h2 class="header-logo"><a href="<?php echo home_url()?>"><?php bloginfo('sitename')?></a></h2>
      <p class="header-nav_trigger"><a href="" class="js-mainNavTrigger">MENU</a></p>
    </div>
  </div>
</header>