<?php 

	namespace app\admin\controller;
	
	use think\Controller;

	use think\Cookie;
	
	use think\facade\Request;
	
	use think\Db;
	
	class Base extends Controller{
		
		protected $controller;
		
		protected $ajax;
		
		protected $allowAction=[  //允许未登录可进入的页面路径

			'admin/login',
			
		];
			
		protected function _initialize() //定义控制器初始化
		{
			$this->checklogin();
			
			$this->menu();
			
			$this->admin();
			
			$this->userole();
			
			$this->action();
		
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
			
			$name =cookie::get('name'); //用户名
				
			$this->assign('name',$name);
			
			$user =Db('user')->where('username',$name)->find();
			
			$img =$user['img'];
			
			$this->assign('image',$img); //头像
			
			$this->assign('menu',$menus);
			
		}
		
		//查询用户列表权限
		public function userole(){
			
			if(Cookie::has('name'))
			{
				$name = cookie::get('name'); //用户名
				
				$userole = Db('user')->where('username',$name)->field('role')->select();

				foreach ($userole as $role){
					
					$a =$role['role'];
				}
				
				$result = Db('role')->where('id',$a)->field('authority')->select();
				
				foreach($result as $roles){
					
					$b = $roles['authority'];
					
				}
				
				return $role = $b;
			}
			
			
			
		}
		
		
		public function action()
		{
			
			$ajax = $this->request->isAjax();
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