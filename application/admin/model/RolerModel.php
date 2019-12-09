<?php 

	namespace app\admin\Model;
	
	use think\Model;
	
	use think\Db;
	
	class RolerModel extends Model{
		
		public function index(){
			
			
			
			
		}
		
		//查询id角色的信息
		public function selectrole($field,$id){
			
			$result =Db::table('tp_role')->where($field,$id)->select();
			
			return $result;
						
		}
		

		
	}
	