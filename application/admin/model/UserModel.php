<?php
	namespace app\admin\model;
	
	use think\Model;
	
	use think\Db;
	
	use think\Cookie;
	
	class UserModel extends Model{
	
		public function initialize(){
			
			parent::initialize(); //需要调用`Model`的`initialize`方法
			//TODO:自定义的初始化
		}
		
		public function  index(){
			
			
			
		
		}
		
		
		public function  page(){
						
			$table ='tp_admin';
			
			$result =Db::table($table)->where('id','>',0)->paginate(10); //find（）查询所有
				
			return $result;		
			
		}
		
		//后台新增用户
		public function adduser($username,$password,$used,$role){
			
			$time = date('Y-m-d H:i:s',time());
			
			$data =[
				
				'username'=>$username,
				
				'password'=>$password,
				
				'resign_time'=>$time,
				
				'login_time'=>'',
				
				'used' =>$used,
				
				'role'=>$role,
				
				'img'=>'/userimage/20191206/d9f567c2c05ba41b29074d266f5990dd.jpg'
	
			];
			
			$result = Db::table('tp_admin')->insert($data);
			
			return $result;		
		}
		//查询用户id信息
		
		public function selectuser($field,$id){
			
			$result = Db::table('tp_admin')->where($field,$id)->select();
			
			return $result;
						
		}
		
		
		//更新用户信息
		
		public function updateuser($table,$field,$id,$field1,$role){
			
			$result=Db::table($table)->where($field, $id)->update([$field1 => $role]);

			return $result;
		}
		
		
	}