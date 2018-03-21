<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="logo.ico"/>
	<title>商品展示</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/product.css"/>
</head>
<body>
	<?php 
		include_once("inc/head.php");
	 ?>
	 <?php 
		include_once("inc/head.php");
	 ?>

	 <?php 

	 	require_once("util/globalSetting.php");
		require_once("services/styleService.php");
		require_once("services/categoryService.php");
		require_once("services/clotheService.php");

		$pageIndex = 0;
		$pageSize = 15;

		if(array_key_exists("pageIndex" , $_GET)){
	 		$pageIndex = $_GET["pageIndex"];
	 	}

	 	$freestyleId = "";
	 	if(array_key_exists("freestyleId" , $_GET)){
	 		$freestyleId = $_GET["freestyleId"];
	 	}
		$categoryId = "";
	 	if(array_key_exists("categoryId" , $_GET)){
	 		$categoryId = $_GET["categoryId"];
	 	}


		$freestyles = getAllFreeStyle();
		array_unshift($freestyles, ["id" => "" , "name" => "全部"]);
		$categories = getAllCategories();
		array_unshift($categories, ["id" => "" , "name" => "全部"]);

		$clothe = getAllClothe($freestyleId , $categoryId , $pageIndex , $pageSize);
		if(is_bool($clothe)){
			echo "查询数据失败";
			exit;
		}

		$totalPageCount = ceil($clothe["totalRowCount"] / $pageSize);

	  ?>
	 <div class="product-first">
	 	<div class="index-first-nav">
	 		<div class="product-first-nav">
	 			<div class="crumb clear-float">
			        <span>所有分类 <img src="image/right.png" alt=""/></span>
			        <span id="hideGroups" class="f-right" style="display: block;float: right;">
			        	<a href="javascript:;" style="text-decoration: none;">收起筛选</a>
			        	<img src="image/up.png">
			        </span>
			        <span id="showGroups" class="f-right dis-none" style="display:none;float: right;">
			        	<a href="javascript:;" style="text-decoration: none;">显示筛选</a>
			        	<img src="image/down.png">
			        </span>
			    </div>
			    <div class="groups" id="category">
			    	<ul>
		 				<li>
		 					<span>热门风格</span>
		 					<?php foreach($freestyles as $item):?>
								<a href="product.php?freestyleId=<?php echo $item["id"]; ?>&categoryId=<?php echo $categoryId; ?>"><?php echo $item["name"]; ?></a>
		 					<?php endforeach ?>
		 				</li>
		 				<li>
		 					<span>衣门襟</span>
		 					<?php foreach($categories as $item):?>
								<a href="product.php?categoryId=<?php echo $item["id"]; ?>&freestyleId=<?php echo $freestyleId; ?>"><?php echo $item["name"]; ?></a>
		 					<?php endforeach ?>
		 				</li>
		 				<li>
		 					<span>适用季节</span>
		 					<span>四季</span>
		 				</li>
		 				<li>
		 					<span>西服类型</span>
		 					<span>单西服</span>
		 				</li>
		 			</ul>
			    </div>	 			
	 		</div>
	 		<div class="product-second">
				<?php foreach($clothe["list"] as $item):?>
		 			<div class="product-second-nav">
		 				<div>
		 					<a href="detail.php?id=<?php echo $item["id"]; ?>">
		 						<img src="<?php echo IMAGE_URL_HTTP . $item["header"]; ?>">
		 					</a>
		 				</div>
		 				<div>
		 					<span>￥<?php echo $item["price"]; ?>.00</span>
		 				</div>
		 				<div>
		 					<span>
		 						<a href="detail.php?id=<?php echo $item["id"]; ?>"><?php echo $item["name"]; ?></a>
		 					</span>
		 				</div>
		 			</div>
		 		<?php endforeach ?>
	 		</div>
	 		<div class="fenye">
				<?php for($i = 0 ; $i < $totalPageCount; $i++): ?>
					<a href="product.php?pageIndex=<?php echo $i; ?>&freestyleId=<?php echo $freestyleId; ?>&categoryId=<?php echo $categoryId; ?>"><?php echo $i + 1; ?></a>
				<?php endfor ?>
			</div>
	 	</div>
	 </div>
	 <?php 
		include_once("inc/footer.php");
	 ?>

	 <script src="lib/js/jquery.min.js"></script>
	<script src="lib/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(function(e){
			$('#hideGroups').bind('click' , function(e){
				$('#showGroups').show();
				$('#hideGroups').hide();
				$('.groups').slideUp(500);
			});
			$('#showGroups').bind('click' , function(e){
				$('#showGroups').hide();
				$('#hideGroups').show();
				$('.groups').slideDown(500);
			});
		})
	</script>
</body>
</html>