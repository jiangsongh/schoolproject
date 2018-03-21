<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/categoryService.php");
require_once("home/model/responseResultInfo.php");

$categoryList = categoryService::getCategory();

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($categoryList){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $categoryList;
}

echo json_encode($result);

 ?>