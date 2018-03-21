<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/styleService.php");
require_once("home/model/responseResultInfo.php");

$styleId = $_POST["id"];

$deleteStyle = styleService::getDeleteStyle($styleId);

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($deleteStyle){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $deleteStyle;
}

echo json_encode($result);
 ?>