
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="logo.ico"/>
    <title>Fullscreen Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- <link rel="stylesheet" href="css/index.css"> -->

</head>

<body oncontextmenu="return false">

	<?php 
	session_start();
	if(array_key_exists("Current",$_COOKIE)){
	    header("location:index.php");
        exit;
    }

	require_once("services/loginService.php");

	$msg = "";
	$msg1 = "";

	if(!empty($_POST['login'])){
		$phone = $_POST["phone"];
		$password = $_POST["password"];
		$code = $_POST["yanZhen"];

		if(strtolower($_SESSION["captcha"]) == strtolower($code)){
			$_SESSION["captcha"] = "";

			$user = login($phone , $password);

	 		$uuser = implode("," , $user);

			if(!is_null($user)){
				
				if(array_key_exists("checked",$_POST)){
	                  setcookie("Current",$uuser , time()+60*24*60*7);
		        }else{
		        	setcookie("Current",$uuser);
		        }

	            header("location:index.php");
	            exit;
			}
			$msg = "用户信息不正确";
		}
		else{
			$msg1 = "验证码无效";
		}
	}
	else if(!empty($_POST['register'])){
		$regNick = $_POST["regNick"];
		$regPhone = $_POST["regPhone"];
		$regPassword = $_POST["regPassword"];
		$regist = register($regPhone , $regPassword , $regNick);

		if(!empty($regist)){
			echo '<script language="javascript">alert("注册成功");location.href="login.php";</script>';
		}else{
			echo '<script language="javascript">alert("注册失败");location.href="login.php";</script>';
		}
		
		
	}		

	 ?>


 
    <div class="jq22-container">
    	<div class="div-video">
			<video controls autoplay>
				<source src="video/login.mp4" type="video/mp4">
			</video>
		</div>
		<div class="login-wrap">
			<div class="login-html">
				<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
				<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
				<div class="login-form">
					<form method="post">
						<div class="sign-in-htm">
							<div class="group">
								<label for="userPhone" class="label">Username</label>
								<input id="userPhone" name="phone" type="text" class="input" value="18852923032">
								<span style="color: red;"><?php echo $msg; ?></span>
							</div>
							<div class="group">
								<label for="userPassword" class="label">Password</label>
								<input id="userPassword" name="password" type="password" class="input" data-type="password" value="3032">
							</div>
							<div class="group">
								<label for="userCode" class="label">请输入图片中的验证码</label>
								<input class="user-code" id="userCode" type="text" name="yanZhen">
								<img src="util/image_captcha.php"  onclick="this.src='util/image_captcha.php?'+new Date().getTime();" width="200" height="40">
								<span style="color: red;"><?php echo $msg1; ?></span>
							</div>
							<div class="group">
								<input id="check" type="checkbox" class="check" checked>
								<label for="check"><span class="icon"></span> Keep me Signed in</label>
							</div>
							<div class="group" style="cursor: pointer;width: 49%;display: inline-block;">
								<input type="submit" name="login" class="button" value="Sign In">
							</div>	
							<div class="group" style="cursor: pointer;width: 49%;display: inline-block;">
								<input type="button" class="button" value="go Back" onclick="history.back();" style="background-color: #fff;color: red;">
							</div>				
						</div>
					</form>
					
					<form method="post" id="frm">
						<div class="sign-up-htm">
							<div class="group">
								<label for="txtNick" class="label">Nick</label>
								<input id="txtNick" name="regNick" type="text" class="input">
							</div>
							<div class="group">
								<label for="txtPhone" class="label">Username</label>
								<input id="txtPhone" name="regPhone" type="text" class="input">
							</div>
							<div class="yan">
								<input id="txtCode" type="text" name="regYanZhen">
								<input id="btnSendCode" type="button" class="button" value="获取验证码">
							</div>
							<div class="group">
								<label for="txtPassword" class="label">Password</label>
								<input id="txtPassword" name="regPassword" type="password" class="input" data-type="password">
							</div>
							<div class="group">
								<label for="txtConfirm" class="label">Repeat Password</label>
								<input id="txtConfirm" name="regPonfirm" type="password" class="input" data-type="password">
							</div>
							<div class="group" style="cursor: pointer;width: 49%;display: inline-block;">
								<input type="submit" name="register" class="button" value="Sign Up">
							</div>
							<div class="group" style="cursor: pointer;width: 49%;display: inline-block;">
								<input type="button" class="button" value="go Back" onclick="history.back();" style="background-color: #fff;color: red;">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	

    <!-- Javascript -->
	<script src="lib/js/jquery.min.js"></script>
	<script src="lib/js/jquery.validate.js"></script>
	<script src="js/register.js"></script>
</body>

</html>

