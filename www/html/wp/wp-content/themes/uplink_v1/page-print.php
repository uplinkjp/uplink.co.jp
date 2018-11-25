<?php
/* Template Name: 印刷用print */

include('cinra-css.php');
$prev_post = 0;

if ($wpsm) {
	
	// デフォルトの設定
	$arg = array(
		'term_by'	=> 'day',
		'term'		=> 2,
		'group'		=> 'daily-id'
		//'group'		=> 'daily'
	);
	
	// 日付処理
	$now				= date('Y-m-d');
	$arg['date']	= $now;
	
	// 各種設定
	if ($_GET['category'])	$arg['category']	= $_GET['caterogy'];
	if ($_GET['type'])		$arg['post_type']	= $_GET['type'];
	
	// Set Pagers
	$date_arr		= explode('-', $arg['date']);
	$now_url			= get_bloginfo('url').'/'.$wp->request.'/'.wp_url_query(array('date' => $now));
	
	$day_start 		= (int)$date_arr[2];
	$day_end 		= (int)date('d', mktime(0, 0, 0, (int)$date_arr[1], (int)$date_arr[2]+1, $date_arr[0]));
	
	if ($day_end < $day_start) $day_end += $day_start;
	
	// 日程取得
	$dat = $wpsm->get($arg);
}

?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width" />
	<meta property="og:site_name" content="UPLINK" />
	<meta property="og:locale" content="ja_JP" />
	
	<link rel="shortcut icon" href="/ex/img/favicon.ico" />
	<link rel="apple-touch-icon" href="/ex/img/apple-touch-icon-precomposed.png" />	
	<script src="/ex/js/jquery-1.7.1.min.js"></script>
	
	<script src="/ex/js/scrollsmoothly.js"></script>
	<script src="/ex/js/jquery.corner.js"></script>
	<script src="/ex/js/jquery.flatheights.js"></script>
	<script src="/ex/js/jquery.common.js"></script>

	<!-- iphone Mobile Bookmark Bubble -->
	<script src="/ex/js/bookmark_bubble.js"></script>
	<script src="/ex/js/example.js"></script>
	
	<!--[if lt IE 9]>
	<script src="/ex/js/css3-mediaqueries.js"></script>
	<![endif]-->
	
	<!--[if lte IE 8]>
	<script src="/ex/js/html5.js"></script>
	<![endif]-->
	
	<!--[if IE 6]>
	<script src="/ex/js/DD_belatedPNG.js"></script>
	<script>
		DD_belatedPNG.fix('img, .png_bg');
	</script>
	<![endif]-->
	
	<link rel="stylesheet" href="/ex/css/default.css" />
	<link rel="stylesheet" href="/ex/css/layout.css" />

	<!-- print str -->
	<link rel="stylesheet" href="/ex/css/print.css" type="text/css" />
	<!-- print end -->
	
	<title>印刷用</title>
	<meta name="robots" content="noindex,nofollow">

<link rel='stylesheet' id='contact-form-7-css'  href='http://wp.localhost/cms_wp/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=3.2' type='text/css' media='all' />
<link rel='canonical' href='http://wp.localhost/print' />
	<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
	<script type="text/javascript">
	
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-390570-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script></head>
<body style="background:#FFF;">
		
	</header>
	<!-- header end -->	
	
	<div id="calendar">
		<article>
		
			<?php for($i = $day_start; $i < $day_end+0; $i++):
				$date = date('Y-m-d', mktime(0, 0, 0, $date_arr[1], $i, $date_arr[0]));
				$weekday = strtolower(date('D', mktime(0, 0, 0, $date_arr[1], $i, $date_arr[0])))?>
				
			<h1>今日のスケジュール</h1>
			
			<div id="schedule-table">
				<dl class="tbl clearfix">
				
					<dt class="day day-<?php echo $i?> week-<?php echo $weekday?>" rel="day-<?php echo $i?>">
						<?php echo date('n月j日', strtotime($date))?>（<?php echo wp_get_weekday($date)?>）
					</dt>
					<dd class="day-<?php echo $i?> week-<?php echo $weekday?>" rel="day-<?php echo $i?>">
					
						<?php if(isset($dat[$date])):
						foreach($dat[$date] as $kkk => $ddd):
						//if ($prev_post != $kkk):
						$p = get_post($kkk);?>
							
						<section class="item">
							<header class="title title-<?php echo $p->post_type?>">
								<h2><a href="<?php echo get_permalink($kkk)?>"><?php echo $p->post_title?></a></h2>
							</header>
							
							<ul class="datas">
							<?php //endif;?>
								<?php foreach($ddd as $kk => $dd):?>
								<li class="data">
								<?php echo $dd->time?>
								</li>
								<?php endforeach?>
							</ul>
						</section>
						
						<?php $prev_post = $dd->post_id;
						endforeach;?>
						
						<?php else:?>
						<section class="item">
							<header class="title">
								<h2>&nbsp;</h2>
							</header>
							<ul class="datas">
								<li class="data">&nbsp;</li>
							</ul>
						</section>
						<?php endif;?>

					</dd>
				<?php $prev_post = 0;
				endfor;?>
				
				</dl>
			</div>
			
		</article>
	</div>
	

</div>
<!-- pagewidth end -->
</body>
</html>