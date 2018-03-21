<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="logo.ico"/>
	<title>购物车</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/order.css"/>
    <link rel="stylesheet" href="css/cart.css"/>
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
	 	require_once("services/clotheService.php");

	 	$list = getAllCartClothe($userId);

	  ?>
	  <div class="order-body" >
		<div class="index-first-nav">
			<div class="bread-wrap">
			    <div class="bread-wrap-main">
			      <img src="image/in1.png" alt=""/>
			      <a href="index.php">首页</a>
			      <img src="image/right.png" alt=""/>
			      <a href="product.php">服装商城</a>
			      <img src="image/right.png" alt=""/>购物车
			    </div>
  			</div>
			<div class="mine-borrows">
				<span>我的购物车</span>
			</div>
			
			<!-- <div class="booksTable">
				
				<div class="order-title">
					<span>商品名称</span>
					<span>购买价格</span>
					<span>购买数量</span>
					<span>风格</span>
					<span>衣门襟</span>
					<span>操作</span>
				</div>
					<div class="order-item">
						<?php foreach($list as $item): ?>
							<div class="order-detail">
								<div>
									<div>
										<img src="<?php echo IMAGE_URL_HTTP . $item["header"]; ?>">
									</div>
									<div>
										<a href="detail.php?id=<?php echo $item["clotheId"]; ?>"><?php echo $item["name"]; ?></a>
										<span>颜色：<?php echo $item["colour"]; ?></span>
										<span>尺码：L</span>
									</div>						
								</div>
								<div> 
									<span>￥<?php echo $item["price"]; ?>.00</span>
								</div>
								<div>
									<span>1件</span>
								</div>
								<div>
									<span><?php echo $item["freestyleName"]; ?></span>
								</div>
								<div>
									<span><?php echo $item["categoryName"]; ?></span>
								</div>
								<div>
									<span class="btn-del" data-book-id="<?php echo $item["id"] ?>">删除</span>
								</div>
							</div>
						<?php endforeach ?>
					</div>
					<div>
					<div class="borrow-del">
						<span><a class="btn-delAll" data-book-id="">全部删除</a></span>
					</div>
					<div class="borrow-delete">
						<div class="account">
							<span id="btnSubmit">去结算</span>
						</div>
						<div class="account-left">
							<span>共计：</span>
							<span class="cout"><?php echo count($list); ?></span>
						</div>
					</div>
					
				</div> 
			</div>
				<div class="bookCeng">
					<img src="image/empty.png">
					<span>您的购物车是空的，您可以<a href="product.php">去逛逛</a></span>
				</div>
			 </div> -->
			 <div class="booksTable" style="min-height: 380px">
				<table class="table table-striped" style="margin-top: 15px;">
					<thead style="background-color: #F2DEDE;">
						<th>商品名称</th>
						<th>购买价格</th>
						<th>购买数量</th>
						<th>风格</th>
						<th>衣门襟</th>
						<th>操作</th>
					</thead>
					<tbody> 
						<?php foreach($list as $item): ?>
							<tr>
								<td>
									<div style="float: left;">
										<img src="<?php echo IMAGE_URL_HTTP . $item["header"]; ?>" style="width: 80px;">
									</div>
									<div style="float: left;">
										<a href="detail.php?id=<?php echo $item["clotheId"]; ?>" style="text-decoration: none;"><?php echo $item["name"]; ?></a>
										<span style="display: block;">颜色：<?php echo $item["colour"]; ?></span>
										<span>尺码：L</span>
									</div>	
								</td>
								<td>
									<span>￥<?php echo $item["price"]; ?>.00</span>
								</td>
								<td>
									<span>1件</span>
								</td>
								<td>
									<span><?php echo $item["freestyleName"]; ?></span>
								</td>
								<td>
									<span><?php echo $item["categoryName"]; ?></span>
								</td>
								<td><span class="btn-del" data-book-id="<?php echo $item["id"]; ?>">删除</span></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			
				<div class="borrow-del">
					<span><a class="btn-delAll" data-book-id="<?php echo $item["memberId"]; ?>">全部删除</a></span>
				</div>
				<div class="borrow-delete">
					<div class="account">
						<span id="btnSubmit">去结算</span>
					</div>
					<div class="account-left">
						<span>共计：</span>
						<span class="cout"><?php echo count($list); ?></span>
					</div>
				</div>
			</div>
			<div class="bookCeng">
				<img src="image/empty.png">
				<span>您的借书架是空的，您可以<a href="product.php">去逛逛</a></span>
			</div>
		</div>
	</div>	
	
		
	<?php 
		include_once("inc/footer.php");
	 ?>
	<script type="text/javascript">
		
		$(function(e){
			if($('.cout').text() == 0 ){
				$('.bookCeng').show();
				$('.booksTable').hide();
			}else{ 
				$('.bookCeng').hide();
				$('.booksTable').show();
			}

			$('.btn-del').bind('click' , function(e){
				var id = this.getAttribute('data-book-id');
				var $self = $(this);
				$.get('ajax/deleteOne.php?id=' + id , function(response){
					console.log(response);
					if(response.code == 100){
						$self.parent().parent().remove();
						location.href="cart.php";
					}else if(response.code == 103){
						SimplePop.alert("删除失败");
					}
				});
			});
 
			$('.btn-delAll').bind('click' , function(e){
				
				$.get('ajax/deleteAll.php' , function(response){
					console.log(response);
					if(response.code == 100){
						$('tbody tr').remove();
						location.href="cart.php"; 
					}else if(response.code == 103){
						SimplePop.alert("删除失败");
					}
				});
			});

			$('#btnSubmit').bind('click' , function(e){
				
				$.get('ajax/submitOrder.php' , function(response){
					console.log(response);
					if(response.code == 100){
						$('tbody tr').remove();
						location.href="address.php";
						console.log(response.code);
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