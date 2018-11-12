<?php
/*
Plugin Name: Uplink Ticket
Plugin URI: https://www.uplink.co.jp
Description: Uplink Ticket Reserver
Version: 0.1
Text Domain: uplink-ticket
*/

class uplinkTicket
{

  private $access_token,
          $apiurl,
          $username,
          $password;

  public function __construct()
  {

    $this->apiurl = defined('UPLINK_TICKET_APIURL') ? UPLINK_TICKET_APIURL : '';
    $this->username = defined('UPLINK_TICKET_USERNAME') ? UPLINK_TICKET_USERNAME : 'api_test';
    $this->password = defined('UPLINK_TICKET_PASSWORD') ? UPLINK_TICKET_PASSWORD : '';

  }

  public function fetch_theaters( $params = array() )
  {

    $params = array_merge(array(
      'screens' => 'true',
    ), $params);

    $api_endpoint = $this->endpoint( 'theaters', $params );

    $this->fetch( $api_endpoint );

    exit($api_endpoint);

  }

  public function endpoint( $uri, $params = null )
  {

    $endpoint = $this->apiurl . '/' . $uri;

    if( $params && is_array($params) )
    {
      $endpoint .= '?' . http_build_query($params);
    }

    return $endpoint;

  }


  public function fetch( $api_endpoint )
  {

    $ch = curl_init( $api_endpoint );

    // curl_setopt($ch, CURLOPT_FILE, $fp);
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(

    ));

    if (!curl_exec($ch))
    {



    }



    curl_close($ch);

  }

  public function auth()
  {

    $ch = curl_init( $this->endpoint('login') );

    // curl_setopt($ch, CURLOPT_FILE, $fp);
    // curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    
    // curl_setopt($ch, CURLOPT_HTTPHEADER, array(

    // ));

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( array(
      'username' => $this->username,
      'password' => $this->password,
    ) ));

    $data = curl_exec($ch);

    echo '<pre>';print_r(curl_getinfo($ch, CURLINFO_RESPONSE_CODE));echo '</pre>';exit;

    // echo '<pre>';print_r($data);echo '</pre>';exit;

    curl_close($ch);

  }

}

if (!function_exists('uplink_get_theaters'))
{

  function uplink_get_theaters()
  {

    $ut = new uplinkTicket;

    $ut->auth();

    return $ut->fetch_theaters();

  }

}