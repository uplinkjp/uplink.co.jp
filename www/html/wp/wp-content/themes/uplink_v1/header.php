<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_meta.inc.php");?>
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_linkfile.inc.php");?>
	
	<!-- schedule str -->
	<link rel="stylesheet" href="/ex/css/index.css?t=20180123" type="text/css" />
	<link rel="stylesheet" href="/ex/css/index-320.css?t=20180123" media="screen and (max-width: 480px)" />
	<!-- schedule end -->
	
	<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
	
	<?php if(is_single()): //FB用サムネイル画像 ?>
	<?php if(has_post_thumbnail($post->ID)) {
		$tid = get_post_thumbnail_id($post->ID);
		$url = wp_get_attachment_image_src($tid);
		echo '<meta property="og:image" content="'.$url[0].'"/>';
	} else {
		echo '<meta property="og:image" content="http://www.uplink.co.jp/ex/img/uplink_img_og.gif" />';
	} ; ?>
	<?php else: ?>
	<meta property="og:image" content="http://www.uplink.co.jp/ex/img/uplink_img_og.gif" />
	<?php endif; ?>

	<meta name="Description" content="渋谷アップリンクのイベント情報一覧" />
	<meta name="Keywords" content="アップリンク,UPLINK,映画,ビデオ,アート,書籍,シネマ,映像,フィルム,インディペンデント" />
	
<?php wp_head(); ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_analytics.inc.php");?>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_head.inc.php");?>
<!-- pagewidth str -->
<div id="pagewidth">
	<!-- header str -->
	<header>
		<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_header_nav.inc.php");?>
	</header>
	<!-- header end -->