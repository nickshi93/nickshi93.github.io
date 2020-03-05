<?php
	
	namespace app\admin\model;
	
	use think\Db;

	class User extends BaseModel{

		public function  page()
		{
	
			return $this->paginate(); //find（）查询所有	
			
		}
		
		//后台新增用户
		public function adduser($username,$password,$used,$role)
		{
			
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
			
			$this->save($data);
			
		}
		//用户列表
		public function userlist($tol,$limit)
		{

			$result =$this->alias('a')->join('tp_role c','a.role=c.id')
					->field('a.id,a.username,a.login_time,a.resign_time,a.used,a.role,c.name')
					->limit($tol,$limit)
					->order('id desc')
					->select(); 	
			
			return $result;	
			
		}
		
		//模糊用户list
		public function likesearch($tol,$limit,$username)
		{
			
			$result =$this->alias('a')->join('tp_role c','a.role=c.id')
					->field('a.id,a.username,a.login_time,a.resign_time,a.used,a.role,c.name')
					->where('username','like','%'.$username.'%')
					->limit($tol,$limit)
					->order('id desc')
					->select(); 	
			
			return $result;	
		}
		
		public function role()
		{
			
			return Db('role')->field('id,name')->select();
			
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
		
		
		//用户模糊搜索总数
		public function likeserachtol(){
			
			
			
		}
		
		
	}