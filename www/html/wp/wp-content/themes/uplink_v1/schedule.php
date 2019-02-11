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
				<section class="data" style="background: #FFD3D4; margin: 100px 0; padding: 60px 30px;">
					<h3 style="color: #900;">「アップリンク渋谷」の公式サイトリニューアルに伴うURL変更について</h3>
					
					<p>「アップリンク渋谷」のサイトリニューアルに伴い、URLが変更となりました。お手数ですが、下記URLより情報をご覧ください。<br /><br />
					<a href="https://shibuya.uplink.co.jp/schedule" target="_blank">https://shibuya.uplink.co.jp/schedule</a>
					</p>
				</section>
		

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