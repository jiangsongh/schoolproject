<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="logo.ico"/>
	<title>时尚资讯</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/fashion.css"/>
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
		require_once("services/newService.php");
		
		$pageIndex = 0;
		$pageSize = 5;

		if(array_key_exists("pageIndex" , $_GET)){
	 		$pageIndex = $_GET["pageIndex"];
	 	}

		$list = getAllNews( $pageIndex , $pageSize);
		if(is_bool($list)){
			echo "查询数据失败";
			exit;
		}
		$totalPageCount = ceil($list["totalRowCount"] / $pageSize);

	  ?>

	 <div class="fashion-first">
	 	<div class="index-first-nav">
	 		<div class="fashion-first-title">
	 			<span>新闻中心</span>
	 		</div>
	 		<div class="fashion-first-article">
	 			<!--循环-->
				<?php foreach($list["list"] as $item):?>
					<div>
		 				<div>
			 				<div><?php echo $item["id"]; ?></div>
			 				<div><?php echo $item["createTime"]; ?></div>
			 			</div>
			 			<div>
			 				<p><a href="news.php?titleId=<?php echo $item["titleId"]; ?>"><?php echo $item["title"]; ?></a></p>
			 				<p><?php echo $item["titleEm"]; ?></p>
			 			</div>
		 			</div>
				<?php endforeach ?> 				 			
	 		</div>
	 	</div>
	 </div>
	 <div class="fenye">
		<?php for($i = 0 ; $i < $totalPageCount; $i++): ?>
			<a href="fashion.php?pageIndex=<?php echo $i; ?>"><?php echo $i + 1; ?></a>
		<?php endfor ?>
	</div>

	 <?php 
		include_once("inc/footer.php");
	 ?>

	 <script src="lib/js/jquery.min.js"></script>
	<script src="lib/js/bootstrap.min.js"></script>
</body>
</html>