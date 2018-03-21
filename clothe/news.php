<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="logo.ico"/>
	<title>时尚资讯</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/news.css"/>
</head>
<body>
	<?php 
		include_once("inc/header.php");
	 ?>
	 <?php 
		include_once("inc/head.php");
	 ?>
	<?php 

	require_once("util/globalSetting.php");
	require_once("services/fashionService.php");


	$newId = $_GET["titleId"];
	$list = getNews($newId);


	 ?>

	<div class="news-first">
		<div class="index-first-nav" style="padding: 0px 20px;">
			<span onclick="history.back();">返回</span>
			<h2><?php echo $list["title"]; ?></h2>
			<div class="news-text">
				<p><?php echo $list["text"]; ?></p>
			</div>
		</div>		
	</div>
	
	<?php 
		include_once("inc/footer.php");
	?>

	 <script src="lib/js/jquery.min.js"></script>
	<script src="lib/js/bootstrap.min.js"></script>
</body>
</html>