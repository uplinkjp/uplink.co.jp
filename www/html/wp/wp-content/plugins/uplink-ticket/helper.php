<?php

if (!function_exists('get_uplink_programs'))
{

  function get_uplink_programs( $params = array() )
  {

    return (new uplinkTicket)->fetch_programs($params);

  }

}

if (!function_exists('get_uplink_grograms_by_movie'))
{

  function get_uplink_programs_by_post( $theater, $params = array(), $post = null )
  {

    $ut = new uplinkTicket;

    if (!$post) global $post;

    $movie_id = get_field('movie_id');
    $screen_ids = $ut->fetch_screen_ids($theater);

    if (!$movie_id) return;

    $programs = array();
    $posts = array();

    $post_types = get_post_types();

    $params['movie_id'] = $movie_id;
    $params['after'] = date('Ymd', time());
    $params['before'] = date('Ymd', strtotime('+ 10 year'));

    $programs_unsorted = $ut->fetch_programs($params);

    if ($programs_unsorted)
    {

      foreach( $programs_unsorted as $program )
      {

        if (in_array( $program->screenId, $screen_ids ))
        {
          $programs[$program->startDate][$movie_id]['timelines'][] = $program;
          $programs[$program->startDate][$movie_id]['post'] = $post;
        }

      }

    }
    // echo '<pre>';print_r($programs['2018-12-15']);echo '</pre>';exit;

    return $programs;

  }

}

if (!function_exists('get_uplink_programs_by_date'))
{

  function get_uplink_programs_by_date( $theater, $startdate, $enddate, $params = array() )
  {

    $ut = new uplinkTicket;

    $programs = array();
    $screen_ids = $ut->fetch_screen_ids($theater);
    $post_types = get_post_types();

    $params['after'] = $startdate;
    $params['before'] = $enddate;

    $yyyy = (int)substr($startdate, 0, 4);
    $mm = (int)substr($startdate, 4, 2);
    $dd = (int)substr($startdate, 6, 2);

    $time = mktime( 0, 0, 0, $mm, $dd, $yyyy);

    for( $dd; $enddate !== date('Ymd', $time); $dd++ )
    {

      $time = mktime( 0, 0, 0, $mm, $dd, $yyyy);
      $programs[date('Y-m-d', $time)] = null;

    }

    $programs_unsorted = $ut->fetch_programs($params);

    if ($programs_unsorted)
    {

      foreach( $programs_unsorted as $program )
      {

        if (in_array( $program->screenId, $screen_ids ))
        {

          $programs[$program->startDate][$program->movieId]['timelines'][] = $program;

          if (!isset($posts[$program->movieId]))
          {
            $post = get_posts(array(
              // 'numberposts' => -1,
              'post_type'   => $post_types,
              'meta_key'    => 'movie_id',
              'meta_value'  => $program->movieId
            ));

            if ($post) $post = reset($post);

            $posts[$program->movieId] = $post;
          }
          else
          {
            $post = $posts[$program->movieId];
          }

          $programs[$program->startDate][$program->movieId]['post'] = $post;
        }

      }

    }

    return $programs;

  }

}

if (!function_exists('get_uplink_theaters'))
{

  function get_uplink_theaters( $params = array() )
  {

    $theaters = (new uplinkTicket)->fetch_theaters( $params );

    return $theaters->theaters;

  }

}

if (!function_exists('get_uplink_theater'))
{

  function get_uplink_theater( $slug, $params = array() )
  {

    return (new uplinkTicket)->fetch_theaters( $slug, $params );

  }

}

if (!function_exists('get_uplink_screens'))
{

  function get_uplink_screens( $slug = null, $params = array() )
  {

    return (new uplinkTicket)->fetch_screens( $slug, $params );

  }

}