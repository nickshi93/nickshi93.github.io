<?php 

	namespace app\admin\model;
	
	class Member extends BaseModel{
		
		
		public function counts($condition)
		{
			
			return $this->where($condition)->count();
			
		}
		
		public function getAll($condition)
		{
			return $this->where($condition)->select();
			
		}
		
		public function updates($condition,$data)
		{
			
			$this->where($condition)->update($data);
		}
		
		
		public function del($condition)
		{
			
			$this->where($condition)->delete();
			
		}
		
		public function add($data)
		{
			$this->save($data);
			
		}
		
		
		public function searchcount($selects,$username,$condition)
		{
			
			return $this->where($selects,'like','%'.$username.'%')->where($condition)->count();
			
		}
		
		
		public function search($selects,$username,$condition)
		{
			
			return $this->where($selects,'like','%'.$username.'%')
							
				->where($condition)
							
				->order('id desc')
							
				->select(); 	
			
		}
	}