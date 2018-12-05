<html>
<head>
  <meta charset="UTF-8">
  <meta name="author" content="著者情報">
  <meta name="description" content="記事の概要">
  <meta name="format-detection" content="telephone=no,address=no,email=no">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <meta property="og:site_name" content="UPLINK" />
  <meta property="og:locale" content="ja_JP" />
  <meta property="og:type" content="article" />
  <meta property="fb:app_id" content="241640882531831" />
  <meta property="og:image" content="http://www.uplink.co.jp/ex/img/uplink_img_og.gif" />
  <meta name="Description" content="東京都渋谷区。映画の配給および製作・ビデオ化などの関連事業。会社沿革、作品や直営映画館の紹介。" />
  <meta name="Keywords" content="アップリンク,UPLINK,映画,ビデオ,アート,書籍,シネマ,映像,フィルム,インディペンデント" />

  <link rel="shortcut icon" href="/ex/img/favicon.ico" />
  <link rel="apple-touch-icon" href="/ex/img/apple-touch-icon-precomposed.png" />

  <link rel="alternate" type="application/rss+xml" href="/feed">
  <link rel="stylesheet" href="/wp/wp-content/themes/uplink/css/style.min.css">

  <title>UPLINK</title>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-390570-1', 'auto');
    ga('send', 'pageview');
  </script>


</head>
<body class="theme-main type-frontpage">
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v3.2";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

<!-- メイン -->
<header class="l-header">
  <div class="header-inner">
    <h1 class="header-logo">
      <a href="/">UPLINK</a>
    </h1>
    <div class="header-body">
      <h2 class="header-logo"><a href="/">UPLINK</a></h2>
      <p class="header-nav_trigger"><a href="" class="js-mainNavTrigger">MENU</a></p>
    </div>
  </div>
</header>
<div class="js-headerWrap">
  <!-- メイン ナビ -->
<nav class="l-nav">
  <div class="nav-inner">
    <div class="nav-shibuya">
      <a href="https://shibuya.uplink.co.jp">
        <img src="/wp/wp-content/themes/uplink/img/logo-shibuya.png" width="142" alt="UPLINK 渋谷" />
        <span>CINEMA—SHIBUYA</span>
      </a>
    </div>
    <div class="nav-joji">
      <a href="https://joji.uplink.co.jp">
        <img src="/wp/wp-content/themes/uplink/img/logo-joji.png" width="165" alt="UPLINK 吉祥寺" />
        <span>CINEMA—KICHIJOJI</span>
      </a>
    </div>
    <div class="nav-wrap_pc">
      <div class="nav-related">
        <a href="http://www.uplink.co.jp/cloud">
          <img src="/wp/wp-content/themes/uplink/img/logo-cloud.png" width="118" alt="UPLINK Cloud" />
          <span>ONLINE CINEMA</span>
        </a>
      </div>
      <div class="nav-default">
        <a href="https://rsv.uplink.co.jp" target="_blank">
          <p>アップリンク会員について</p>
          <span>MEMBERSHIP</span>
        </a>
      </div>
    </div>
  </div>
  <div class="form-googlesearch">
    <form action="/search">
      <p class="form-googlesearch-text"><input type="text" name="q" placeholder="Googleカスタム検索" /></p>
      <p class="form-googlesearch-submit"><input type="submit" /></p>
    </form>
  </div>
</nav>
</div>

<div class="l-wrap">
    <section>
    <h2 class="section-heading">
      お知らせ
      <span>NEWS</span>
    </h2>

<?php

$news_query = new WP_Query( array(
  'post_type'         => 'news',
  'posts_per_page'    => 10,
));

if ($news_query->have_posts()):
?>

<ul class="list-news">

  <?php

  while( $news_query->have_posts() ):

  $news_query->the_post();

  ?><li><a href="">
    <div class="list-news-inner">
      <p class="list-news-date"><?php echo get_the_date( $d = 'Y.m.d' )?><?php if(is_new()):?><span>NEW</span><?php endif?></p>
      <p class="list-news-text"><?php the_title()?></p>
    </div>
  </a></li><?php endwhile?>

</ul>
    <p class="list-readmore"><a href="/news">お知らせ一覧</a></p>
  </section>
<?php endif?>

    <section>
    <h2 class="section-heading">
      関連サービス
      <span>RELATED SERVICES</span>
    </h2>
    <ul class="list-related">
      <li>
        <div class="nav-related">
          <a href="https://plango.uplink.co.jp" target="_blank">
            <img src="/wp/wp-content/themes/uplink/img/logo-plango.png" width="75" alt="PLAN GO">
            <span>CROWDFUNDING</span>
          </a>
        </div>
      </li>
      <li>
        <div class="nav-related">
          <a href="/workshop">
            <p>配給・デジタルムービーを学ぶ</p>
            <span>WORKSHOP</span>
          </a>
        </div>
      </li>
      <li>
        <div class="nav-related">
          <a href="/film/">
            <p>アップリンクの配給する映画</p>
            <span>FILMS</span>
          </a>
        </div>
      </li>
      <li>
        <div class="nav-related">
          <a href="/film/rental/">
            <p>自主上映のご案内</p>
            <span>FILM RENTAL</span>
          </a>
        </div>
      </li>
      <li>
        <div class="nav-related">
          <a href="/info/pro/">
            <p>DCP制作サービス</p>
            <span>PRO SERVICE</span>
          </a>
        </div>
      </li>
      <li>
        <div class="nav-related">
          <a href="http://www.webdice.jp/" target="_blank">
            <img src="/wp/wp-content/themes/uplink/img/logo-webdice.png" width="83" alt="WEB DICE">
            <span>WEB MAGAZINE</span>
          </a>
        </div>
      </li>
      <li>
        <div class="nav-related">
          <a href="/tabela/">
            <img src="/wp/wp-content/themes/uplink/img/logo-tabela.png" width="99" alt="Tabela">
            <span>CAFE & RESTAURANT</span>
          </a>
        </div>
      </li>
    </ul>
  </section>
  <section class="l-followus">
  <div class="followus-inner">
    <div class="followus-box">
      <h2 class="followus-heading">FOLLOW US</h2>
      <ul class="followus-sns">
        <li class="sns-tw"><a href="https://twitter.com/uplink_jp" target="_blank">twitter</a></li>
        <li class="sns-fb"><a href="https://www.facebook.com/uplink.co.jp" target="_blank">facebook</a></li>
        <li class="sns-in"><a href="https://www.instagram.com/uplink_film/" target="_blank">instagram</a></li>
        <li class="sns-yt"><a href="https://www.youtube.com/user/diceuplink" target="_blank">youtube</a></li>
      </ul>
    </div>
    <div class="followus-box">
      <h2 class="followus-heading">SUBSCRIBE</h2>
      <a href="/info/mailmagazine/">メールマガジン登録</a>
    </div>
  </div>
</section>
</div>

<footer class="l-footer">
  <h2 class="footer-logo"><img src="/wp/wp-content/themes/uplink/img/logo-footer.png" alt="UPLINK"></h2>
  <nav class="footer-nav">
    <ul>
      <li><a href="/info/">UPLINKについて</a></li>
      <li><a href="/news/recruit/">採用情報</a></li>
      <li><a href="/info/map/">地図・お問合せ</a></li>
      <li><a href="/info/privacypolicy/">個人情報の取り扱い</a></li>
      <li><a href="/info/information_en/">English Information</a></li>
    </ul>
  </nav>
  <p class="footer-copy">2018 UPLINK, LTD.</p>
</footer>

<script src="/wp/wp-content/themes/uplink/js/libs/jquery.min.js"></script>
<script src="/wp/wp-content/themes/uplink/js/plugins.min.js"></script>
<script src="/wp/wp-content/themes/uplink/js/script.min.js"></script>
</body>
</html>
