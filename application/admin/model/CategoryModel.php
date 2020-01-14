<?php
	
	namespace app\admin\model;
	
	use think\Model;

	class CategoryModel extends  BaseModel{
		
		protected $table ='category';
		
		protected function categorytree($condition){
	
			$cate = $this->select($this->table,$condition);
			
			return $cate;
			
		}
		
	}