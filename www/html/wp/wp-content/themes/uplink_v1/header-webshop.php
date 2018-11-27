<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_meta.inc.php");?>
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_linkfile.inc.php");?>
	
	<!-- webshop str -->
	<link rel="stylesheet" href="/ex/css/webshop.css" type="text/css" />
	<link rel="stylesheet" href="/ex/css/webshop-320.css" media="screen and (max-width: 480px)" />
	<!-- webshop end -->
	
<?php if(is_single() or is_subpage() or is_tax()): //個別ページ・サブページ・カスタム分類を判別 ?>
	<title><?php wp_title('', true, 'right'); ?>- WEBSHOP | <?php bloginfo('name'); ?></title>
<?php else: ?>
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
<?php endif; ?>
	
	<?php if(is_single()): //FB用サムネイル画像 ?>
	<?php if(has_post_thumbnail($post->ID)) {
		$tid = get_post_thumbnail_id($post->ID);
		$url = wp_get_attachment_image_src($tid);
		echo '<meta property="og:image" content="'.$url[0].'"/>';
	} else {
		echo '<meta property="og:image" content="/ex/img/uplink_img_og.gif" />';
	} ; ?>
	<?php else: ?>
	<meta property="og:image" content="/ex/img/uplink_img_og.gif" />
	<?php endif; ?>
	
	<?php if(is_single()): //singleページ用 ?>
	<meta name="Description" content="<?php if ( post_custom('film_1') ) : ?><?php echo post_custom('film_1'); ?><?php endif; ?>" />
	<?php else: ?>
	<meta name="Description" content="アップリンク直販で通販中の商品紹介" />
	<?php endif; ?>
	<meta name="Keywords" content="アップリンク,UPLINK,映画,ビデオ,アート,書籍,シネマ,映像,フィルム,インディペンデント" />
	
	<link rel="alternate" type="application/rss+xml" href="<?php echo get_post_type_archive_feed_link( 'film' ) ?>" />

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