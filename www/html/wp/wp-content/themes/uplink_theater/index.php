GET /data/v1/programs[?after=日時][&before=日時][&movie_id=作品ID][&movies={true|false}]

<?php

// $theaters = get_uplink_theaters();
// echo '<pre>';print_r($theaters);echo '</pre>';exit;

// $theater = get_uplink_theater( 'shibuya' );
// echo '<pre>';print_r($theater);echo '</pre>';exit;

// $screens = get_uplink_screens();
// $screens = get_uplink_screens( 'shibuya' );
// echo '<pre>';print_r($screens);echo '</pre>';exit;

$programs = get_uplink_programs_by_date( '20181001', '20181130' );
echo '<pre>';print_r($programs);echo '</pre>';exit;

$programs = get_uplink_programs( array(
  'after' => '20181101',
  'before' => '20181130',
  'movies' => true
));
echo '<pre>';print_r($programs);echo '</pre>';exit;


echo __FILE__.' - '.__LINE__;exit;

