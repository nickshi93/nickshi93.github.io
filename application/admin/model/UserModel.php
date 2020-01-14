<?php
	namespace app\admin\model;
	
	use think\Model;

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
		//用户列表
		public function userlist($tol,$limit){

			$result =Db($this->table)->alias('a')->join('tp_role c','a.role=c.id')
					->field('a.id,a.username,a.login_time,a.resign_time,a.used,a.role,c.name')
					->limit($tol,$limit)
					->order('id desc')
					->select(); 	
			
			return $result;	
			
		}
		
		//模糊用户list
		public function likesearch($tol,$limit,$username){
			
			$result =Db($this->table)->alias('a')->join('tp_role c','a.role=c.id')
					->field('a.id,a.username,a.login_time,a.resign_time,a.used,a.role,c.name')
					->where('username','like','%'.$username.'%')
					->limit($tol,$limit)
					->order('id desc')
					->select(); 	
			
			return $result;	
		}
	
		//用户模糊搜索总数
		public function likeserachtol(){
			
			
			
		}
		
		
	}