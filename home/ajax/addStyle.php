<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/styleService.php");
require_once("home/model/responseResultInfo.php");

$styleName = $_POST["name"];
$stylePriority = $_POST["priority"];

$addStyle = styleService::getAddStyle($styleName , $stylePriority);

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($addStyle){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $addStyle;
}

echo json_encode($result);
 ?>