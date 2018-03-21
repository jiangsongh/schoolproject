<?php 
require_once("dbHelper.php");
require_once("home/model/memberInfo.php");

class MemberService{

	//getManageLogin
	public static function getManageLogin($phone , $password){
		$password = md5($password);
		$sql = "select id,phone,password,nick from members where phone='{$phone}' and password='{$password}'";

		$log = DBHelper::executeQuery($sql);

		if(is_bool($log)){
			return false;
		}

		$userMessage = [];

		foreach ($log as $item) {
			$user = new MemberInfo();

			$user -> id = $item[0];
			$user -> phone = $item[1];
			$user -> nick = $item[3];

			$userMessage[] = $user;
		}
		return $userMessage;
	}



}


 ?>