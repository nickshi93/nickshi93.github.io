<?php
	
	namespace app\admin\controller;

	use app\admin\model;

	use think\Controller;  //引用think\Controller;是为了能够引用模板和变量赋值

	use think\Db;

	use think\Cookie;
	
	use think\Request;

	class Index extends Controller{
	   
	   //后台首页	
	   public function index()
	   
	   {	   	   
			//Cookie::delete('name');
			if(cookie::has('name')){
								
						
			}else{
				
				$this->redirect('login/index');
				
			}
			
			$title ="后台首页";
			
			$this->assign('title',$title);
						
			$com = new Common();
			
			$role = $com ->userole(); 	
			
			$this->assign('role',$role);	//调用用户列表
	
			$com ->index(); //调用常规数据	
			
			//获取当前域名
			$request = Request::instance();
			
			$domain = $request->domain();
			
			$this->assign('website',$domain);	//前台首页链接
		
			return $this->fetch();
			//return $this->fetch('/goods/index'); //引用goods文件下的index.html
			
		}
		
		//商品页面
		public function goods(){
			
			//Cookie::delete('name');
			if(cookie::has('name')){
				
				$goods = new Goods();
			
				return $goods ->index();
						
			}else{
				
				$this->redirect('login/index');
				
			}

			
					
		}
		//用户页面
		public function user(){
			
			//Cookie::delete('name');
			if(cookie::has('name')){
				
				$user = new User();
			
				return $user ->index();
									
			}else{
				
				$this->redirect('login/index');
				
			}
						
		}
		//会员页面
		public function member(){
			
			//Cookie::delete('name');
			if(cookie::has('name')){
				
				$user = new Member();
			
				return $user ->index();
									
			}else{
				
				$this->redirect('login/index');
				
			}
						
		}
	
	
		public function userlog(){
			
			//Cookie::delete('name');
			if(cookie::has('name')){
				
				$userlog = new Userlog();
			
				return $userlog ->index();
									
			}else{
				
				$this->redirect('login/index');
				
			}
					
		}
		//首页
		public function home(){
			
			//Cookie::delete('name');
			if(cookie::has('name')){
				
				$home = new Home();
			
				return $home ->index();			
						
			}else{
				
				$this->redirect('login/index');
				
			}
			
			
		}
		//角色页面
		public function roler(){
			
			//Cookie::delete('name');
			if(cookie::has('name')){
				
				$role = new Roler();
			
				return $role ->index();		
						
			}else{
				
				$this->redirect('login/index');
				
			}
						
		}
		
		//修改个人资料
		public function changedetail(){
			
			//Cookie::delete('name');
			if(cookie::has('name')){
				
				$user = new User();
			
				return $user ->changedetail();			
						
			}else{
				
				$this->redirect('login/index');
				
			}			
			
		}
		
		//栏目页面
		public function  category(){
			
			//Cookie::delete('name');
			if(cookie::has('name')){
				
				$category = new Category();
			
				return $category ->index();
									
			}else{
				
				$this->redirect('login/index');
				
			}				
			
		}
		//轮播图管理页面
		public function  banner(){
			
			//Cookie::delete('name');
			if(cookie::has('name')){
				
				$banner = new Banner();
			
				return $banner ->index();			
						
			}else{
				
				$this->redirect('login/index');
				
			}				
			
		}
		
		//阿里大鱼短信
		public function  dysms(){
			
			//Cookie::delete('name');
			if(cookie::has('name')){
				
				$sms = new Dysms();
			
				return $sms ->index();			
						
			}else{
				
				$this->redirect('login/index');
				
			}		
			
			
		}
		

		
	}
