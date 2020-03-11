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
		
		
		//根据条件查询数据
		public function find($table,$condition)
		{

			$result = Db($table)->where($condition)->find();
			
			return $result;
		}
		
	
		//加密
		public function hash_psd($psd)
		{
			
			$password = md5(md5($psd));
			
			return $password;
		}
		
		public function selectb($table,$condition,$field)
		{
			
			$result =Db($table)->where($condition)->field($field)->select();
			
			return $result;
		}
		
	}