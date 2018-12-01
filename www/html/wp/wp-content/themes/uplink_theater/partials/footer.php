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
        <a href="" target="_blank">メールマガジン登録</a>
      </div>
    </div>
  </section>
</div>

<footer class="l-footer">
  <h2 class="footer-logo"><img src="<?php echo get_template_directory_uri()?>/img/logo-footer.png" alt="UPLINK"></h2>
  <nav class="footer-nav">
    <ul>
      <li><a href="<?php echo parent_url('about')?>">UPLINKについて</a></li>
      <li><a href="<?php echo parent_url('recruit')?>">採用情報</a></li>
      <li><a href="<?php echo parent_url('map')?>">地図・お問合せ</a></li>
      <li><a href="<?php echo parent_url('term')?>">個人情報の取り扱い</a></li>
      <li><a href="">English Information</a></li>
    </ul>
  </nav>
  <p class="footer-copy">2018 UPLINK, LTD.</p>
</footer>

<?php wp_footer()?>
</body>
</html>