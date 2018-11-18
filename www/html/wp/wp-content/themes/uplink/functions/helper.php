<?php

/* ----------------------------------------------------------

  ￼Helpers

---------------------------------------------------------- */

function get_uplink_site()
{

  return UPLINK_SITE;

}

function parent_url( $path = null )
{

  $home_url = home_url();
  $child_url = str_replace( get_uplink_site() . '.', 'www.', $home_url );
  $url = home_url($path);

  $url = str_replace( $home_url, $child_url, $url );

  return $url;

}

/**
 * Canonical URLを取得する
 *
 * @access public
 * @return void
 */
function get_canonical_url()
{

  $scheme   = isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'http';
  $paths    = pathinfo( preg_replace( '/\?.*/', '', $_SERVER['REQUEST_URI']) );
  $dir      = isset($paths['dirname']) ? trim($paths['dirname'], '/') : null;
  $file     = isset($paths['filename']) ? trim($paths['filename'], '/') : null;
  $url      = $scheme.'://'. trim($_SERVER['HTTP_HOST'], '/').'/';

  if ($dir) $url .= $dir . '/';
  if ($file) $url .= $file . '/';

  return $url;

}

/**
 * 画像のURL取得するためのヘルパーメソッド
 *
 * @param  object|string $img   ACFの画像ファイルオブジェクトか、get_field()用のキー
 * @param  string $size  画像ファイルのサイズ
 * @param  string $noimg No Image画像のURL
 * @return string        画像ファイルのURL
 */
function get_img($img, $size = null, $noimg = null)
{

  if ($noimg === null)
  {
    if ($noimg_object = get_noimg())
    {
      $noimg = $size && $noimg_object['sizes'][$size] ? $noimg_object['sizes'][$size] : $noimg_object['url'];
    }
  }

  if (is_string($img))
  {
    global $post;
    $img = get_field($img, $post->ID);
  }

  if (!$img) return $noimg;

  return $size && $img['sizes'][$size] ? $img['sizes'][$size] : $img['url'];
}

function the_img($img, $size = null, $noimg = null)
{
  echo get_img($img, $size, $noimg);
}

function get_noimg()
{
  return get_field('image_notfound', 'options') ?: '';
}

function get_weekday_class( $weekday )
{

  $class = get_weekday($weekday, array(
    'Sunday',
    'Monday',
    'Tuesday',
    'Wednesday',
    'Thursday',
    'Friday',
    'Saturday',
  ), true);

  if ($class === 'sunday') $class = 'holiday';

  return $class;

}

function get_weekday_label( $weekday )
{

  return get_weekday($weekday, array(
    '日',
    '月',
    '火',
    '水',
    '木',
    '金',
    '土',
  ));

}

function get_weekday( $weekday, $weekdays, $is_class = false )
{

  $weekday = (int)$weekday;
  $label = '';

  if (isset($weekdays[$weekday])) $label = $weekdays[$weekday];
  if ($is_class) $label = strtolower( $label );

  return $label;

}