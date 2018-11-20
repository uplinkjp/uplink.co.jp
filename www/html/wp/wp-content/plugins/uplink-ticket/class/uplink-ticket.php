<?php

class uplinkTicket
{

  private $date_format = 'Y-m-d H:i:s',
          $access_token = null,
          $ticket_url = 'https://rsv.uplink.co.jp',
          $apiurl,
          $username,
          $password;

  public function __construct()
  {

    $this->apiurl = defined('UPLINK_TICKET_APIURL') ? UPLINK_TICKET_APIURL : '';
    $this->username = defined('UPLINK_TICKET_USERNAME') ? UPLINK_TICKET_USERNAME : 'api_test';
    $this->password = defined('UPLINK_TICKET_PASSWORD') ? UPLINK_TICKET_PASSWORD : '';
    $this->access_token = get_transient( 'uplink_ticket_access_token' );

    if (!$this->access_token) $this->auth();

  }

  public function fetch_programs( $params = array() )
  {

    $response = $this->fetch($this->endpoint( 'programs', $params ));

    if (!$response->programs) return array();

    return array_map( function($program)
    {

      $program->permalink = $this->ticket_url . '/' . $program->programId;
      $program->startDate = date('Y-m-d', (int)$program->startTime / 1000);
      $program->startDatetime = date($this->date_format, (int)$program->startTime / 1000);
      $program->endDatetime = date($this->date_format, (int)$program->endTime / 1000);

      return $program;

    }, $response->programs );

  }

  public function fetch_screens( $slug = null, $params = array() )
  {

    $theaters = $this->fetch_theaters();

    if (!$slug) return $theaters->screens;

    $theater = $this->fetch_theaters($slug);

    if (!$theater) return;

    return array_filter( $theaters->screens, function($screen) use ($theater)
    {

      return $theater->theaterId === $screen->theaterId;

    });

  }

  public function fetch_theaters( $slug = null, $params = array() )
  {

    $params = array_merge(array(
      'screens' => 'true',
    ), $params);

    $query = http_build_query($params);
    $cache_path = 'uplink_theaters_' . md5($query);

    $theaters = get_transient( $cache_path );

    if (!$theaters)
    {

      $api_endpoint = $this->endpoint( 'theaters', $params );
      $theaters = $this->fetch( $api_endpoint );
      set_transient( $cache_path, $theaters, 14 * 24 * 60 * 60 );

    }

    if (!$slug) return $theaters;

    foreach( $theaters->theaters as $theater )
    {

      if ($slug === $theater->theaterCode) return $theater;

    }

    return;

  }

  private function endpoint( $uri, $params = null )
  {

    $endpoint = $this->apiurl . '/' . $uri;

    if( $params && is_array($params) )
    {
      $endpoint .= '?' . http_build_query($params);
    }

    return $endpoint;

  }


  private function fetch( $api_endpoint, $retry = false )
  {

    $ch = curl_init();

    $args = array(
      CURLOPT_URL => $api_endpoint,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => $this->access_token,
    );

    curl_setopt_array($ch, $args);

    $response = curl_exec($ch);

    if ($this->is_error($ch) && !$retry)
    {

      $this->auth();
      return $this->fetch( $api_endpoint, true );

    }

    curl_close($ch);

    return json_decode($response);

  }

  private function is_error($ch)
  {

    return (int)curl_getinfo($ch, CURLINFO_HTTP_CODE) !== 200;

  }

  private function auth()
  {

    $ch = curl_init();

    $args = array(
      CURLOPT_URL => $this->endpoint('login'),
      CURLOPT_POST => true,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_HEADER => true,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POSTFIELDS => http_build_query( array(
        'username' => $this->username,
        'password' => $this->password,
      ) ),
    );

    curl_setopt_array($ch, $args);

    $response = curl_exec($ch);

    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);

    $headers = explode("\n", $header);

    $this->access_token = $headers;

    set_transient( 'uplink_ticket_access_token', $this->access_token );

    curl_close($ch);

    return $headers;

  }

}