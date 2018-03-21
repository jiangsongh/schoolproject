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

	$clothe = getClotheOnShelf($clotheId);

	// -3- 获取可借的具体图书信息

	$details = [];

	foreach($clothe as $item){
		$list = getDetailById($item["id"]);
		$details[] = $list;	
	}

	// 4-1	更新特定图书的状态

	// $sqlList = [];

	// foreach($details as $item){
	// 	$clothenumber = $item["number"];

	// 	$sql = "update clothedetails set state = 0 where number = '{$clothenumber}'";
	// 	$sqlList[] = $sql;
	// }

	// 4-2 插入借阅记录

	foreach ($details as $item) {
		$id = md5(microtime(true) . mt_rand());
		$shelvesId = ceil(microtime(true) * 1000) . "-" . mt_rand(1000, 9999);
		$createTime = ceil(microtime(true) * 1000);
		$clotheId = $item["clotheId"];

		$sql = "insert shelves(id , shelvesId , clotheId , memberId , createTime , state , image , price , colour , name , clothenumber , cate) values('{$id}' , '{$shelvesId}' , '{$clotheId}', '{$userId}' ,'{$createTime}' , 1 , (select header from clothe where id = '{$clotheId}') , (select price from clothe where id = '{$clotheId}') , (select colour from clothe where id = '{$clotheId}') , (select name from clothe where id = '{$clotheId}') , (select number from clothedetails where clotheId = '{$clotheId}' and state =1) , '定制订单')";

		// $sqlList = $sql;
	}


	// $sqlList[] = "delete from cart where memberId='{$userId}';";

	$flag = executeNonQuery($sql);
	
	if($flag){
		$result["code"] = 100;
		$result["message"] = "订单提交成功";
		// $sqq = "update clothedetails set state = 1 where clotheId='{$clotheId}'; ";
		// $fle[] = executeNonQuery($sqq);
	}
	else{
		$result["code"] = 101;
		$result["message"] = "订单提交失败";
	}

	echo json_encode($result);

 ?>