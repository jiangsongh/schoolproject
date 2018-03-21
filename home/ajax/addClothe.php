<?php 

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Method:POST,GET');
header("content-type:application/json;charset=utf-8");

require_once("home/service/clotheService.php");
require_once("home/model/responseResultInfo.php");

$name = $_POST["name"];
$price = $_POST["price"];
$colour = $_POST["colour"];
$freestyleId = $_POST["freestyleId"];
$categoryId = $_POST["categoryId"];
$header = $_POST["header"];
$image = $_POST["image"];

$addClothe = clotheService::addClothe($name , $price , $colour , $freestyleId , $categoryId , $header , $image);

$result = new ResponseResultInfo(101 , "请求失败" , null);

if($addClothe){
	$result -> code =100;
	$result -> message = "请求成功";
	$result -> data = $addClothe;
}

echo json_encode($result);
 ?>