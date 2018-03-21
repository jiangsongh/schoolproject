<?php 

require_once("dbHelper.php");

function getAllFreeStyle(){
	$sql = "select id ,name from freestyle";
	$list = executeQuery($sql);
	if(is_bool($list))
		return false;

	$freestyles = [];
	foreach ($list as $item) {
		$freestyles[] = [
			"id" => $item["id"],
			"name" => $item["name"]
		];
	}
	return $freestyles;
}


 ?>