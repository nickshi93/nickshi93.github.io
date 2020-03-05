<?php 

	namespace app\admin\model;
	
	use think\Db;
	
	class Banner extends BaseModel
	{
		
		public function bcount()
		{
			
			return $this->count();
			
			
		}
		
		public function select($tol,$limit)
		{
			
			return $this->limit($tol,$limit)->select();
		}
		
		public function updates($condition,$data)
		{
			
			return $this->where($condition)->update($data);
			
		}
		
		public function del($condition)
		{
			return $this->where($condition)->delete();
			
		}
		
		
	}