<?php 
	
	header("content-type:application/json;charset=utf-8");
	require_once("../services/clotheService.php");
	require_once("../services/shelfService.php");

	$name = $_COOKIE["Current"];
	$name = explode("," , $name);
	$userId = $name[0];

	$result=[];

	$data = delAllShelf($userId);

	if($data){
		$result["code"] = 100;
		$result["message"] = "删除成功";
		$result["data"] = 1;
	}
	else{
		$result["code"] = 101;
		$result["message"] = "删除失败";
		$result["data"] = 0;
	}

 
	echo json_encode($result);
 ?>  