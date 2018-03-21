<?php 


require_once("dbHelper.php");
require_once("util/globalSetting.php");
/*


*/
function getClotheDetail($id){
	$sql = "select * from clothe where id = '{$id}'";
	$list = executeQuery($sql);
	if(is_bool($list))
		return false;

	$detailList = [];
	foreach ($list as $item) {
		$detailList["id"]=$item["id"];
		$detailList["name"]=$item["name"];
		$detailList["price"]=$item["price"];
		$detailList["image"]=$item["image"];
		$detailList["images"]=explode(",",$item["image"]);

		$count = count($detailList["images"]);
			for($i = 0 ; $i < $count; $i++){
				$detailList["image"][$i] = IMAGE_URL_HTTP . $detailList["images"][$i] ;
			}

		$detailList["header"]=$item["header"];
		$detailList["colour"]=$item["colour"];
	}

	return $detailList;
}