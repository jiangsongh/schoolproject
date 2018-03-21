<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/categoryService.php");
require_once("home/model/responseResultInfo.php");

$categoryName = $_POST["name"];
$categoryPriority = $_POST["priority"];

$addCategory = categoryService::getAddCategory($categoryName , $categoryPriority);

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($addCategory){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $addCategory;
}

echo json_encode($result);
 ?>