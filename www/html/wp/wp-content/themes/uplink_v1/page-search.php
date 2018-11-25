<?php
/* Template Name: 検索 search */
?>
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_meta.inc.php"); ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_linkfile.inc.php");?>

	<title>検索 | UPLINK</title>
	
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_head_analytics.inc.php");?>

</head>
<body>
<div id="pagewidth" class="page-search">
	<!-- header str -->
	<header>
		<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_header_nav.inc.php");?>
	</header>
	<!-- header end -->
	
	<section class="result">

		<!-- Place this tag where you want the search box to render -->
		<gcse:searchbox-only></gcse:searchbox-only>
		
		<!-- Place this tag where you want the search results to render -->
		<gcse:searchresults-only></gcse:searchresults-only>
		
	</section>
</div>

<!-- footer end -->
<?php require $_SERVER['DOCUMENT_ROOT'] . ("/ex/inc/_body_foot.inc.php");?>
</body>
</html>