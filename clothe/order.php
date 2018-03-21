<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="logo.ico"/>  
	<title>我的订单</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/order.css"/>
</head>
<body>
	<?php 
		if(!array_key_exists("Current",$_COOKIE)){
			header("location:login.php");
			exit;
		}
		$name = $_COOKIE["Current"];
		$name = explode("," , $name);
		$userId = $name[0];
	 ?>
 
	<?php 
		include_once("inc/head.php");
	 ?>
	 <?php 
	 	require_once("util/globalSetting.php");
	 	require_once("services/orderService.php");

	 	$pageIndex = 0;
		$pageSize = 3;

		if(array_key_exists("pageIndex" , $_GET)){
	 		$pageIndex = $_GET["pageIndex"];
	 	}

	 	$list = getAllOrder($userId, $pageIndex , $pageSize);
	 	
	 	$totalPageCount = ceil($list["totalRowCount"] / $pageSize);

	  ?>
 
	<div class="order-body">
		<div class="index-first-nav">
			<div class="bread-wrap">
			    <div class="bread-wrap-main">
			      <img src="image/in1.png" alt=""/>
			      <a href="index.php">首页</a>
			      <img src="image/right.png" alt=""/>
			      <a href="product.php">服装商城</a>
			      <img src="image/right.png" alt=""/>
			      <a href="cart.php">购物车</a>
			      <img src="image/right.png" alt=""/>我的订单
			    </div>
  			</div>
			<div class="uul">
				<ul>
					<li><a href="">所有订单</a></li>
					<!-- <li><a href="">交易成功</a>  |</li> -->
					<!-- <li><a href="">交易失败</a></li> -->
				</ul>
			</div>
			<div class="order-title">
				<span>商品名称</span>
				<span>购买价格</span>
				<span>购买数量</span>
				<span>订单类型</span>
				<span>交易状态</span>
				<span>交易操作<span>
			</div>
			<?php foreach($list["list"]  as $item): ?>
				<div class="order-item">
					<div class="order-num">
						<span><?php echo date("Y-m-d H:i:s",$item["createTime"]/1000); ?></span>
						<span>订单号：</span>
						<span><?php echo $item["shelvesId"]; ?></span>
					</div>
					<div class="order-detail">
						<div>
							<div>
								<img src="<?php echo IMAGE_URL_HTTP . $item["image"]; ?>">
							</div>
							<div>
								<a href="detail.php?id=<?php echo $item["clotheId"]; ?>"><?php echo $item["name"]; ?></a>
								<span>颜色：<?php echo $item["colour"]; ?></span>
								<span>尺码：<?php echo $item["size"]; ?></span>
							</div>						
						</div>
						<div>
							<span>￥<?php echo $item["price"]; ?>.00</span>
						</div>
						<div>
							<span><?php echo $item["count"]; ?>件</span>
						</div>
						<div>
							<span><?php echo $item["cate"]; ?></span>
						</div>
						<div>
							<span>
								<?php 
								if($item["state"] == 0){
									echo "已取消";
								}else if($item["state"] == 1){
									echo "已下单";
								}else if($item["state"] == 2){
									echo "已配送";
								}else if($item["state"] == 3){
									echo "已收货";
								}else if($item["state"] == 4){
									echo "已收货";
								}
						 	?>
							</span>
						</div>
						<div>
							<span style="cursor: pointer;">
								<?php 
						 		if($item["state"] == 1 ){
						 	?>
						 		<a class="btn-add" 
								 	data-book-id="<?php echo $item["shelvesId"]; ?>" 
								 	data-book-number="<?php echo $item["clothenumber"]; ?>">
									<?php echo "取消";?>
						 	 	</a>
						 	 <?php
							 	}else if($item["state"] == 2){
							 ?>
						 		<a class="btn-add1" 
								 	data-book-id="<?php echo $item["shelvesId"]; ?>" 
								 	data-book-number="<?php echo $item["clothenumber"]; ?>">
									<?php echo "收货";?>
						 	 	</a>
						 	 <?php } ?>
							</span>
						</div>
					</div>
				</div>
			<?php endforeach ?>
			 </div>
			 <div class="fenye">
				<?php for($i = 0 ; $i < $totalPageCount; $i++): ?>
					<a href="order.php?pageIndex=<?php echo $i; ?>"><?php echo $i +1; ?></a>
				<?php endfor ?>
			</div>
		</div>
	</div>

	 <?php 
		include_once("inc/footer.php");
	?>
	<script src="lib/js/jquery-1.11.1.min.js"></script>
	<script src="lib/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="lib/js/simplepop.js"></script>
	<script type="text/javascript">
		$(function(e){
			$('.btn-add').bind('click' , function(e){
				var $self = $(this);
				var shelvesId = this.getAttribute('data-book-id');
				var clothenumber = this.getAttribute('data-book-clothenumber');
				$.get('ajax/cancelShelf.php?shelvesId=' + shelvesId + '&clothenumber=' + clothenumber, function(response){
					if(response.code == 100){
						$self.remove();
						location.href = 'order.php';
					}
					else if(response.code == 403){
						location.href = 'login.php';
					}
					else if(response.code == 103){
						SimplePop.alert("取消失败");
					}

				});

			});
			$('.btn-add1').bind('click' , function(e){
				var $self = $(this);
				var shelvesId = this.getAttribute('data-book-id');
				var clothenumber = this.getAttribute('data-book-clothenumber');
				$.get('ajax/confirmShelf.php?shelvesId=' + shelvesId , function(response){
					console.log(response);
					if(response.code == 100){
						$self.remove();
						location.href = 'order.php';
					}
					else if(response.code == 403){
						location.href = 'login.php';
					}
					else if(response.code == 103){
						SimplePop.alert("收货失败");
					}
				});
			})

		});
	</script>
</body>
</html>