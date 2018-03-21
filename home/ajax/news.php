<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/newsService.php");
require_once("home/model/responseResultInfo.php");

$newsList = newsService::getNews();

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($newsList){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $newsList;
}

echo json_encode($result);

 ?>