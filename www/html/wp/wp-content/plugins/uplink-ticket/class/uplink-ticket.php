<?php

class uplinkTicket
{

  private $date_format = 'Y-m-d H:i:s',
          $access_token = null,
          $ticket_url,
          $apiurl,
          $username,
          $password;

  public function __construct()
  {

    $this->ticket_url = defined('UPLINK_TICKET_URL') ? UPLINK_TICKET_URL : 'https://rsv.uplink.co.jp';
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

      $program->permalink = $this->ticket_url . '/program/' . $program->programId;
      $program->startDate = date('Y-m-d', (int)$program->startTime / 1000);
      $program->startDatetime = date($this->date_format, (int)$program->startTime / 1000);
      $program->endDatetime = date($this->date_format, (int)$program->endTime / 1000);
      $program->sale_status = $this->sale_status( $program );
      $program->time_status = $this->time_status( $program );
      $program->limit_status = $this->limit_status( $program );
      $program->class = $this->status_class( $program );
      $program->status_label = $this->status_label( $program );

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

  public function fetch_screen_ids( $slug = null, $params = array() )
  {

    $screen_ids = array();

    $screens = $this->fetch_screens( $slug, $params );

    if ($screens)
    {
      $screen_ids = wp_list_pluck( $screens, 'screenId', true );
    }

    return $screen_ids;

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

  private function sale_status( $program )
  {

    return (int)$program->onsiteMemberSalesEnabled === 1;
  }

  private function time_status( $program )
  {

    $starttime = $program->startTime / 1000;

    if ( $program->onlineMemberSalesStartTime > time() * 1000 && $program->onlineNonMemberSalesStartTime > time() * 1000 ) return 'notyet';

    if ( $starttime < strtotime('+30 minutes') && $starttime > time() )
    {
      return 'door';
    }
    elseif( $starttime < time() || $program->onlineNonMemberSalesEndTime < microtime() )
    {
      return 'over';
    }

    return 'on';

  }

  private function status_label( $program )
  {

    /*
    「購入する」　上映の30分前まで
    「当日窓口」　上映の29分前～上映開始まで
    「販売終了」　残数0%の場合と、上映開始以降
    「会員先行」　現在時刻が、有料会員の販売開始時刻（onlineMemberSalesStartTime）を過ぎていて、かつ、販売終了時刻（onlineMemberSalesEndTime）を過ぎていない、かつ、その他の販売開始時刻（onlineNonMemberSalesStartTime）を過ぎていない
     */

    $now = microtime();
    $memberStartTime = $program->onlineMemberSalesStartTime;
    $memberEndTime = $program->onlineMemberSalesEndTime;
    $nonMemberStartTime = $program->onlineNonMemberSalesStartTime;

    if (
      $now > $memberStartTime &&
      $now < $memberEndTime &&
      $now < $nonMemberStartTime
    )
    {
      return '会員先行';
    }

    if ($this->time_status($program) === 'notyet')
    {
      return '販売前';
    }

    if ($this->time_status($program) === 'door')
    {
      return '当日窓口';
    }

    if ($this->time_status($program) === 'over' || $this->limit_status($program) === 'over')
    {
      return '販売終了';
    }

    return '購入する';

  }

  private function limit_status( $program )
  {

    $tickets = $program->numOfTickets - ($program->numOfReservedTickets + $program->numOfIssuedTickets);
    $rate = ($tickets / $program->numOfTickets) * 100;

    if( $rate === 0 )
    {
      return 'over';# ×　0%
    }
    elseif( $rate > 0 && $rate < 40 )
    {
      return 'danger';# △　1～39%
    }
    elseif( $rate >= 40 && $rate < 70 )
    {
      return 'warning';# ○　40～69%
    }

    return 'safe';# ◎　70～100%

    /*
    [0] => stdClass Object
    (
        [programId] => 2155
        [movieId] => 78
        [screenId] => 1
        [startTime] => 1541586600000
        [endTime] => 1541594220000
        [movieLength] => 127
        [trailerLength] => 0
        [movieTypeId] => 1
        [movieStyleId] => 0
        [remark] =>
        [programNo] => 1
        [numOfTickets] => 58
        [numOfReservedTickets] => 0
        [numOfIssuedTickets] => 1
        [onlineMemberSalesEnabled] => 1
        [onlineMemberSalesStartTime] => 1541170800000
        [onlineMemberSalesEndTime] => 1541587200000
        [onlineNonMemberSalesEnabled] => 1
        [onlineNonMemberSalesStartTime] => 1541257200000
        [onlineNonMemberSalesEndTime] => 1541587200000
        [onsiteMemberSalesEnabled] => 1
        [onsiteMemberSalesStartTime] => 1541170800000
        [onsiteMemberSalesEndTime] => 1541589600000
        [onsiteNonMemberSalesEnabled] => 1
        [onsiteNonMemberSalesStartTime] => 1541257200000
        [onsiteNonMemberSalesEndTime] => 1541589600000
    )
    */

  }

  private function status_class( $program )
  {

    $limit_status = $this->limit_status($program);
    $time_status = $this->time_status($program);

    if( $limit_status === 'over' || $time_status === 'over' || $time_status === 'notyet' )
    {
      return 'red';# ×　0%
    }
    elseif( $limit_status === 'danger' )
    {
      return 'yellow2';# △　1～39%
    }
    elseif( $limit_status === 'warning' )
    {
      return 'green2';# ○　40～69%
    }

    return 'green1';# ◎　70～100%

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

    $cache_path = md5($api_endpoint);
    $response = get_transient($cache_path);

    if (!$retry && $response)
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

      set_transient( $cache_path, $response, 5 * 60 );
    }

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