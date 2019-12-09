<?php 
	namespace app\home\controller;
	
	use think\Controller;
	
	use think\Db;
	
	class Common extends Controller{
				
		public function index(){
			
			$id =0;
			
			$pid ='pid';
			
			$cate = $this ->categorytree($pid,$id); //查询pid=0的一级栏目
			
			foreach($cate as $k) {
				
				$id = $k['id'];
					
				$cates['id']=$id;
					
				$cates['name']=$k['name'];
					
				$cates['children']=$this->categorytree($pid,$id); //根据一级栏目id查询二级栏目
					
				$data[]=$cates;
			} 
			
			return $data;//头部栏目信息
			
		}
		
		/*新增数据*/
		function add($data,$table){
		
			return  Db::table($table)->insert($data);  //插入数据
		
		}
		/*新增多条数据*/
		function addall($data,$table){
		
			return  Db::table($table)->insertAll($data);  //插入多条数据
		
		}
	
		function deletes($table,$condition1,$condition2,$condition3){
		
			return Db::table($table)->where($condition1,$condition2,$condition3)->delete();

		}
		
		
		//根据pid的值查询栏目
		public function categorytree($pid,$params){
				
			$cate =Db::table('tp_category')->where($pid,$params)->where('is_show','0')->order('sortid asc')->select();
				
			return $cate;
		}
		
		
		
	}	
	