<?php 

	namespace app\admin\controller;
	
	use think\Controller;

	use think\Cookie;
	
	class Base extends Controller{
		
		protected $controller;
		
		protected $allowAction=[  //允许未登录可进入的页面路径

			'admin/login',
			
		];
			
		protected function _initialize() //定义控制器初始化
		{
			$this->checklogin();
			
			$this->menu();
			
			$this->admin();
		
		}
		
		//检查是否登录
		protected function checklogin(){
			
			$name = Cookie::get('name');
			
			if(in_array($this->actionUrl(),$this->allowAction)){
				
				return;
			
			}
			if(!$name){
				
				$this->redirect('login/index');
			}		
		}
		
		//菜单栏目
		protected function menu(){
			
			$menu = new Menu();
			
			$menus= $menu ->index();
			
			$this->assign('menu',$menus);
			
		}
		
		protected function admin(){
			
			$name = Cookie::get('name');
			
			return $name;
		}
		
		//当前页面路径（模块名+控制器名）
		protected function actionUrl(){ 
			
			$module = $this->request->module();//模块名
			
			$controller = strtolower($this->request->controller());//控制器名
			
			$actionUrl =$module.'/'.$controller;
			
			return $actionUrl;
			
		}
		
		
	}