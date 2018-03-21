<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/newsService.php");
require_once("home/model/responseResultInfo.php");

$titleId = $_POST["titleId"];

$deleteNews = newsService::getDeleteNews($titleId);

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($deleteNews){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $deleteNews;
}

echo json_encode($result);
 ?>