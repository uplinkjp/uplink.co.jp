<?php
/* Template Name: 予約フォームreservation */

get_header('reservation');

the_post();

include('cinra-css.php');

global $wpsm;

if ($_GET['date']) {
	$date = $wpsm->get(array(
		'include'	=> $_GET['date']
	));
	if (!empty($date)) {
		$dat = get_post($date[0]->post_id);
	}
}
?>
	
	
	<!-- container str -->
	<div id="container" class="clearfix reserv">
		<!-- maincontents str -->
		<div id="maincontents">
			<nav id="pan">
				<p><a href="/">ホーム</a> &#8250; <em>予約メールフォーム</em> </p>
			</nav>
			<!-- post str -->
			<article class="clearfix post">
				<section class="body">
						<a name="reserv1" id="reserv1"></a>
						<h2>予約にあたってのお願い</h2>
						<p>最近予約をされておいて、連絡も無しに当日にいらっしゃらない方が増えています。アップリンクは、Xもファクトリーも客席数に限りのある小さな会場です。あるイベントなどは満員で予約を打ち切り、その後予約を希望される方をお断りしたら当日２０人以上の方が来られず空席が目立つということもありました。皆様の入場料は、アップリンクが経営していくのにとても重要でいつもありがたく思っています。予約後キャンセルされる場合は必ずメールでその旨をお伝えください。
						<p class="right">浅井隆：アップリンク社長</p>

					
					<!-- contents str -->
					<a name="reserv2" id="reserv2"></a>
					<section class="contents">
						<h2>入力フォーム</h2>					
						<section class="content clearfix">
							<ul class="important">
								<li><strong style="color:#900;">携帯のメールアドレス不可。</strong>PCメールアドレスのみ受付。</li>
								<li>予約後キャンセルされる場合は必ず、お名前、イベント名を明記の上、メールで<a href="mailto:factory@uplink.co.jp">factory@uplink.co.jp</a>までお知らせください。</li>
								<li>メールでの予約はイベント前日までとさせていただきます。当日券のお問い合わせはお電話にて承ります。（tel. 03-6825-5503）</li>
							</ul>
						</section>
						<section class="content clearfix">
						
							<?php if(isset($dat)):?>
							
							<table class="simple-black">
								<tr>
									<th colspan="2" class="h">予約するイベント</th>
								</tr>
								<tr>
									<th scope="row">イベント名</th>
									<td><a href="<?php echo get_permalink($dat->ID)?>"><?php echo get_the_title($dat->ID)?></a></td>
								</tr>
								<tr>
									<th scope="row">日程</th>
									<td><?php echo date('Y年m月d日', strtotime($date[0]->date))?></td>
								</tr>
								<tr>
									<th scope="row">時間</th>
									<td><?php echo $date[0]->time?></td>
								</tr>
							</table>
							
							<?php else: ?>
							
							<table class="simple-black">
								<tr>
									<th colspan="2" class="h">予約するイベント</th>
								</tr>
								<tr>
									<td>
									<strong style="color: #F00; font-weight:800; font-size:22px;">予約するイベントが選択されていません！</strong><br>
									もう一度予約したいイベントの情報ページに戻り「予約する」ボタンを押すか、
									下記フォームの「備考」に予約したい<strong>イベント名</strong>、<strong>日程</strong>、<strong>時間</strong>を記入してください。
									</td>
								</tr>
							</table>
							
							<?php endif?>
					
							<div class="form">
								<?php the_content()?>
							</div>
						</section>
					</section>
					<!-- content end -->					
				</section>

			</article>
			<!-- post end -->
		</div>
		<!-- maincontents end -->
				
		<!-- sidearea str -->
		<div id="sidearea">				
			<aside class="box">
				<ul class="categorys">
					<li><a href="#reserv1">予約にあたってのお願い</a></li>
					<li><a href="#reserv2">入力フォーム</a></li>
				</ul>
			</aside>
		</div>
		<!-- sidearea end -->
	</div>
	<!-- container end -->
</div>
<!-- pagewidth end -->
<?php get_footer(); ?>