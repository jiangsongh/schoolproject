<?php 
	require_once("dbHelper.php");
	
	function getAddress($province , $city , $address , $linkman , $phone){
		$sql = "insert into shelves($province , $city , $address , $linkman , $phone) values('{$province}' , '{$city}' , '{$address}' , '{$linkman}' , '{$phone}')";

		$list = executeNonQuery($sql);

		return $list;

}
 ?>