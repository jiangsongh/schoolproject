<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="logo.ico"/>
	<title>Coo 西服</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/detail.css"/>
    <link rel="stylesheet" type="text/css" href="css/simplepop.css">
</head>
<body>
	<?php 
		include_once("inc/head.php");
	 ?>
	 <?php 
		require_once("util/globalSetting.php");
		require_once("services/detailService.php");

		$clotheId = $_GET["id"];
		$list = getClotheDetail($clotheId);

	 ?>

	<div class="detail-nav">
		<div class="index-first-nav" style="width: 1000px;">
			<div class="detail-first-title">
				<span onclick="history.back();">返回</span>
		 		<span>COO高级男士西服</span>
		 	</div>

		 	<div>
		 		<div class="div-detail">
					<div>
						<div>
							<img src="<?php echo IMAGE_URL_HTTP . $list["header"]; ?>">
						</div>
						<div>
							<img src="<?php echo IMAGE_URL_HTTP . $list["header"]; ?>">
						</div>
					</div>
					<div>
						<h2><?php echo $list["name"]; ?></h2>
						<div>
							<span>价格：</span>
							<span>￥<?php echo $list["price"]; ?>.00</span>
						</div>
						<div>
							<span>颜色：<?php echo $list["colour"]; ?></span>
						</div> 
						<div>
							<span>运费：10.00</span> 
						</div>
						<div>
							<span>尺码：</span>
							<input type="radio" name="radio" checked>S
							<input type="radio" name="radio">M
							<input type="radio" name="radio">L
							<input type="radio" name="radio">XL
							<input type="radio" name="radio">XXL
						</div>
						<button class="btn-add3" data-book-id="<?php echo $list["id"]; ?>" style="background-color: #f2f2f2;color: blue;">定制</button>
				        <button class="btn-add2" data-book-id="<?php echo $list["id"]; ?>" style="background-color: #ffeded;color: #FF0036;">立即购买</button>
				        <button class="btn-add" data-book-id="<?php echo $list["id"]; ?>">加入购物车</button>
				    </div>
				</div>
				<div class="detail-div">
					<p>商品详情</p>
				</div>
				<div class="detail-div-nav">
					<div class="div-video">
						<video controls autoplay>
							<source src="video/show.mp4" type="video/mp4">
						</video> 
					</div>
					
					<img src="image/detailTitle.png">
					<img src="image/chima.jpg">
					<img src="image/title.jpg">
					<?php for($i=0;$list["images"][$i];$i++): ?>
						<img src="<?php echo IMAGE_URL_HTTP . $list["images"][$i]; ?>">
					<?php endfor ?>
					<img src="image/tishi.jpg">
				</div>
		 	</div>
		</div>
	 	
	</div>
	<?php 
		include_once("inc/footer.php");
	?>

	<script src="lib/js/jquery.min.js"></script>
	<script src="lib/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="lib/js/simplepop.js"></script>
	<script type="text/javascript">

		function addShelf(clotheId){
			console.log(clotheId);
		}
		
		$(function(e){

			$('.btn-add').bind('click' , function(e){
				
				var clotheId = this.getAttribute('data-book-id');
				console.log(clotheId);
				$.get('ajax/addShelf.php?clotheId=' + clotheId , function(response){
					console.log(response);
					if(response.code == 100){
						var count = parseInt($('#lblCount').text());
						count++;
						$('#lblCount').text(count);
						SimplePop.alert("加入成功");
					}
					else if(response.code == 403){
						location.href = 'login.php';
					}
					else if(response.code == 103){
						SimplePop.alert("没有库存");
					}

				});
			});

			$('.btn-add2').bind('click' , function(e){
				var clotheId = this.getAttribute('data-book-id');
				
				$.get('ajax/submitAddress.php?clotheId=' + clotheId , function(response){
					console.log(response.code);
					if(response.code == 100){
						location.href="address.php";
					}
					else{
						SimplePop.alert(response.message);
					}
				});
			});

			$('.btn-add3').bind('click' , function(e){
				var clotheId = this.getAttribute('data-book-id');
				console.log(clotheId);
				$.get('ajax/submit.php?clotheId=' + clotheId , function(response){
					console.log(response.code);
					if(response.code == 100){
						location.href="address.php";
					}
					else{
						SimplePop.alert(response.message);
					}
				});
			});
		});
	</script>
</body>
</html>