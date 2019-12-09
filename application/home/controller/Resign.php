<?php
	
	namespace app\home\controller;
	
	use think\Controller;
	
	use think\Session;
	
	use think\Db;
	
	class Resign extends Controller{
		//注册页面
		public function index(){
			
			
			return	$this->fetch();
			
			
		}
		//手机号码注册
		public function resign($phone,$code,$password){
			
			$psd = md5(md5($password));
			
			$verify =Session::get('yzm');
			
			if(md5($code)!==$verify){
				
				$this->error('验证码不正确');
				
			}
			
			$name =Db('member')->where('phone',$phone)->find();
			
			if($name!==null){
				
				$this->error('用户已存在');
				
			}
			
			$time =date('Y-m-d H:i:s',time());
			
			$data =[
			
				'phone'=>$phone,
				
				'resign_time'=>$time,
				
				'password'=>$psd,
			
			];
			
			$member =Db('member')->insert($data);
			
			$this->success('账号已成功注册！现在就登录吧','login/index');
			
		}
		
		
		
		
		
	}