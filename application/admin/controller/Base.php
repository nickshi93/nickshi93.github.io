<?php 

	namespace app\admin\controller;
	
	use app\admin\model\BaseModel;
	
	use think\Controller;

	use think\Cookie;
	
	use think\facade\Request;
	
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
			
			$name = $this->admin();
			
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
			
			$name =$this->admin(); //用户名
				
			$this->assign('name',$name);
			
			$base =NEW BaseModel();
			
			$table ='user';
			
			$condition =['username'=>$name];
			
			$user =$base->find($table,$condition);
			
			$img =$user['img'];
			
			$this->assign('image',$img); //头像
			
			$this->assign('menu',$menus);
			
		}
		
		//查询用户列表权限
		public function userole(){
			
			if(Cookie::has('name'))
			{
				$name = $this->admin(); //用户名
				
				$base =NEW BaseModel();

				$table ='user';
				
				$condition =['username'=>$name];
				
				$field='role';
				
				$userole = $base->selectb($table,$condition,$field);

				foreach ($userole as $role){
					
					$id =$role['role'];
				}
				
				$table ='role';
				
				$condition =['id'=>$id];
				
				$field='authority';
				
				$result = $base->selectb($table,$condition,$field);
				
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
		
		//登录名
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