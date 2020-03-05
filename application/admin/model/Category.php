<?php
	
	namespace app\admin\model;
	
	class Category extends  BaseModel{	
		
		public function getAll($condition)
		{
			
			return $this->where($condition)->select();

		}
	
		public function add($data)
		{
			
			 $this->insert($data);
			
		}
		
		public function updates($condition,$data)
		{
			
			$this->where($condition)->update($data);
			
		}
		
		public function del($condition)
		{
			$this->where($condition)->delete();
			
		}
	}