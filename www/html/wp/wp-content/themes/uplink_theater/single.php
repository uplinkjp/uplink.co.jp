<?php

the_post();

$programs = get_uplink_programs_by_post( get_uplink_site() );
$tags = get_the_terms( $post, 'post_tag' );

get_template_part( 'partials/header' )?>

<div class="js-headerWrap">
<?php get_template_part( 'navs/global', get_uplink_site() )?>
<?php get_template_part( 'navs/detail', get_post_type() )?>
</div>

<div class="l-wrap">

<article>
  <div class="single-header">
    <div class="single-header-inner">
      <h1 class="single-header-heading"><?php the_title()?></h1>
      <?php if( $date_description = get_field('date_description') ):?><p class="single-header-text"><?php echo $date_description?></p><?php endif?>
      <?php if( $tags ):?><div class="single-header-tag">
        <?php foreach( $tags as $tag ):?><a href="<?php echo get_term_link($tag)?>">#<?php echo $tag->name?></a><?php endforeach?>
      </div><?php endif?>
      <div class="fb-like" data-href="<?php the_permalink()?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
    </div>
    <?php if( have_img() ):?><div class="single-header-thumb">
      <span>
        <?php the_post_eyecache( 'large', array( 'width' => null, 'height' => null ) )?>
      </span>
      <?php if( $caption_with_img = get_field('caption_with_img') ):?><p class="single-header-caption"><?php echo $caption_with_img?></p><?php endif?>
    </div><?php endif?>
  </div>

  <div class="single-header-infornation">
    <?php if( get_post_type() === 'movie' ):?><div class="single-information">
      <h4>日時</h4>
      <p><?php the_remark()?></p>
    </div><?php endif?>
    <?php if( $price = get_field('price') ):?><div class="single-information">
      <h4>料金</h4>
      <p><?php echo $price?></p>
    </div><?php endif?>
    <?php if( $minutes = get_field('minutes') ):?><div class="single-information">
      <h4>作品分数</h4>
      <p><?php echo $minutes?></p>
    </div><?php endif?>
    <?php if( have_rows('links') ):?><div class="single-information">
      <h4>リンク</h4>
      <div class="single-linkList">
        <?php
        while( have_rows('links') ):

        the_row();

        $url = get_sub_field('url');
        $label = get_sub_field('label');
        if (!$label) $label = $url;

        ?><a href="<?php echo $url?>" target="_blank"><?php echo $label?></a><?php endwhile?>
      </div>
    </div><?php endif?>
  </div>

</article>

<?php if( $programs ):?><section>
  <h2 class="section-heading">
    スケジュールとチケット
    <span>SCHEDULE & TICKETS</span>
  </h2>
  <?php get_template_part( 'partials/schedule' )?>
</section><?php endif?>

<?php /*

<section>
  <h2 class="section-heading">
    関連イベント
    <span>EVENTS</span>
  </h2>
  <div class="wysiwyg-wrap">
    <div class="l-wysiwyg">
      <?php the_content()?>
    </div>
  </div>
</section>

*/?>

<?php if( $post->post_content ):?>
<section>
  <h2 class="section-heading">
    作品紹介
    <span>ABOUT THE MOVIE</span>
  </h2>
  <div class="wysiwyg-wrap">
    <div class="l-wysiwyg">
      <?php the_content()?>
    </div>
  </div>
</section>
<?php endif?>

<?php /*

<section>
  <h2 class="section-heading">
    予告編
    <span>TRAILER</span>
  </h2>
  <div class="wysiwyg-wrap">
    <div class="l-wysiwyg">
      <div class="youtube">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/asggt9WQtx0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</section>

*/?>

<?php get_template_part( 'partials/footer' );