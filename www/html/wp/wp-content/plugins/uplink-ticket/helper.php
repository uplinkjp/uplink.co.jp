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

    return $programs;

  }

}

if (!function_exists('get_uplink_programs_by_date'))
{

  function get_uplink_programs_by_date( $theater, $startdate, $enddate, $params = array() )
  {

    $ut = new uplinkTicket;

    $cache_path = 'schedule_' . $theater . '_' . $startdate . '-' . $enddate . '_' . md5(http_build_query($params));

    $programs = get_transient( $cache_path );

    if (!$programs)
    {

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

        $programs[date('Y-m-d', $time)] = null;
        $time = mktime( 0, 0, 0, $mm, $dd, $yyyy);

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

              $post_cache_path = 'post_by_movieid_' . $program->movieId;
              $post = get_transient( $post_cache_path );

              if( !$post )
              {

                $post_id = get_uplink_post_id( $program->movieId );

                if (!$post_id) continue;

                $post = get_post($post_id);

                if ($post)
                {
                  set_transient( $post_cache_path, $post, 30 * 60);
                }
              }

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

      set_transient( $cache_path, $programs, 5 * 60 );

    }

    return $programs;

  }

}

if (!function_exists('get_uplink_post_id'))
{

  function get_uplink_post_id( $movie_id )
  {

    global $wpdb;
    return $wpdb->get_var( 'SELECT post_id FROM ' . TICKET_INDEX_TABLE . ' JOIN ' . $wpdb->posts . ' ON ' . TICKET_INDEX_TABLE . '.post_id = ' . $wpdb->posts . '.ID WHERE ' . TICKET_INDEX_TABLE . '.movie_id = ' . $movie_id . ' AND ' . $wpdb->posts . '.post_status = "publish" ORDER BY ' . $wpdb->posts . '.post_date DESC' );

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