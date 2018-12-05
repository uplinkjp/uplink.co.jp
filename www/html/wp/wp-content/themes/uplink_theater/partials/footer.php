  <section class="l-followus">
    <div class="followus-inner">
      <div class="followus-box">
        <h2 class="followus-heading">FOLLOW US</h2>
        <ul class="followus-sns">
          <li class="sns-tw"><a href="https://twitter.com/<?php the_field('twitter', 'option')?>" target="_blank">twitter</a></li>
          <li class="sns-fb"><a href="https://www.facebook.com/<?php the_field('facebook', 'option')?>" target="_blank">facebook</a></li>
          <li class="sns-in"><a href="https://www.instagram.com/<?php the_field('instagram', 'option')?>" target="_blank">instagram</a></li>
          <li class="sns-yt"><a href="https://www.youtube.com/user/<?php the_field('youtube', 'option')?>" target="_blank">youtube</a></li>
        </ul>
      </div>
      <div class="followus-box">
        <h2 class="followus-heading">SUBSCRIBE</h2>
        <a href="<?php echo parent_url('info/mailmagazine')?>" target="_blank">メールマガジン登録</a>
      </div>
    </div>
  </section>
</div>

<footer class="l-footer">
  <h2 class="footer-logo"><img src="<?php echo get_template_directory_uri()?>/img/logo-footer.png" alt="UPLINK"></h2>
  <nav class="footer-nav">
    <ul>
      <li><a href="/info/" title="会社概要" target="_blank">会社概要</a></li>
      <li><a href="/news/" title="お知らせ" target="_blank">お知らせ</a></li>
      <li><a href="/news/recruit/" title="採用" target="_blank">採用</a></li>
      <li><a href="/info/map/" title="お問合せ" target="_blank">お問合せ</a></li>
      <li><a href="/info/member/" title="アップリンク会員について" target="_blank">アップリンク会員について</a></li>
      <li><a href="/info/userpolicy/" title="アップリンク会員規約" target="_blank">アップリンク会員規約</a></li>
      <li><a href="/info/specific/" title="特定商取引法に基づく表記" target="_blank">特定商取引法に基づく表記</a></li>
      <li><a href="/info/privacypolicy/" title="個人情報の取り扱い" target="_blank">個人情報の取り扱い</a></li>
      <li><a href="/info/information_en/" title="English information" target="_blank">English information</a></li>
    </ul>
  </nav>
  <p class="footer-copy">2018 UPLINK, LTD.</p>
</footer>

<?php wp_footer()?>
</body>
</html>