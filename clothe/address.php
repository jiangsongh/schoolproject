<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>地址</title>
	<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css"/>
    <link rel="stylesheet" href="css/order.css"/>
    <link rel="stylesheet" href="css/cart.css"/>
    <link rel="stylesheet" href="css/address.css"/>
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
		$msg = "";

		require_once("services/addressService.php");

        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $province = $_POST["province"];
          $city = $_POST["city"];
          $address = $_POST["address"];
          $linkman = $_POST["linkman"];
          $phone = $_POST["phone"];

          $address = getAddress($province , $city , $address , $linkman , $phone , $userId);

          // if(!is_null($user)){
          //   if(array_key_exists("checked",$_POST)){
          //         setcookie("Current",$phone,time()+60*24*60*7);
          //     }else{
          //         setcookie("Current",$phone);
          //     }

          //   header("location:index.php");
          //   exit;
          // }
         header("location:order.php");
        exit;

          $msg = "用户信息不正确";

        }
	 ?>

	<?php 
		include_once("inc/head.php");
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
			      <img src="image/right.png" alt=""/>选择地址
			    </div>
  			</div>
  			<div class="address-body">
  				<form id="frm" class="address-form" method="post">
					<div>
						<span>所在省</span>
						<input type="text" name="province">
					</div>
					<div>
						<span>所在市</span>
						<input type="text" name="city">
					</div>
					<div>
						<span>详细地址</span>
						<input type="text" name="address">
						<span style="color: #999999;">准确填写收货地址，以便商品准确无误送达</span>
					</div>
					<div>
						<span>收货人姓名</span>
						<input type="text" name="linkman">
						<span style="color: #999999;">准确填写收货人姓名，以便他人签收</span>
					</div>
					<div>
						<span>收货人电话</span>
						<input type="text" name="phone">
						<span style="color: #999999;">准确填写收货人电话，以方便联系</span>
					</div>
					<button class="btn btn-info">确定提交</button>
				</form>
  			</div>
			
		</div>
	</div>
	


	 <?php 
		include_once("inc/footer.php");
	 ?>
	 <script src="lib/js/jquery.min.js"></script>
	<script src="lib/js/jquery.validate.js"></script>
	 <script type="text/javascript">
	 	$(function(e){
	 		$.validator.addMethod('userNameIsValid' , function(value , element , params){

				var pattern = /^1[34578]\d{9}$/;
				return pattern.test(value);
			});
	 		$('#frm').validate({
	 			rules:{
	 				province:{
	 					required:true,
		 				minlength:2
	 				},
	 				city:{
	 					required:true,
	 					minlength:2
	 				},
	 				address:{
	 					required:true,
	 					minlength:3
	 				},
	 				linkman:{
	 					required:true,
	 					minlength:2
	 				},
	 				phone:{
	 					required:true,
						userNameIsValid:{
							pattern:/^1[3|4|5|7|8][0-9]{9}$/,
							message:'用户名格式无效'
						}
	 				}
	 			},
	 			messages:{
	 				province:{
	 					required:'省份不能为空',
	 					minlength:'长度至少2位'
	 				},
	 				city:{
	 					required:'市不能为空',
	 					minlength:'长度至少2位'
	 				},
	 				address:{
	 					required:'详细地址不能为空',
	 					minlength:'长度至少3位'
	 				},
	 				linkman:{
	 					required:'联系人不能为空',
	 					minlength:'长度至少2位'
	 				},
	 				phone: {
		               required: '用户名不能为空',
		               userNameIsValid:'手机号格式无效'
		           }
	 			}
	 		});
	 	})
	 </script>
</body>
</html>