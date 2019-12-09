<?php
	namespace app\home\controller;
	
	use think\Controller;
	
	use think\Db;
	
	use think\Cookie;
	
	use think\Session;
	
	class Login extends Controller{
		//前端登录页面
		public function index(){
			
			$title ='登录页面';
			
			$common =new Common();
			
			$data =$common ->index();
			
			$this->assign('data',$data);	
			
			$this->assign('title',$title);		
			
			return $this->fetch();
		}
		//前端手机号验证码登录	
		public function phoneLogin($phone,$code){

			$verifycode =(Session::get('yzm'));
			
			if($verifycode!==md5($code)){
				
				Session::delete('yzm');
				
				$this->error('验证码错误,请重输');
				
			}					
			
			$time =date('Y-m-d H:i:s',time());
				
			$member =Db::table('tp_member')->where('phone',$phone)->select(); 
				
			if($member !==null){
						
				foreach($member as $user){
								
					$username =$user['username'];
								
					$phone =$user['phone'];
								
				}
							
				if($username!==null){
								
					Cookie::set('user',$username);
	
					$result =Db::table('tp_member')->where('username',$username)->update(['login_time'=>$time]);
								
				}else{
								
					Cookie::set('user',$phone);
					
					$result =Db::table('tp_member')->where('phone',$phone)->update(['login_time'=>$time]);
						
				}
				
				
			
				$this->success('登录成功','index/index');
						
					
			}else{
						
				$this->error('手机号码未注册，请先注册');
						
			}
			
		}
		//前端登录
		public function login($username,$password,$captcha){
			
			Cookie::delete('user');
			// 处理验证码
			if(!captcha_check($captcha)){
						
				$this->error('验证码错误');
			
			};
			
			$psd =md5(md5($password));
			
			$time =date('Y-m-d H:i:s',time());
			
			$member =Db::table('tp_member')->where('username',$username)->where('password',$psd)->whereor('phone',$username)->select();
			
			if($member == null){
				
				$this->error('用户未注册，请先注册');
				
				return;
				
			}
			foreach($member as $user){
								
				$username = $user['username'];
								
				$phone = $user['phone'];
				
				$status =$user['status'];
				
			}
			
			if($status =='0'){
					
					$this->error('用户未注册，请先注册');
				
					return;
					
			}
							
			if($username!== null){
				
				Cookie::delete('user');
								
				Cookie::set('user',$username);
				
				$result =Db::table('tp_member')->where('username',$username)->update(['login_time'=>$time]);
								
			}else{
	
				Cookie::delete('user');
								
				Cookie::set('user',$phone);

				$result =Db::table('tp_member')->where('phone',$phone)->update(['login_time'=>$time]);
						
			}
			
			$this->success('登录成功','index/index');
				
		}
		
		//退出
		public  function  loginout(){
			
			Cookie::delete('user');
			
			$this->success('退出成功','index');
		}
		
		
	
		
	}