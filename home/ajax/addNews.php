<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/newsService.php");
require_once("home/model/responseResultInfo.php");

$newsTitle = $_POST["title"];
$newsTitleEm = $_POST["titleEm"];
$newsText = $_POST["text"];
$newsCreateTime = $_POST["createTime"];

$addNews = newsService::getAddNews($newsTitle , $newsTitleEm,$newsText,$newsCreateTime);

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($addNews){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $addNews;
}

echo json_encode($result);
 ?>