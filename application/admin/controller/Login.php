<?php

	namespace app\admin\controller;
	
	use app\admin\model\LoginModel;
	
	use think\Cookie;
	
	//use think\captcha;
	
	class Login extends Base
	{		

		private $table ='user';
		
		private function loginM()
		{
			
			$login =New LoginModel();
			
			return $login;
			
			
		}
		//登录页面
		public function index()
		{
						
			return	$this->fetch();	
			
		}
		
		//登录功能
		public function login($account,$passwd,$captcha)
		{								
				
				// 处理验证码
				if(!captcha_check($captcha)){
						
					$this->error('验证码错误');
				};
				
				$passwd =$this->loginM()->hash_psd($passwd);
				
				$condition =[
				
					'username'=>$account,
					
					'used'=>1,
					
					'password'=>$passwd,
				
				];
	
				$result =$this->loginM()->find($this->table,$condition);
				
				$time =date('Y-m-d H:i:s',time());				
				
				if($result !== null){				
					
					$data=['login_time'=>$time];
					
					$condition =['username'=>$account];
					
					$this->loginM()->updates($this->table,$condition,$data);
					
					Cookie::set('name',$account,36000);	 
					
				 	$this ->success($this->loginM()->msg('00010'),'index/index');		
				 
					// return json("ajax成功！".$account."---".$passwd);	
			   
				 }else{
					
					$this ->error('用户名不存在或密码错误');		
				 
				 // return json("你输出的是其他值11：".$account."---".$passwd);
				
			}
					
		}
		
		//注销功能	
		public function loginout()
		{
			
				Cookie::delete('name');
				
				$this ->success($this->loginM()->msg('00030'));	
								
				return $this->redirect('login/index');
	
		}
	
	
	}	
	
	
	
	
	
	