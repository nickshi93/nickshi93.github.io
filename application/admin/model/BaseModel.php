<?php
	
	namespace app\admin\model;
	
	use think\Model;
	
	use think\Db;
	
	Class BaseModel extends Model{
		
		
		protected function initialize(){
			
			
			
			
		}
		//根据条件统计数据
		public function counts($table,$condition){
			
			$result = Db($table)->where($condition)->count();
			
			return $result;
		}
		
		//根据统计表格数据
		public function countform($table){
			
			$result = Db($table)->count();
			
			return $result;
		}
		
		//更新数据
		public function updates($table,$condition,$data){
			
			$result= Db($table)->where($condition)->update($data);
			
		}
		
		//删除数据
		public function del($table,$condition){
			
			Db($table)->where($condition)->delete();
			
			return true;
		}
		
		//根据条件查询数据
		public function select($table,$condition){

			$result = Db($table)->where($condition)->select();
			
			return $result;
		}
		
		//根据条件查询数据
		public function find($table,$condition){

			$result = Db($table)->where($condition)->find();
			
			return $result;
		}
		
		//表格数据
		public function selects($table){
			
			$result = Db($table)->select();
			
			return $result;
			
		}
		
		//表格插入数据
		public function insert($table,$data){
			
			$result= Db($table)->insert($data);
			
			return true;
		}
		
	}