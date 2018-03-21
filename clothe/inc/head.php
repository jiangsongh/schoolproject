<?php 

	$name = "";
	$userId = "";
	$nick = "";
	if(array_key_exists("Current",$_COOKIE)){
		$name = $_COOKIE["Current"];
		$name = explode("," , $name);
		$userId = $name[0];
		$nick = $name[2];
	}

 ?>
<?php 
	require_once("util/globalSetting.php");
 ?>

<?php 
		if(strpos($_SERVER['REQUEST_URI'],'index.php')){
	 		$flag = 0;
	 	}
	 	if(strpos($_SERVER['REQUEST_URI'],'brand.php')){
	 		$flag = 1;
	 	}
	 	if(strpos($_SERVER['REQUEST_URI'],'fashion.php')){
	 		$flag = 2;
	 	}
	 	if(strpos($_SERVER['REQUEST_URI'],'news.php')){
	 		$flag = 2;
	 	}
	 	if(strpos($_SERVER['REQUEST_URI'],'product.php')){
	 		$flag = 3;
	 	}
	 	if(strpos($_SERVER['REQUEST_URI'],'acc.php')){
	 		$flag = 4;
	 	}
	 	if(strpos($_SERVER['REQUEST_URI'],'detail.php')){
	 		$flag = 5;
	 	}
	 	if(strpos($_SERVER['REQUEST_URI'],'order.php')){
	 		$flag = 6;
	 	}
	 	if(strpos($_SERVER['REQUEST_URI'],'cart.php')){
	 		$flag = 6;
	 	}
	 	if(strpos($_SERVER['REQUEST_URI'],'address.php')){
	 		$flag = 6;
	 	}


	 ?>
	<div class="index-nav">
		<div class="index-nav-center">
			<ul class="ulu">
				<li <?php echo $flag==0 ?'class="active"':""; ?> ><a href="index.php">首页</a></li>
				<li <?php echo $flag==1 ?'class="active"':""; ?> ><a href="brand.php">品牌故事</a></li>
				<li <?php echo $flag==2 ?'class="active"':""; ?> ><a href="fashion.php">时尚资讯</a></li>
				<li <?php echo $flag==3 ?'class="active"':""; ?> ><a href="product.php">服装商城</a></li>
				<li <?php echo $flag==4 ?'class="active"':""; ?> ><a href="acc.php">联系我们</a></li>
			</ul>
			<ul class="ulul">
				<li style="color:#fff;">欢迎您：<span id="userName" style="color: #fff;"><?php echo $nick;?></span></li>
				<li><a href="login.php" id="loginBtn">登录</a></li>
				<li><a href="logout.php" id="logoutBtn">注销</a></li>
				<li><a href="login.php" id="registerBtn">注册</a></li>
				<li><a href="cart.php" id="cartBtn">购物车</a></li>
				<li><a href="order.php">订单</a></li>
			</ul>
		</div>
	</div> 
<script type="text/javascript" src="lib/js/jquery.min.js"></script>
	<script type="text/javascript">
		$(function(e){
			if($('#userName').text() == ""){
				$('#logoutBtn').hide();
				$('#loginBtn').show();
				$('#registerBtn').show();
				$('#cartBtn').hide();
			}else{
				$('#logoutBtn').show();
				$('#loginBtn').hide();
				$('#registerBtn').hide();
				$('#cartBtn').show();
			}
		});
		
	</script>