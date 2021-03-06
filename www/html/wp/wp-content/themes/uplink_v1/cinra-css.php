<?php

/* functions.phpにつっこんでください */

function wp_url_query($arg = array(), $exclude = array()) {
     $arg = array_merge($_GET, $arg);
     $q = array();
     foreach ($arg as $k => $v) {
     	if (!in_array($k, $exclude)) $q[] = $k."=".$v;
     }
     if (!empty($q)) return '?'.implode('&', $q);
}

function generate_preservation_link($status, $url, $date_id = 0, $datestr = "today", $ticket, $today = false) {

	if(!$today && date('U') > strtotime($datestr)) return false;

	$html = '<p class="btn_preservation">';
	$status_txt = get_status_link($status, $url, $date_id, $datestr);

	global $is_seat;
	$status_seat = ($ticket == 3) ? '' : '<small class="ticket00'.$ticket.'">' .$is_seat[$ticket] .'</small>';

	if(!$status_txt && !$status_seat) return false;

	$html .= $status_seat. $status_txt. '</p>';
	return $html;
}

function get_status_link($status, $url, $date_id, $datestr) {

	if ((date('U') > strtotime($datestr)) || !$status) return false;

	$status_txt = '';

	if ($status == 3) $status_txt .= '<span class="btn003">予約終了</span>';
	if ($status==2 && $url) $status_txt .= '<a href="'.$url.'" target="_blank" class="btn001">予約する</a>';//外部サイトで予約

	if ($status==1 && $url) $status_txt .= '<a href="'.$url.'" target="_blank" class="btn001">予約する</a>';//内部サイトで予約
	if ($status==1 && $date_id) $status_txt .= '<a href="'.get_bloginfo('url').'/reservation/?date='.$date_id.'" target="_blank" class="btn001">予約する</a>';//内部サイトで予約

	if ($status==4 && $url) $status_txt .= '<a href="'.$url.'" target="_blank" class="btn002">購入する</a>';//外部サイトで購入 added 20140819

	if(!$status_txt) return false;

	return $status_txt;

}

function get_schedule_by_post($post_id) {
	global $wpsm;
	if ($wpsm) {
		$dat = $wpsm->get(array(
			'post_id'	=> $post_id,
			'date'		=> 'today',
			'term_by'	=> 'year',
			'term'		=> 100,
			'group'		=> 'daily'
		));// 日程取得
	}

	if(!empty($dat)):?><section class="schedule" id="single-schedule">
		<dl class="tbl clearfix">
			<dt class="head">日程</dt>
			<dd class="head">時間</dd>
			<?php $i = 0;
			foreach($dat as $k => $d):
			$date_arr = explode('-', $k);
			$weekday = strtolower(date('D', mktime(0, 0, 0, $date_arr[1], $date_arr[2], $date_arr[0])));

			?>
				<dt class="day w-<?php echo $weekday?><?php if($i%2 == 0):?> odd<?php endif;?>"><?php echo date('n月j日', strtotime($k))?>（<?php echo wp_get_weekday($weekday)?>）</dt>
				<dd class="day w-<?php echo $weekday?><?php if($i%2 == 0):?> odd<?php endif;?>">
					<?php $c = count($d) - 1;foreach($d as $kk => $dd):

					$class = '';
					$today = (get_post_type($post_id) == 'movie') ? 1 : false;

					if($label = generate_preservation_link($dd->status, $dd->url, $dd->date_id, $dd->date, $dd->ticket, $today))
					{
						if(get_status_link($dd->status, $dd->url, $dd->date_id, $dd->date)) $class = ' with-btn';
						if(isset($dd->ticket) && $dd->ticket < 3) $class .= ' with-ticket';
					}

					?>
						<div class="clearfix time<?php if($class) echo $class;?><?php if($c == $kk):?> last<?php endif;?>">
							<p class="txt"><?php echo $dd->time?></p>
							<?php if($label) echo $label;?>
						</div>
					<?php endforeach;?>
				</dd>
			<?php $i++;endforeach;?>
		</dl>
	</section>
	<?php endif;
}

/*add_action('init', 'wpcf7_setting', 0);
function wpcf7_setting() {
	define( 'WPCF7_AUTOP', false );
}*/

?>