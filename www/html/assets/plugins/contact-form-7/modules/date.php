<?php
/**
** A base module for [select] and [select*]
**/

/* Shortcode handler */

wpcf7_add_shortcode( 'date', 'wpcf7_date_shortcode_handler', true );

function wpcf7_date_shortcode_handler( $tag ) {
	if ( ! is_array( $tag ) )
		return '';
	
	if (isset($_GET['date'])) {
		
		global $wpdb, $wpsm;
		
		$date_id = $_GET['date'];
		
		$date = $wpsm->get(array(
			'include'	=> $date_id
		));
		
		if (!empty($date)) {
			$html .= '<input type="hidden" name="event_title" value="'.get_the_title($date[0]->post_id).'" />';
			$html .= '<input type="hidden" name="event_date" value="'.date('Y年m月d日', strtotime($date[0]->date)).'" />';
			$html .= '<input type="hidden" name="event_time" value="'.$date[0]->time.'" />';
		}
		
	}

	return $html;
}

?>