<?php
	
	namespace app\admin\model;
	
	class User extends BaseModel{

		public function  page()
		{
	
			return $this->paginate(); //find（）查询所有	
			
		}
		
		
		public function userole()
		{
		
			return $this->hasOne('Role','id','role')->bind('name');// bind绑定属性到父模型   hasOne('关联模型名','外键名','主键名',['模型别名定义'],'join类型');
			
		}
		
		//后台新增用户
		public function adduser($user,$password)
		{
			
			$time = date('Y-m-d H:i:s',time());
			
			$data =[
				
				'username'=>$user['username'],
				
				'password'=>$password,
				
				'resign_time'=>$time,
				
				'login_time'=>'',
				
				'used' =>$user['used'],
				
				'role'=>$user['role'],
				
				'img'=>'/userimage/20191206/d9f567c2c05ba41b29074d266f5990dd.jpg'
	
			];
			
			$this->save($data);
			
		}
		//用户列表
		public function userlist($tol,$limit)
		{
			
			return User::with('userole')->limit($tol,$limit)->order('id desc')->select();

		}
		
		//模糊用户list
		public function likesearch($tol,$limit,$username)
		{
			
			return 	User::with('userole')->where('username','like','%'.$username.'%')
					->limit($tol,$limit)
					->order('id desc')
					->select(); 	

		}
		//Model查询角色LIST
		public function role()
		{
			
			return Role::select();
			
		}
		
		public function del($condition)
		{
			
			$this->where($condition)->delete();
			
		}
		
		
		public function counts($condition)
		{
			
			return $this->where($condition)->count();
			
		}
		
		public function updates($condition,$data)
		{
			$this->where($condition)->update($data);
			
		}
		
		
		public function getAll($condition)
		{
			return $this->where($condition)->select();
			
		}
		
		public function searchcount($username)
		{
			
			return $this->where('username','like','%'.$username.'%')->count();   
		}
		
		
	}