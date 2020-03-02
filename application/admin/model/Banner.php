<?php 

	namespace app\admin\model;
	
	use think\Db;
	
	class Banner extends BaseModel
	{
		
		public function bannercount()
		{
			
			return $this->count();
			
			
		}
		
		public function select($tol,$limit)
		{
			
			return $this->limit($tol,$limit)->select();
		}
		
		public function updateb($condition,$data)
		{
			
			return $this->where($condition)->update($data);
			
		}
		
		public function deletes($condition)
		{
			return $this->where($condition)->delete();
			
		}
		
		
	}