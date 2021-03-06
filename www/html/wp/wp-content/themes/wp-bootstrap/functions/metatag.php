<?php

/* ----------------------------------------------------------

  ￼Metatags

---------------------------------------------------------- */

add_theme_support( 'title-tag' );

if (class_exists('MetatagBuilder'))
{

  add_action( 'metatag_builder_init', array( 'WP_Metatag', 'set' ));

}

class WP_Metatag
{
  function set()
  {

    $sep = ' - ';

    $meta = array(
      'sitename'          => get_bloginfo( 'sitename' ),
      'title'             => get_bloginfo( 'sitename' ),
      'type'              => 'article',
      'description'       => self::get_i18n_field('meta_description', 'option'),
      'og_description'    => self::get_i18n_field('og_description', 'option'),
      'image'             => get_template_directory_uri() . '/img/ogimage.png',
      'fb:app_id'         => null,
      'twitter:site'      => null,
    );

    if ($twitter = get_field('twitter', 'option'))
    {
      $meta['twitter:site'] = '@' . $twitter;
    }

    if ($fb_app_id = get_field('fb_app_id', 'option'))
    {
      $meta['fb:app_id'] = $fb_app_id;
    }

    if (is_page())
    {
      if (!is_front_page() && !is_home())
      {
        $meta['title'] = get_the_title() . $sep . $meta['sitename'];
      }
      $meta['description'] = self::get_i18n_field( 'meta_description' ) ? : $meta['description'];
      $meta['og_description'] = self::get_i18n_field( 'meta_description' ) ? : $meta['og_description'];
      $meta['type'] = 'website';
    }

    if (is_category())
    {
      $term = get_queried_object();
      if ($term)
      {
        $meta['title'] = $term->name . $sep . get_bloginfo( 'sitename' );
        $meta['description'] = self::get_i18n_field( 'meta_description', 'term_' . $term->term_id ) ?: $meta['description'];
        $meta['og_description'] = self::get_i18n_field( 'meta_description', 'term_' . $term->term_id ) ?: $meta['og_description'];
      }
    }

    if (is_single())
    {
      $meta['title'] = get_the_title() . $sep . get_bloginfo( 'sitename' );
      $meta['description'] = self::get_i18n_field( 'meta_description' ) ? : $meta['description'];
      $meta['og_description'] = self::get_i18n_field( 'meta_description' ) ? : $meta['og_description'];
      if ($image = get_field('image_main')) $meta['image'] = get_img($image, 'large');
    }

    $meta = apply_filters( 'cts_set_metatags', $meta );

    set_meta_descriptions( $meta['description'] ?: '');

    set_meta_data('og:title', $meta['title'], 'property');
    set_meta_data('og:type', $meta['type'], 'property');
    set_meta_data('og:image', $meta['image'], 'property');
    set_meta_data('og:site_name', $meta['sitename'], 'property');
    set_meta_data('og:url', get_canonical_url(), 'property');
    set_meta_data('og:description', $meta['description'] ?: '', 'property');
    if ($meta['fb:app_id']) set_meta_data('fb:app_id', $meta['fb:app_id'], 'property');

    set_meta_data('twitter:card', 'summary_large_image');
    set_meta_data('twitter:title', $meta['sitename']);
    set_meta_data('twitter:image', $meta['image']);
    if ($meta['twitter:site']) set_meta_data('twitter:site', $meta['twitter:site']);
    set_meta_data('twitter:description', $meta['description'] ?: '');
    set_meta_data('twitter:url', get_canonical_url());

  }

  function get_i18n_field( $key, $id = null )
  {
    return function_exists('get_i18n_field') ? get_i18n_field( $key, $id ) : get_field( $key, $id );
  }

}

