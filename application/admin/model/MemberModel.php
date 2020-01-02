<?php 

	namespace app\admin\model;
	
	use think\Model;
	
	class MemberModel extends BaseModel{
		
		protected $table ='member';
		
		//更新会员信息
		public function updatemember($condition,$data){
			
			$result = parent::updates($this->table,$condition,$data);
			
			return true;
		}
		//统计会员数量
		public function membercount(){

			$result =parent::countform($this->table);   //统计总个数
			
			return $result;
			
		}
		//会员表信息
		public function memberinfo(){
			
			$result = parent::selects($this->table);   //统计总个数
			
			return $result;
			
		}
		//删除会员
		public function delmember($condition){
			
			$result = parent::del($this->table,$condition);
			
			return true;
			
		}
		//查看会员名是否存在
		public function membername($condition){
			
			$result = parent::counts($this->table,$condition);   //统计总个数
			
			return $result;
		}
		
		//会员表插入数据
		public function insertmember($data){
			
			$result= parent::insert($this->table,$data);
			
			return true;
		}
		
		//根据ID查会员信息
		public function memberidinfo($condition){
			
			$result = parent::select($this->table,$condition);   //统计总个数
			
			return $result;
			
		}
		
		
		
	}