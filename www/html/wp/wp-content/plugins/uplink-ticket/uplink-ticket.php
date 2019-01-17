<?php
/*
Plugin Name: Uplink Ticket
Plugin URI: https://www.uplink.co.jp
Description: Uplink Ticket Reserver
Version: 0.2
Text Domain: uplink-ticket
*/

global $wpdb;
if (!defined('TICKET_INDEX_TABLE')) define('TICKET_INDEX_TABLE', $wpdb->prefix . 'ticket_index');

require_once WP_PLUGIN_DIR . '/uplink-ticket/class/uplink-ticket.php';
require_once WP_PLUGIN_DIR . '/uplink-ticket/helper.php';

add_filter( 'save_post', function( $post_id )
{

  global $wpdb;

  $movie_id = get_field('movie_id', $post_id);

  if (!$movie_id) return;

  $data = array(
    'post_id' => $post_id,
    'movie_id' => $movie_id,
  );

  $is_exist = $wpdb->get_var( 'SELECT COUNT(*) FROM ' . TICKET_INDEX_TABLE . ' WHERE post_id = ' . $post_id );

  if( true === (boolean)$is_exist )
  {
    $wpdb->update( TICKET_INDEX_TABLE, $data, array('post_id' => $post_id) );
  }
  else
  {
    $wpdb->insert( TICKET_INDEX_TABLE, $data );
  }

});

register_activation_hook( __FILE__, function()
{

  global $wpdb;
  $charset_collate = $wpdb->get_charset_collate();

  $sql = "CREATE TABLE " . TICKET_INDEX_TABLE ." (
    post_id int(11) unsigned NOT NULL,
    movie_id int(11) unsigned NOT NULL
  ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta($sql);

});

register_deactivation_hook( __FILE__, function()
{

  // global $wpdb;
  // $wpdb->query( "DROP TABLE IF EXISTS " . TICKET_INDEX_TABLE );

});
