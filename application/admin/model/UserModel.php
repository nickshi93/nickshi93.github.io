<?php
	namespace app\admin\model;
	
	use think\Model;
	
	use think\Cookie;
	
	class UserModel extends BaseModel{
		
		protected $table = 'admin';
	
		public function initialize(){
			
			
		}
		
		public function  page(){
	
			$result =Db($this->table)->where('id','>',0)->paginate(10); //find（）查询所有
				
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
			
			$result = parent::insert($this->table,$data);
			
		}
		
		//指定ID用户信息
		public function userinfo($condition){

			$result = parent::select($this->table,$condition);
			
			return $result;
						
		}
		//统计用户名数量
		public function usercount($condition){
			
			//$result = Db($this->table)->where($condition)->count();
			$result = parent::counts($this->table,$condition);
			
			return $result;
		}
		
		//查询用户信息
		public function edituserinfo($condition){

			$result = parent::find($this->table,$condition);
			
			return $result;
						
		}
		
		
		//更新用户信息		
		public function updateuser($condition,$data){

			$result= parent::updates($this->table,$condition,$data);

			return true;
		}
		
		//删除用户
		public function deluser($condition){
	
			$result = parent::del($this->table,$condition);
			
			return true;
			
		}
		
	}