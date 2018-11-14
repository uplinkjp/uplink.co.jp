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

    $unsorted_programs = (new uplinkTicket)->fetch_programs($params);

    if ($unsorted_programs)
    {

      foreach( $unsorted_programs as $program )
      {

        $programs[$program->startDate][] = $program;

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