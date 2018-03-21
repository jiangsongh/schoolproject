<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/categoryService.php");
require_once("home/model/responseResultInfo.php");

$categoryId = $_POST["id"];

$deleteCategory = categoryService::getDeleteCategory($categoryId);

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($deleteCategory){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $deleteCategory;
}

echo json_encode($result);
 ?>