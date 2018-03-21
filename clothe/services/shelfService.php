<?php 
 
	require_once("dbHelper.php");
    
	function addShelf($userId , $clotheId){
		$uuid = md5(microtime(true) . mt_rand());
		$time = time();
		$sql = "insert into cart(id , memberId , clotheId, createTime) 
		values('{$uuid}' , '{$userId}' ,'{$clotheId}' , {$time} );";

		return executeNonQuery($sql);
	} 
 
	function delOneShelf($userId , $id){
		$uuid = md5(microtime(true) . mt_rand());
		$time = time();
		$sql = "delete from cart where memberId='{$userId}' and id='{$id}';";

		return executeNonQuery($sql);
	}

	function delAllShelf($userId){
		$uuid = md5(microtime(true) . mt_rand());
		$time = time();
		$sql = "delete from cart where memberId='{$userId}'";

		return executeNonQuery($sql);
	}

	function getClotheInShelf($userId){
		$sql = "select cl.id,cl.name,cl.price,cl.colour,cl.header,(select count(1) from clothedetails where state =1 and clotheId = cl.id) from clothe cl inner join cart ca on ca.clotheId = cl.id where memberId = '{$userId}'";

		$result = executeQuery($sql);

		if(is_bool($result))
			return false;

		$clothes = [];
		foreach($result as $item){
			$clothes[] = [
				"id" => $item[0],
				"name" => $item[1],
				"price" => $item[2],
				"color" => $item[3],
				"header" => $item[4],
				"number" => $item[5]
			];
		}

		return $clothes;
	}

	function getAllClotheCancel($shelvesId,$number){
		$sqlList = [];
		$sqlList[] = "update shelves set state = 0 where shelvesId='{$shelvesId}';";
		$sqlList[] = "update clotheDetails set state = 1 where number='{$number}';";

		return executeMultiNonQuery($sqlList);
	}

	function getAllClotheCanfirm($shelvesId){
		$sql = "update shelves set state = 3 where shelvesId='{$shelvesId}';";

		return executeNonQuery($sql);
	}

	function getClotheOnShelf($clotheId){
		$sql = "select id,name,price,colour,header from clothe where id = '{$clotheId}'";

		$result = executeQuery($sql);


		if(is_bool($result))
			return false;

		$clothes = [];
		foreach($result as $item){
			$clothes[] = [
				"id" => $item[0],
				"name" => $item[1],
				"price" => $item[2],
				"colour" => $item[3],
				"header" => $item[4]
			];
		}

		return $clothes;
	}


