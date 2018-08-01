<?php

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

/* ----------------------------------------------------------

  ￼i18n

---------------------------------------------------------- */

if (!function_exists('___'))
{
  /**
   * __()のヘルパーメソッド。
   * CTS_PROJECT_NAMEに正しい値を入力しておくこと
   *
   * @param  string $text 翻訳したい文字列
   * @return string       翻訳結果
   */
  function ___($text)
  {
    return __($text, CTS_PROJECT_NAME);
  }
}

if (!function_exists('__e'))
{
  /**
   * _e()のヘルパーメソッド。
   * CTS_PROJECT_NAMEに正しい値を入力しておくこと
   *
   * @param  string $text 翻訳したい文字列
   * @return string       翻訳結果
   */
  function __e($text)
  {
    echo __($text, CTS_PROJECT_NAME);
  }
}

if (!function_exists('__x'))
{
  /**
   * _x()のヘルパーメソッド。
   * CTS_PROJECT_NAMEに正しい値を入力しておくこと
   *
   * @param  string $text 翻訳したい文字列
   * @param  string $context コンテクスト
   * @return string       翻訳結果
   */
  function __x($text, $context)
  {
    return _x($text, $context, CTS_PROJECT_NAME);
  }
}


if (!function_exists('get_logo'))
{

  function get_logo( $slug = null )
  {
    if ($slug) $slug = '_' . $slug;
    
    $logo = '';
    if ($logos = get_field_by_lang('logo' . (string)$slug))
    {
      if ( isset($logos['svg']) )
      {
        $logo = $logos['svg'];
      }
    }

    return $logo;

  }

  function the_logo( $slug = null )
  {
    echo get_logo( $slug );
  }

}


function get_field_by_lang( $key, $lang = null )
{

  if (!$lang) $lang = get_locale();

  $lang_obj = get_term_by( 'slug', $lang, 'lang' );

  $value = get_field( $key, get_termkey( $lang_obj ));

  return $value ?: get_field( $key, 'option' );

}


function the_field_by_lang( $key, $lang = null )
{
  echo get_field_by_lang( $key, $lang );
}

if (!function_exists('get_vendor_by_url'))
{
  function get_vendor_by_url($url)
  {

    if (!$url) return '';
    $uris = parse_url($url);

    if (!isset($uris['host'])) return '';

    $vendor = 'globe';
    $host = strtolower($uris['host']);

    if (preg_match('/twitter\.com/', $host)) $vendor = 'twitter';
    if (preg_match('/facebook\.com/', $host)) $vendor = 'facebook';
    if (preg_match('/instagram\.com/', $host)) $vendor = 'instagram';
    if (preg_match('/youtube\.com/', $host)) $vendor = 'youtube';
    if (preg_match('/github\.com/', $host)) $vendor = 'github';
    if (preg_match('/line\.me/', $host)) $vendor = 'line';
    if (preg_match('/soundcloud\.com/', $host)) $vendor = 'soundcloud';

    return $vendor;

  }

  function the_vendor_by_url($url)
  {
    echo get_vendor_by_url($url);
  }
}


function get_grid_sizes($grid_sizes)
{

  $grid_sizes = array_merge(array(
    'pc' => 3,
    'tb' => 2,
    'sp' => 1,
  ), $grid_sizes);

  return implode('-', $grid_sizes);

}


function get_termkey( $term = null )
{

  if (!$term) $term = get_queried_object();

  return !$term ? null : $term->taxonomy . '_' . $term->term_id;

}