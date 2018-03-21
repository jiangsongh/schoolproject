<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/newsService.php");
require_once("home/model/responseResultInfo.php");

$newsTitleId = $_POST["titleId"];
$newsTitle = $_POST["title"];
$newsTitleEm = $_POST["titleEm"];
$newsText = $_POST["text"];
$newsCreateTime = $_POST["createTime"];

$newsEdit = newsService::getNewsEdit($newsTitleId , $newsTitle , $newsTitleEm,$newsText,$newsCreateTime);

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($newsEdit){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $newsEdit;
}

echo json_encode($result);
 ?>