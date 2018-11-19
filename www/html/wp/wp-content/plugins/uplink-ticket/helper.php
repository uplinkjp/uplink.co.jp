<?php

if (!function_exists('get_uplink_programs'))
{

  function get_uplink_programs( $params = array() )
  {

    return (new uplinkTicket)->fetch_programs($params);

  }

}

if (!function_exists('get_uplink_programs_by_date'))
{

  function get_uplink_programs_by_date( $startdate, $enddate, $params = array() )
  {

    $programs = array();

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

    $programs_unsorted = (new uplinkTicket)->fetch_programs($params);

    if ($programs_unsorted)
    {

      foreach( $programs_unsorted as $program )
      {

        $programs[$program->startDate][$program->movieId]['timelines'][] = $program;

        if (!isset($posts[$program->movieId]))
        {
          $post = get_posts(array(
            // 'numberposts' => -1,
            'post_type'   => array( 'movie', 'event', 'gallery', 'market' ),
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