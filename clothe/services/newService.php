
<?php 


require_once("dbHelper.php");
require_once("util/globalSetting.php");
/*


*/
function getAllNews($pageIndex = 0, $pageSize = 5){
	$sql1 = "select id , titleId , titleEm ,title , createTime from news where 1=1";

	$sql2 = "select count(*) from news where 1=1";

	$startIndex = $pageIndex * $pageSize;
	$sql1 = $sql1 . " limit {$startIndex} , {$pageSize};";
	$sql = $sql1 . $sql2 . ";";

	$list = executeMultiQuery($sql);
	if(is_bool($list))
		return false;

	$newsList = [];
	if($list[0]){
		foreach ($list[0] as $item) {
			$newsList[] = [
				"id" => $item[0],
				"titleId" => $item[1],
				"titleEm" => $item[2],
				"title" => $item[3],
				"createTime" => $item[4]
			];
			
		}
	}
	

	$totalRowCount = $list[1][0][0];

	return [
		"list" => $newsList,
		"totalRowCount" => $totalRowCount
	];
}