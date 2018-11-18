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
function get_canonical_url( $lang = null )
{

  if (!$lang) $lang = get_locale();

  $scheme   = isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'http';
  $paths    = pathinfo( preg_replace( '/\?.*/', '', $_SERVER['REQUEST_URI']) );
  $dir      = isset($paths['dirname']) ? trim($paths['dirname'], '/') : null;
  $file     = isset($paths['filename']) ? trim($paths['filename'], '/') : null;
  $url      = $scheme.'://'. trim($_SERVER['HTTP_HOST'], '/').'/';

  if (defined('I18N_CONDUCTOR_DEFAULT_LANG'))
  {
    if ($lang && $lang !== I18N_CONDUCTOR_DEFAULT_LANG) $url .= $lang . '/';
  }

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