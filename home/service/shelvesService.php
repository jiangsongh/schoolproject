<?php 

require_once("dbHelper.php");
require_once("home/model/shelvesInfo.php");
require_once("home/util/globalSetting.php");

 class ShelvesService{
 	//获取所有订单
 	public static function getShelves(){
 		$sql = "select id,shelvesId,createTime,price,count,colour,cate,state,name from shelves";
 		$rs = DBHelper::executeQuery($sql);
		
		if(is_bool($rs)){
			return false;
		}

		$ordersName = [];

		foreach($rs as $row){
			$orderName = new shelvesInfo();

			$orderName -> id = $row[0];
			$orderName -> shelvesId = $row[1];
			$orderName -> createTime = $row[2];
			$orderName -> price = $row[3];
			$orderName -> count = $row[4];
			$orderName -> colour = $row[5];
			$orderName -> cate = $row[6];
			$orderName -> state = $row[7];
			$orderName -> name = $row[8];

			$ordersName[] = $orderName;
		}

		return $ordersName;
 	}

 	//配送
 	public static function getPeiSong($id){
 		$sql = "update shelves set state = 2 where id = '{$id}'";
 		$rs = DBHelper::executeNonQuery($sql);
 		return $rs;
 	}
 	//收货
 	public static function getShouHuo($id){
 		$sql = "update shelves set state = 4 where id = '{$id}'";
 		$rs = DBHelper::executeNonQuery($sql);
 		return $rs;
 	}

 }