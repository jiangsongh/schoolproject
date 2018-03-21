<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/styleService.php");
require_once("home/model/responseResultInfo.php");


$styleList = StyleService::getStyle();

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($styleList){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $styleList;
}

echo json_encode($result);
 ?>