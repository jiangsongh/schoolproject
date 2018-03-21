<?php 


require_once("dbHelper.php");
require_once("util/globalSetting.php");
/*


*/
function getNews($id){
	$sql = "select * from news where titleId = '{$id}'";

	$list = executeQuery($sql);
	if(is_bool($list))
		return false;

	$detailList = [];

	foreach ($list as $item) {
			$detailList["id"] = $item["id"];
			$detailList["titleId"] = $item["titleId"];
			$detailList["title"] = $item["title"];
			$detailList["text"] = $item["text"];
	}

	
return $detailList;

}