<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/ShelvesService.php");
require_once("home/model/responseResultInfo.php");

$id = $_GET["id"];

$shouhuo = ShelvesService::getShouHuo($id);

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($shouhuo){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $shouhuo;
}

echo json_encode($result);