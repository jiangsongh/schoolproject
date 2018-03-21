<?php 

require_once("dbHelper.php");
require_once("home/model/categoryInfo.php");
require_once("home/model/clothesInfo.php");
require_once("home/util/globalSetting.php");	

class CategoryService{
	//获取所有类别
	public static function getCategory(){
		$sql = "select id ,name ,priority from category";

		$rs = DBHelper::executeQuery($sql);

		if(is_bool($rs)){
			return false;
		}

		$categorysName = [];

		foreach($rs as $row){
			$categoryName = new ClothesInfo();

			$categoryName -> id = $row[0];
			$categoryName -> name = $row[1];
			$categoryName -> priority = $row[2];

			$categorysName[] = $categoryName;
		}
		return $categorysName;
	}

	//添加类别栏目
	public static function getAddCategory($categoryName,$categoryPriority){
		$sql = "insert into category(id,name,priority) values(UUID(),'{$categoryName}','{$categoryPriority}')";
		$rs = DBHelper::executeNonQuery($sql);

		return $rs;
	}

	//编辑类别栏目
	public static function getCategoryEdit($categoryId,$categoryName,$categoryPriority){
		$sql = "update category set name = '{$categoryName}' , priority = '{$categoryPriority}' where id = '{$categoryId}'";

		$rs = DBHelper::executeNonQuery($sql);

		return $rs;
	}

	//删除栏目
	public  static function getDeleteCategory($categoryId){
		$sql = "delete from category where id='{$categoryId}'";
		$rs = DBHelper::executeNonQuery($sql);
		return $rs;
	}
}

 ?>