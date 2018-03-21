<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/memberService.php");
require_once("home/model/responseResultInfo.php");

$phone = $_POST["phone"];
$password = $_POST["password"];

$memberLogin = MemberService::getManageLogin($phone , $password);

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($memberLogin){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $memberLogin;
}

echo json_encode($result);
 ?>