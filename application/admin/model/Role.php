<?php 

	namespace app\admin\model;

	class Role extends BaseModel{
		
		//查询id角色的信息
		public function getAll($condition){
			
			return $this->where($condition)->select();
						
		}
		
		public function updates($condition,$data){
			
			$this->where($condition)->update($data);

		}
		
		public function selectlimit($tol,$limit)
		{
			return $this->limit($tol,$limit)->select(); 
		}
		
		public function counts()
		{
			
			return $this->count();
			
		}
		
		public function del($condition)
		{
			$this->where($condition)->delete();
		}
		
		public function add($data)
		{
			$this->save($data);
		}

		
	}
	