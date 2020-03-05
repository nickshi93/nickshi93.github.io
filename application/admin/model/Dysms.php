<?php
	
	NAMESPACE app\admin\model;
	
	USE think\model;
	
	class Dysms extends BaseModel{
		
		
		public function updates($condition,$data)
		{
			
			$this->where($condition)->update($data);
			
		}
		
		public function getAll($condition)
		{
			
			return $this->where($condition)->select();
		}
	}