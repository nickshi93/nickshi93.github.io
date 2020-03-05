<?php

	namespace app\admin\model;
	
	use think\Db;
	
	class Home extends BaseModel
	{
		
		public function countable($table)
		{
			
			return Db($table)->count();
		}
		
		
	}