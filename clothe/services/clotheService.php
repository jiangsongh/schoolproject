<?php 

require_once("dbHelper.php");

	/*
	*获取所有西装
	*/

function getAllClothe($freestyleId="" , $categoryId="" , $pageIndex = 0, $pageSize = 15){
	$sql1 = "select c.id , c.name,c.price,c.colour,c.header,c.image,c.freestyleId,c.freestyleName,c.categoryId,c.categoryName from clothe c inner join freestyle f on c.freestyleId = f.id inner join category g on c.categoryId = g.id where 1=1";

	$sql2 = "select count(*) from clothe c inner join freestyle f on c.freestyleId = f.id inner join category g on c.categoryId = g.id where 1=1";

	if($freestyleId != ""){
		$sql1 = $sql1 . " and f.id = '{$freestyleId}'";
		$sql2 = $sql2 . " and f.id = '{$freestyleId}'";
	}

	if($categoryId != ""){
		$sql1 = $sql1 . " and g.id = '{$categoryId}'";
		$sql2 = $sql2 . " and g.id = '{$categoryId}'";
	}



	$startIndex = $pageIndex * $pageSize;
	$sql1 = $sql1 . " limit {$startIndex} , {$pageSize};";
	$sql = $sql1 . $sql2 . ";";

	$list = executeMultiQuery($sql);
	if(is_bool($list))
		return false;

	$clotheList = [];
	if($list[0]){
		foreach ($list[0] as $item) {
			$clotheList[] = [
				"id" => $item["id"],
				"name" => $item["name"],
				"price" => $item["price"],
				"colour" => $item["colour"],
				"header" => $item["header"],
				"image" => $item["image"],
				"freestyleId" => $item["freestyleId"],
				"freestyleName" => $item["freestyleName"],
				"categoryId" => $item["categoryId"],
				"categoryName" => $item["categoryName"]

			];
		}
	}
	$totalRowCount = $list[1][0][0];
	return [
		"list" => $clotheList,
		"totalRowCount" => $totalRowCount
	];
} 

	/*
	*根据单件衣服ID
	*获取单件西装
	*/

function getClotheId($clotheId){
	$sql = "select * from clothe where id='$clotheId'";
	$result = executeQuery($sql);
	if(is_bool($result)){
		return false;
	}

	$clothe = null;
	if($result){
		$clothe = [
			"id" => $result["id"],
			"name" => $result["name"],
			"price" => $result["price"],
			"colour" => $result["colour"],
			"header" => $result["header"],
			"freestyleName" => $result["freestyleName"],
			"categoryName" => $result["categoryName"],
			"image" => $result["colour"]
		];
	}

	return $clothe;
}

function getDetailById($clotheId){
	
	$sql = "select id,clotheId,number,state from clothedetails where clotheId = '{$clotheId}' and state = 1";

	$result = executeQuery($sql);
	if(is_bool($result)){
		return false;
	}

	$details = [];

	foreach($result as $item){
		$details = [
			"id" => $item["id"],
			"clotheId" => $item["clotheId"],
			"number" => $item["number"]
		];
	}

	return $details;
}

 ?>