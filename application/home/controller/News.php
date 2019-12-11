<?php 

	namespace app\home\controller;
	
	use think\Controller;
	
	use think\Db;
	
	use think\Cookie;
	
	class news extends Controller{

		public function index($id){
			
			$common =new Common();
			
			$data =$common ->index();
			
			$category =Db('category')->where('id',$id)->select();
			
			foreach($category as $cate){
				
				$title =$cate['name'];
				
			}
			
			$user =Cookie::get('user');
			
			$this->assign('user',$user);
			
			$this->assign('title',$title);
			
			$this->assign('data',$data); //头部栏目	
			
			$this->assign('id',$id);
			
			return $this->fetch();
			
		}
		
		
	}