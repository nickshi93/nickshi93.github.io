<?php
	
	namespace app\admin\model;
	
	use think\Db;
	
	class Login extends BaseModel{
		
		public function updates($condition,$data)
		{
			
			Db('user')->where($condition)->update($data);
				
		}
		
	}