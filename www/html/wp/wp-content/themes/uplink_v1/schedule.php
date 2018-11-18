<?php
/* Template Name: スケジュールschedule */

get_header('schedule');
include('cinra-css.php');

if ($_GET['date']) { $date = $_GET['date']; } else { $date = date('Y-m'); }
$prev_url = "?date=" . date('Y-m', strtotime($date . '-1' . ' -1 month'));
$now_url = "?date=" . date('Y-m');
$next_url = "?date=" . date('Y-m', strtotime($date . '-1' . ' +1 month'));

list ($year, $month) = explode ('-', $date);
$month += 0;

?>



		<?php if ( post_custom('page_1') ) : ?>
		<div id="index-slider" class="clearfix">
			<?php echo post_custom('page_1'); ?>
		</div>
		<?php endif; ?>

	</header>
	<!-- header end -->

	<div id="calendar" class="schedule">
		<article>
			<h1><a href="/schedule/"><?php echo $year?>年<?php echo $month?>月のスケジュール</a></h1>

			<nav>
				<ul class="clearfix">
					<li class="movie">上映</li>
					<li class="event">イベント</li>
					<li class="gallery">ギャラリー</li>
					<li class="market">マーケット</li>
				</ul>
			</nav>

			<nav class="pager">
				<?php
				$output = '<p>';
				$output .= '<a href="'.$prev_url.'">前の月</a> | ';
				$output .= '<a href="'.$now_url.'">当月</a> | ';
				$output .= '<a href="'.$next_url.'">次の月</a>';
				$output .= '</p>';
				echo $output;
				?>
			</nav>



			<div id="schedule-table">			
				<?php
				$schedule = file_get_contents( 'http://ticket.uplink.co.jp/api/schedule?date='.$date );
				echo $schedule;
				?>
			</div>			



			<nav class="pager bottom">
				<?php
				$output = '<p>';
				$output .= '<a href="'.$prev_url.'">前の月</a> | ';
				$output .= '<a href="'.$now_url.'">当月</a> | ';
				$output .= '<a href="'.$next_url.'">次の月</a>';
				$output .= '</p>';
				echo $output;
				?>
			</nav>

		</article>
	</div>
</div>
<!-- pagewidth end -->
<!-- footer str -->
<footer id="footer-nav">
	<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_footer_nav.inc.php");?>
</footer>
<!-- footer end -->
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_foot.inc.php");?>
</body>



</html>