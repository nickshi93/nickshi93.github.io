<?php
	
	namespace app\admin\model;
	
	use think\Model;
	
	use think\Db;
	
	Class BaseModel extends Model{
		
		protected function initialize(){

			$this->return_code;
		}
		
		private   $return_code =[
		
			'00010'=>'登录成功',
			'00020'=>'登录失败',
			'00030'=>'退出成功',
			
			'10010'=>'新增成功',
			'10020'=>'新增失败',
			
			'20010'=>'删除成功',
			'20020'=>'删除失败',
			
			'30010'=>'编辑成功',
			'30020'=>'编辑失败',
			
			'40010'=>'启用成功',
			'40020'=>'禁用成功',
			
			'50010'=>'更新成功',
			'50020'=>'更新失败',
		
		];
		
		public  function msg($code)
		{
			
			$msg = $this->return_code[$code];
			
			return $msg;
			
		}
		
	
		//根据条件统计数据
		public function counts($table,$condition){
			
			$result = Db($table)->where($condition)->count();
			
			return $result;
		}
		
		
		//更新数据
		public function updates($table,$condition,$data){
			
			Db($table)->where($condition)->update($data);
			
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
		
		
		//表格插入数据
		public function insert($table,$data){
			
			Db($table)->insert($data);

		}
		
		//加密
		public function hash_psd($psd){
			
			$password = md5(md5($psd));
			
			return $password;
		}
	}