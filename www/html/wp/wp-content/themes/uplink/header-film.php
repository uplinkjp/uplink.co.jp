<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_meta.inc.php");?>
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_linkfile.inc.php");?>
	
	<!-- film str -->
	<link rel="stylesheet" href="/ex/css/film.css" type="text/css" />
	<link rel="stylesheet" href="/ex/css/film-320.css" media="screen and (max-width: 480px)" />
	<link rel="stylesheet" media="print" href="/ex/css/print.css" />
	<!-- film end -->

<?php if(is_single() or is_subpage() or is_tax() ): //個別ページ・サブページ・カスタム分類を判別 ?>
	<title><?php wp_title('', true, 'none'); ?> - 配給作品 | <?php bloginfo('name'); ?></title>
	<meta property="og:title" content=" - 配給作品 | <?php bloginfo('name'); ?>" />
<?php else: ?>
	<?php if(is_year()): //アーカイヴ ?>
	<title><?php wp_title('', true, 'none'); ?><?php if(is_year()) : ?>年のアップリンク配給作品<?php endif; ?> - 配給作品 | <?php bloginfo('name'); ?></title>
	<meta property="og:title" content="<?php wp_title('', true, 'none'); ?><?php if(is_year()) : ?>年<?php endif; ?> - 配給作品 | <?php bloginfo('name'); ?>" />
	<?php else: ?>
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta property="og:title" content="<?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?>" />
	<?php endif; ?>
<?php endif; ?>

	
	<?php if(is_single()): //FB用サムネイル画像 ?>
		<?php if(has_post_thumbnail()) { ?>
		<meta name="twitter:card" content="summary_large_image" />
		<meta property="og:image" content="<?php get_featured_image_url(); ?>" />
		<?php } else { ?>
		<meta name="twitter:card" content="summary">
		<meta property="og:image" content="http://www.uplink.co.jp/ex/img/uplink_img_og.gif" />
		<?php } ?>
	<?php else: ?>
	<meta property="og:image" content="http://www.uplink.co.jp/ex/img/uplink_img_og.gif" />
	<?php endif; ?>
	
	<?php if(is_single()): //singleページ用 ?>
	<meta name="Description" content="<?php if ( post_custom('schedule_2') ) : ?><?php echo post_custom('schedule_2'); ?><?php endif; ?>" />
	<meta property="og:description" content="<?php if ( post_custom('schedule_2') ) : ?><?php echo post_custom('schedule_2'); ?><?php endif; ?>" />
	<?php else: ?>
	<meta name="Description" content="アップリンク配給作品" />
	<?php endif; ?>
	
	<meta name="Keywords" content="アップリンク,UPLINK,映画,ビデオ,アート,書籍,シネマ,映像,フィルム,インディペンデント" />
	<meta name="twitter:site" content="uplink_jp" />
	
	<link rel="alternate" type="application/rss+xml" href="<?php echo get_post_type_archive_feed_link( 'film' ) ?>" />
	

<?php wp_head(); ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_analytics.inc.php");?>
</head>
<body>
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_head.inc.php");?>
<!-- pagewidth str -->
<div id="pagewidth">
	<!-- header str -->
	<header id="nav">
		<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_header_nav.inc.php");?>
	</header>
	<!-- header end -->