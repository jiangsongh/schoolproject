<?php 
class DBHelper{

	const DB_HOST = "192.168.12.116"; // static
	const DB_USER_NAME = "root";
	const DB_PASSWORD = "jiangsh";
	const DB_DATABASE_NAME = "clothe";

/*

	*/
	public static function executeNonQuery($sql){

		$con = @new mysqli(self::DB_HOST , self::DB_USER_NAME , self::DB_PASSWORD , self::DB_DATABASE_NAME);


		if($con -> connect_errno){
			return false;
		}

		$val = $con -> query($sql);

		$con -> close();

		return $val;

	}

	/*
	
	*/
	public static function executeQuery($sql){
		// 创建连接对象
		$con = @new mysqli(self::DB_HOST , self::DB_USER_NAME , self::DB_PASSWORD , self::DB_DATABASE_NAME);
		// 检查连接状态
		if($con -> connect_errno){
			return false;
		}
		// 执行SQL语句
		$result = $con -> query($sql);

		if($result){
			$rows = $result->fetch_all();

			$result->close();
			$con -> close();

			return $rows;
		}

		$con -> close();
		return false;

	}
}