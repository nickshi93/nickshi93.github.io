<?php

	namespace app\admin\controller;
	
	use app\admin\model\UserModel;
	
	use think\Db;
	
	use think\Controller;
	
	use think\Cookie;
	
	//use think\captcha;
	
	class Login extends Controller
	{		

		//登录页面
		public function index(){
						
			return	$this->fetch();	
			
		}
		
		//登录功能
		public function login($account,$passwd,$captcha){								
				
				// 处理验证码
				if(!captcha_check($captcha)){
						
					$this->error('验证码错误');
				};
				
				$passwd =md5(md5($passwd));
				
				$result =Db::table('tp_admin')->where('username',$account)->where('used','=','1')->where('password',$passwd)->find();			

				$time =date('Y-m-d H:i:s',time());				
				
				if($result !== null){				
						
					$update =new Common();
					
					$update ->updates('tp_admin','username',$account,'login_time',$time); //调用常规类的更新方法
					
					Cookie::set('name',$account,36000);	 
					
				 	$this ->success('登录成功','index/index');		
				 
					// return json("ajax成功！".$account."---".$passwd);	
			   
				 }else{
					
					$this ->error('用户名不存在或密码错误');		
				 
				 // return json("你输出的是其他值11：".$account."---".$passwd);
				
			}
					
		}
		
		//注销功能
		
		public function loginout(){
			
				Cookie::delete('name');
				
				$this ->success('退出成功','index/index');	
								
				return		$this->redirect('login/index');
	
		}
	
	
	}	
	
	
	
	
	
	