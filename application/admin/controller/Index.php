<?php
	
	namespace app\admin\controller;

	use app\admin\model;

	use think\Controller;  //引用think\Controller;是为了能够引用模板和变量赋值

	use think\Db;

	use think\Cookie;

	class Index extends Base{
		
	   //后台首页	
	   public function index()
	   
	   {	   	   
			//Cookie::delete('name');
			
			$title ="后台首页";
			
			$this->assign('title',$title);
						
			$com = new Common();
			
			$role = $com ->userole(); 	
			
			$this->assign('role',$role);	//调用用户列表
	
			$com ->index(); //调用常规数据	
			
			$domain = $this->request->domain();//获取当前域名
			
			$this->assign('website',$domain);	//前台首页链接
		
			return $this->fetch();
	
		}
		
		//商品页面
		public function goods()
		{
		
			$goods = new Goods();
			
			return $goods ->index();
					
		}
		//用户页面
		public function user()
		{
	
			$user = new User();
			
			return $user ->index();
				
		}
		//会员页面
		public function member()
		{

			$user = new Member();
			
			return $user ->index();
				
		}
	
	
		public function userlog()
		{
			
			$userlog = new Userlog();
			
			return $userlog ->index();
												
		}
		//首页
		public function home()
		{
		
			$home = new Home();
			
			return $home ->index();			
		
			
		}
		//角色页面
		public function roler()
		{

			$role = new Roler();
			
			return $role ->index();		
				
		}
		
		//修改个人资料
		public function changedetail()
		{
			
			$user = new User();
			
			return $user ->changedetail();			
		
		}
		
		//栏目页面
		public function  category()
		{
	
			$category = new Category();
			
			return $category ->index();

		}
		//轮播图管理页面
		public function  banner()
		{
				
			$banner = new Banner();
			
			return $banner ->index();			
										
		}
		
		//阿里大鱼短信
		public function  dysms()
		{
				
			$sms = new Dysms();
			
			return $sms ->index();			
		
		}
		//文章页面
		public function article()
		{

			$art = new Article();
			
			return $art ->index();			
	
		}
		
		//新增文章
		public function addarticle()
		{

			$art = new Addarticle();
			
			return $art ->index();			
						
		}
		
	}
