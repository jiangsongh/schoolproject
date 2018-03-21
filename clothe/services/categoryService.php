<?php 


require_once("dbHelper.php");
/*


*/
function getAllCategories(){
	$sql = "select id ,name from category";
	$list = executeQuery($sql);
	if(is_bool($list))
		return false;

	$categories = [];
	foreach ($list as $item) {
		$categories[] = [
			"id" => $item["id"],
			"name" => $item["name"]
		];
	}

	return $categories;
}