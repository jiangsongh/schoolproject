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

 	require_once("../services/shelfService.php");

 	$clothe = getClotheInShelf($userId);

 // 	foreach ($clothe as $item) {
	// 	if($item["number"] == 0){
	// 		$result["code"] = 106;
	// 		$result["message"] = "图书没有库存"; 
	// 		echo json_encode($result);
	// 		exit;
	// 	}
	// }

	// -3- 获取衣服信息

	$details = [];

	foreach($clothe as $item){
		$list = getDetailById($item["id"]);
		$details[] = $list;	
	}

	// 4-1	更新特定衣服的状态

	$sqlList = [];

	foreach($details as $item){
		$clothenumber = $item["number"];

		$sql = "update clothedetails set state = 0 where number = '{$clothenumber}'";
		$sqlList[] = $sql;
	}

	// 4-2 插入购买记录

	foreach ($details as $item) {
		$id = md5(microtime(true) . mt_rand());
		$shelvesId = ceil(microtime(true) * 1000) . "-" . mt_rand(1000, 9999);
		$createTime = ceil(microtime(true) * 1000);
		$clotheId = $item["clotheId"];

		$sql = "insert shelves(id , shelvesId , clotheId , memberId , createTime , state , image , price , colour , name , clothenumber , cate) values('{$id}' , '{$shelvesId}' , '{$clotheId}', '{$userId}' ,'{$createTime}' , 1 , (select header from clothe where id = '{$clotheId}') , (select price from clothe where id = '{$clotheId}') , (select colour from clothe where id = '{$clotheId}') , (select name from clothe where id = '{$clotheId}') , (select number from clothedetails where clotheId = '{$clotheId}' and state =1) , '普通订单')";

		$sqlList[] = $sql;
	}


	$sqlList[] = "delete from cart where memberId='{$userId}';";

	$flag = executeMultiNonQuery($sqlList);
	
	if($flag){
		$result["code"] = 100;
		$result["message"] = "订单提交成功";
		$sqq = "update clothedetails set state = 1 where clotheId='{$clotheId}'; ";
		$fle[] = executeNonQuery($sqq);
	}
	else{
		$result["code"] = 101;
		$result["message"] = "订单提交失败";
	}

	echo json_encode($result);


 ?>