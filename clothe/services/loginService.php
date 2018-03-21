<?php 


require_once("dbHelper.php");

/*
	功能描述：用户登录
	参数列表：
	返 回 值：false:操作失败
			  null:用户信息不正确
			  array:登录成功
*/

function login($phone , $password){

	    $con = mysqli_connect(DB_HOST ,DB_USER_NAME ,DB_PASSWORD , DB_NAME);

		if(mysqli_connect_errno()){
			return false;
		}

		$phone = mysqli_real_escape_string($con , $phone);
		$password = mysqli_real_escape_string($con ,$password);

		$password = md5($password);

		$sql = "select id,phone,password,nick from members where phone='{$phone}' and password='{$password}'";

		$list = executeQuery($sql);

		if(is_bool($list))
			return false;

		$user = null;
 
		if($list){
			$user = [
				"id" => $list[0]["id"],
				"phone" => $list[0]["phone"],
				"nick" => $list[0]["nick"]
			];
		}

		return $user;

}

/* 
	

*/
function register($phone , $password , $nick){
	$password = md5($password);
	$sql = "insert into members values(UUID() , '{$phone}' , '{$password}' , '{$nick}')";

	$list = executeNonQuery($sql);

	return $list;

}