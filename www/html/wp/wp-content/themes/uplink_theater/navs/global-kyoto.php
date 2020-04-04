<nav class="l-nav">
  <div class="nav-inner">
    <div class="nav-wrap">
      <div class="nav-film">
        <a href="<?php echo home_url('movie')?>">
          <p>上映</p>
          <span>MOVIES</span>
        </a>
      </div>
      <div class="nav-events">
        <a href="<?php echo home_url('event')?>">
          <p>イベント</p>
          <span>EVENTS</span>
        </a>
      </div>
    </div>
    <div class="nav-wrap">
      <div class="nav-gallery">
        <a href="<?php echo home_url('gallery')?>">
          <p>ギャラリー</p>
          <span>GALLERY</span>
        </a>
      </div>
      <div class="nav-market">
        <a href="<?php echo home_url('market')?>">
          <p>マーケット</p>
          <span>MARKET</span>
        </a>
      </div>
      <div class="nav-map">
        <a href="<?php echo home_url('map')?>">
          <p>地図</p>
          <span>MAP</span>
        </a>
      </div>
    </div>
    <div class="nav-wrap-child">
      <div class="nav-default">
        <a href="<?php echo home_url('facility')?>">
          <p>施設案内</p>
          <span>FACILITY</span>
        </a>
      </div>
      <div class="nav-default">
        <a href="<?php echo home_url('pricing')?>">
          <p>料金・割引</p>
          <span>PRICING</span>
        </a>
      </div>
      <div class="nav-default">
        <a href="<?php echo home_url('rental')?>">
          <p>施設レンタル</p>
          <span>RENTAL</span>
        </a>
      </div>
      <div class="nav-default nav-col-2">
        <a href="<?php echo home_url('member')?>">
          <p>アップリンク会員について</p>
          <span>MEMBERSHIP</span>
        </a>
      </div>
      <div class="nav-login nav-col-1">
        <a href="https://uplinkkyoto.sboticket.net/member/login" target="_blank">
          <p>ログイン</p>
          <span>LOGIN</span>
        </a>
      </div>
    </div>
  </div>
  <?php get_template_part('partials/search')?>
</nav>