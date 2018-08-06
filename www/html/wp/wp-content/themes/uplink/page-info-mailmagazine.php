<?php /* Template Name: info/mailmagazine */?>

<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_meta.inc.php");?>
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_linkfile.inc.php");?>
  
  <!-- info str -->
  <link rel="stylesheet" href="/ex/css/info.css" type="text/css" />
  <link rel="stylesheet" href="/ex/css/info-320.css" media="screen and (max-width: 480px)" />
  <!-- info end -->
  
  <title>メールマガジン登録・解除 | UPLINK</title>
  <meta property="og:image" content="http://www.uplink.co.jp/ex/img/img_mailmagazine.jpg" />
  <meta name="Description" content="アップリンクの発行するメールマガジン「UPLINK NEWS」の登録と解除" />
  <meta name="Keywords" content="アップリンク,UPLINK,映画,ビデオ,アート,書籍,シネマ,映像,フィルム,インディペンデント" />
  
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_analytics.inc.php");?>

</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_head.inc.php");?>
<!-- pagewidth str -->
<div id="pagewidth">
  <!-- header str -->
  <header>
    <?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_header_nav.inc.php");?>
  </header>
  <!-- header end -->
  
  <!-- container str -->
  <div id="container" class="clearfix info">
    <!-- maincontents str -->
    <div id="maincontents">
      <nav id="pan">
        <p><a href="/">ホーム</a> &#8250; <em>メールマガジンの登録・解除</em> </p>
      </nav>
      
      <!-- post str -->
      <article class="clearfix post">
        <header>
          <h1>アップリンクのメールマガジン登録・解除</h1>
        </header>
        <section class="clearfix body">
          <p>「UPLINK NEWS」は、アップリンクが発行する無料のメールマガジンです。購読ご希望の方は、下記のフォームよりご登録下さい。まぐまぐ！での配信となります。</p>
          <div class="form">
            <!--登録 -->
            <form action="http://regist.mag2.com/reader/Magrdadd" method="post" target="_top" class="clearfix">
              <input type="hidden" name="MfcISAPICommand" value="MagRdAdd" />
              <input type="hidden" name="magid" value="0000054982" />
              <div class="email"><input type="email" name="rdemail" value="" /></div>
              <div class="submit"><input type="submit" value="登録する" name="SUBMIT" class="add" /></div>
            </form>
  
            <!--解除-->
            <form action="http://regist.mag2.com/reader/Magrddel" method="post" target="_top" class="clearfix">
              <input type="hidden" name="MfcISAPICommand2" value="MagRdDel" />
              <input type="hidden" name="magid" value="0000054982" />
              <div class="email"><input type="email" name="rdemail" value="" /></div>
              <div class="submit"><input type=SUBMIT value="解除する" name="SUBMIT" class="del" /></div>
            </form>
          </div>

          
          
          <p>このメールマガジンは下記の内容に分けてお届けしています。個別の登録は出来ませんのでご了承下さい。</p>

          <p><strong>UPLINK news【film】</strong><br />
          UPLINK配給/製作映画の公開情報、最新情報をいち早くお届けします</p>
          
          <p><strong>UPLINK news【factory】</strong><br />
          UPLINK FACTORYより上映、イベントのお知らせ</p>
          
          <p><strong>UPLINK news【gallery】</strong><br />
          UPLINK GALLERYより展示、イベントのお知らせ</p>
          
          <p><strong>UPLINK news【workshop】</strong><br />
          デジタル・ムービー・ワークショップ、配給サポート・ワークショップなどのお知らせ</p>
          
          <p><strong>UPLINK news【DVD】</strong><br />
          UPLINKより発売されるDVDの最新リリース情報</p>
          
          <p><strong>UPLINK news【letter】</strong><br />
          UPLINK主宰の浅井隆の雑誌でいえば編集後記的なニューズレター</p>
        </section>

      </article>
      <!-- post end -->
    </div>
    <!-- maincontents end -->
        
    <!-- sidearea str -->
    <div id="sidearea">       
      <aside class="box">
        <ul class="categorys">
          <li><a href="/info/map/">地図・お問合せ</a></li>
          <li><a href="/info/floorguide/">施設案内</a></li>
          <li><a href="/info/rental/">施設レンタル・企画募集</a></li>
          <li><a href="/info/pro/">プロサービス</a></li>
          <li><a href="/info/member/">UPLINK会員制について</a></li>
          <li><a href="/info/mailmagazine/">メールマガジン登録</a></li>
          <li><a href="/info/twitter/">Twitterアカウント</a></li>
        </ul>
      </aside>
    </div>
    <!-- sidearea end -->
  </div>
  <!-- container end -->
</div>
<!-- pagewidth end -->
<!-- footer str -->
<footer id="footer-nav">
  <?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_footer_nav.inc.php");?>
</footer>
<!-- footer end -->
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_foot.inc.php");?>
</body>
</html>