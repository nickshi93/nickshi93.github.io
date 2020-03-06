<?php
	
	namespace app\admin\model;

	class Login extends BaseModel{
		
		protected $table='tp_user';
		
		public function updates($condition,$data)
		{
			
			$this->where($condition)->update($data);
				
		}
		
	}