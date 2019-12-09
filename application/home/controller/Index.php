<?php
namespace app\home\controller;

use think\Controller;  //引用think\Controller;是为了能够引用模板和变量赋值

use think\Db;

use think\Cookie;

class Index extends Controller{
	
	   public function index()
	   {	   
	   
			$title='前台首页';
	 
			$common =new Common();
			
			$data =$common ->index();
			
			$user =Cookie::get('user');
			
			$this->assign('user',$user);
			
			$this->assign('data',$data); //头部栏目	
			
			$banner =Db::table('tp_banner')->where('imgtype',0)->order('sortid asc')->select();

			$mbanner =Db::table('tp_banner')->where('imgtype',1)->order('sortid asc')->select();
			
			$this->assign('banner',$banner);
			
			$this->assign('mbanner',$mbanner);
			
			$this->assign('title',$title);
				
			return $this->fetch();
		
	   }

	

		public function user(){
			
			$user =new User();
			
			return $user->index();
			
			
		}
		





}

