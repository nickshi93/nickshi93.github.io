<?php 

	namespace app\admin\controller;
	
	use think\Controller;
	
	use think\Cookie;
	
	class Base extends Controller{
		
		protected function _initialize() //定义控制器初始化
		{
			$this->checklogin();
			
		}

		protected function checklogin(){
			
			$name = Cookie::get('name');
			
			if(!$name){
				
				$this->redirect('login/index');
			}		
		}
		
	}