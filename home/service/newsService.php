<?php 

require_once("dbHelper.php");
require_once("home/model/newsInfo.php");
require_once("home/model/clothesInfo.php");
require_once("home/util/globalSetting.php");	

class NewsService{
	//获取所有资讯
	public static function getNews(){
		$sql = "select id , titleId , titleEm ,title,text , createTime from news where 1=1";

		$rs = DBHelper::executeQuery($sql);

		if(is_bool($rs)){
			return false;
		}

		$newsName = [];

		foreach($rs as $row){
			$newName = new ClothesInfo();

			$newName -> id = $row[0];
			$newName -> titleId = $row[1];
			$newName -> titleEm = $row[2];
			$newName -> title = $row[3];
			$newName -> text = $row[4];
			$newName -> createTime = $row[5];

			$newsName[] = $newName;
		}
		return $newsName;
	}
	//添加资讯
	public static function getAddNews($newsTitle,$newsTitleEm,$newsText,$newsCreateTime){
		// $time = time();
		$sql = "insert into news(titleId,title,titleEm,text,createTime) values(UUID(),'{$newsTitle}','{$newsTitleEm}','{$newsText}','{$newsCreateTime}')";
		$rs = DBHelper::executeNonQuery($sql);

		return $rs;
	}
	//编辑资讯
	public static function getNewsEdit($newsTitleId,$newsTitle,$newsTitleEm,$newsText,$newsCreateTime){
		$sql = "update news set title = '{$newsTitle}' , titleEm = '{$newsTitleEm}',text = '{$newsText}',createTime='{$newsCreateTime}' where titleId = '{$newsTitleId}'";

		$rs = DBHelper::executeNonQuery($sql);

		return $rs;
	}
	//删除新闻
	public  static function getDeleteNews($newsTitleId){
		$sql = "delete from news where titleId='{$newsTitleId}'";
		$rs = DBHelper::executeNonQuery($sql);
		return $rs;
	}
}

 ?>