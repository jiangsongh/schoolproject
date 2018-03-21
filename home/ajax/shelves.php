<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/ShelvesService.php");
require_once("home/model/responseResultInfo.php");


$orderList = ShelvesService::getShelves();

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($orderList){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $orderList;
}

echo json_encode($result);
 ?>