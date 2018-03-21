<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/clotheService.php");
require_once("home/model/responseResultInfo.php");

$clotheList = ClotheService::getClothes();

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($clotheList){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $clotheList;
}

echo json_encode($result);

 ?>