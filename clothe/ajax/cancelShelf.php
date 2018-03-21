<?php 
	
	header("content-type:application/json;charset=utf-8");
	require_once("../services/clotheService.php");
	require_once("../services/shelfService.php");
	// require_once("../services/orderService.php");

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

	//获取BookId,并检查bookId有效性

	$shelvesId = "";
	$clothenumber = "";

	if(array_key_exists("shelvesId", $_GET)){
		$shelvesId = $_GET["shelvesId"];
	}


	if($shelvesId == ""){
		$result["code"] = 104;
		$result["message"] = "参数无效";
		echo json_encode($result);
		exit;
	}

	if(array_key_exists("clothenumber", $_GET)){
		$clothenumber = $_GET["clothenumber"];
	}


	if($clothenumber == ""){
		$result["code"] = 104;
		$result["message"] = "参数无效";
		echo json_encode($result);
		exit;
	}

	// 检查图书信息是否有效
	// echo $shelvesId;
	// echo $bookNumber;
	
	$bookCancel = getAllClotheCancel($shelvesId,$clothenumber);

	if($bookCancel){
		$result["code"] = 100;
		$result["message"] = "取消成功";
		$result["data"] = 1;
	}
	else{
		$result["code"] = 101;
		$result["message"] = "取消失败";
		$result["data"] = 0;
	}

	echo json_encode($result);
 ?>