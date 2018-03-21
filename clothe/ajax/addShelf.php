<?php 
	 
	header("content-type:application/json;charset=utf-8");
	require_once("../services/clotheService.php");
	require_once("../services/shelfService.php");

	if(!array_key_exists("Current" , $_COOKIE)){
		$result["code"] = 403;
		$result["message"] = "尚未登录";
		echo json_encode($result);
		exit;
	}

	$name = $_COOKIE["Current"];
	$name = explode("," , $name);
	$userId = $name[0];

	$result=[];

	//获取clotheId,并检查clotheId有效性
	$clotheId = "";

	if(array_key_exists("clotheId", $_GET)){
		$clotheId = $_GET["clotheId"];
	}


	if($clotheId == ""){
		$result["code"] = 104;
		$result["message"] = "参数无效";
		echo json_encode($result);
		exit;
	}

	// 检查服装信息是否有效

	// $clothe = getClotheId($clotheId); 

	// if(is_null($clothe)){
	// 	$result["code"] = 102;
	// 	$result["message"] = "该服装信息不存在";
	// 	echo json_encode($result);
	// 	exit;
	// }

	// if($clothe["number"] == 0){
	// 	$result["code"] = 103;
	// 	$result["message"] = "该服装没有库存.";
	// 	echo json_encode($result);
	// 	exit;
	// }


	$data = addShelf($userId , $clotheId);

	if($data){
		$result["code"] = 100;
		$result["message"] = "加入成功";
		$result["data"] = 1;
	}
	else{
		$result["code"] = 101;
		$result["message"] = "加入失败";
		$result["data"] = 0;
	}


	echo json_encode($result);
 ?>