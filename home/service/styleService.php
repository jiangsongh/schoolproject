<?php 

require_once("dbHelper.php");
require_once("home/model/styleInfo.php");
require_once("home/model/clothesInfo.php");
require_once("home/util/globalSetting.php");

class StyleService{
	//获取所有风格
	public static function getStyle(){
		$sql = "select id ,name ,priority from freestyle";

		$rs = DBHelper::executeQuery($sql);
		
		if(is_bool($rs)){
			return false;
		}

		$stylesName = [];

		foreach($rs as $row){
			$styleName = new ClothesInfo();

			$styleName -> id = $row[0];
			$styleName -> name = $row[1];
			$styleName -> priority = $row[2];

			$stylesName[] = $styleName;
		}

		return $stylesName;
	}
	//添加风格栏目
	public static function getAddStyle($styleName,$stylePriority){
		$sql = "insert into freestyle(id,name,priority) values(UUID(),'{$styleName}','{$stylePriority}')";
		$rs = DBHelper::executeNonQuery($sql);

		return $rs;
	}
	//更新栏目
	public static function getStyleEdit($styleId,$styleName,$stylePriority){
		$sql = "update freestyle set name = '{$styleName}' , priority = '{$stylePriority}' where id = '{$styleId}'";

		$rs = DBHelper::executeNonQuery($sql);

		return $rs;
	}
	//删除栏目
	public  static function getDeleteStyle($styleId){
		$sql = "delete from freestyle where id='{$styleId}'";
		$rs = DBHelper::executeNonQuery($sql);
		return $rs;
	}


}


 ?>