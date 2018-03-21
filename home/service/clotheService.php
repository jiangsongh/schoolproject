<?php 

require_once("dbHelper.php");
require_once("home/model/clothesInfo.php");
require_once("home/util/globalSetting.php");	

class ClotheService{
	//获取所有服装 
	public static function getClothes(){
		$sql = "select id , name,price,colour,header,image,freestyleId,freestyleName,categoryId,categoryName,amount from clothe";

		$rs = DBHelper::executeQuery($sql);

		if(is_bool($rs)){
			return false;
		}

		$clothesName = [];

		foreach($rs as $row){
			$clotheName = new ClothesInfo();

			$clotheName -> id = $row[0];
			$clotheName -> name = $row[1];
			$clotheName -> price = $row[2];
			$clotheName -> colour = $row[3];
			$clotheName -> header = GlobalSetting::IMAGE_URL_HTTP . $row[4];
			$clotheName -> freestyleId = $row[6];
			$clotheName -> freestyleName = $row[7];
			$clotheName -> categoryId = $row[8];
			$clotheName -> categoryName = $row[9];
			$clotheName -> amount = $row[10];

			$clothesName[] = $clotheName;
		}
		return $clothesName;
	}
	//入库
	public static function putAway($id,$amount){
		$sql = "update clothe set amount = amount +'{$amount}' where id = '{$id}'";
		$rs = DBHelper::executeNonQuery($sql);

		return $rs;
	}
	//添加服装
	public static function addClothe($name , $price , $colour , $freestyleId , $categoryId , $header , $image){
		$sql = "insert into clothe(id,name,price,colour,header,freestyleId,freestyleName,categoryId,categoryName,image) values(UUID(),'{$name}','{$price}','{$colour}','{$header}','{$freestyleId}',(select name from freestyle where id='{$freestyleId}'),'{$categoryId}',(select name from category where id='{$categoryId}'),'{$image}')";

		$rs = DBHelper::executeNonQuery($sql);
		return $rs;
	}
	//获取单件服装//查看详情
	public static function getOneClothe($id){
		$sql = "select * from clothe where id='{$id}'";
		$rs = DBHelper::executeQuery($sql);
		return $rs;
	}
	//编辑服装
	public static function editClothe($id , $name , $price , $colour , $freestyleId , $categoryId , $header , $image){
		$sql = "update clothe set name='{$name}',price='{$price}',colour='{$colour}',header='{$header}',image='{$image}',freestyleId='{$freestyleId}',freestyleName=(select name from freestyle where id='{$freestyleId}'),categoryId='{$categoryId}',categoryName=(select name from category where id='{$categoryId}') where id='{$id}'";

		$rs = DBHelper::executeNonQuery($sql);

		return $rs;
	}
}

 ?>