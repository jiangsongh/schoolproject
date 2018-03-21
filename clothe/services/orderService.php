<?php 
	
require_once("dbHelper.php");

function getAllOrder($userId , $pageIndex = 0, $pageSize = 3){
	 

	$sql1 = "select o.id , o.shelvesId , o.createTime , o.memberId , o.clotheId , o.image , o.name , o.price , o.count , o.colour , o.size , o.province , o.city , o.address , o.linkman , o.phone , o.cate , o.state  from shelves o inner join clothe c on c.id = o.clotheId where o.memberId = '{$userId}' order by o.state asc , o.createTime";

	$sql2 = "select count(*) from shelves where 1=1";
 
	//分页
	$startIndex = $pageIndex * $pageSize;
	$sql1 = $sql1 . " limit {$startIndex} , {$pageSize};";
	$sql = $sql1 . $sql2 . ";";

	$list = executeMultiQuery($sql);
	if(is_bool($list))
		return false;

	$orderList = [];
	if($list[0]){
		foreach ($list[0] as $item) {
			$orderList[] = [
				"id" => $item[0],
				"shelvesId" => $item[1],
				"createTime" => $item[2],
				"memberId" => $item[3],
				"clotheId" => $item[4],
				"name" => $item[6],
				"image" => $item[5],
				"price" => $item[7],
				"count" => $item[8],
				"colour" => $item[9],
				"size" => $item[10],
				"province" => $item[11],
				"city" => $item[12],
				"address" => $item[13],
				"linkman" => $item[14],
				"phone" => $item[15],
				"cate" => $item[16],
				"state" => $item[17]
			];
		}
	}
	

	$totalRowCount = $list[1][0][0];
	return [
		"list" => $orderList,
		"totalRowCount" => $totalRowCount
	];
}


function getAllCartClothe($userId){
	$sql = "select cr.id,cr.memberId,cr.clotheId,cl.name,cl.price,cl.colour,cl.header,cl.freestyleName,cl.categoryName
from cart cr INNER JOIN clothe cl on cr.clotheId = cl.id 
where cr.memberId = '{$userId}'";
		$list = executeQuery($sql);
		if(is_bool($list))
			return false;

		$categories = [];
		foreach ($list as $item) {
			$categories[] = [
				"id" => $item["id"],
				"memberId" => $item["memberId"],
				"clotheId" => $item["clotheId"],
				"name" => $item["name"],
				"header" => $item["header"],
				"price" => $item["price"],
				"colour" => $item["colour"],
				"freestyleName" => $item["freestyleName"],
				"categoryName" => $item["categoryName"]
			];
		}

		return $categories;
}

 ?>
