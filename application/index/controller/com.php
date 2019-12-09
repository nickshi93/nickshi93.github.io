<?php 
	namespace app\index\Controller;
	
	use think\Db;
	
	class com{
		/*新增数据*/
		function add($data,$table){
		
			return  Db::table($table)->insert($data);  //插入数据
		
		}
		/*新增多条数据*/
		function addall($data,$table){
		
			return  Db::table($table)->insertAll($data);  //插入多条数据
		
		}
	
		function deletes($table,$condition1,$condition2,$condition3){
		
			return Db::table($table)->where($condition1,$condition2,$condition3)->delete();

		}
		
	}	
	