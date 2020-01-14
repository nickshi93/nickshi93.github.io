<?php 
	
	namespace app\admin\controller;
	
	use think\Controller;
	
	use think\Db;
	
	class Dysms extends Base{
		
		private $table ='dysms';

		public function index(){
			
			$dysms =Db($this->table)->select();
			
			$this->assign('dysms',$dysms);
			
			return $this->fetch('dysms/index');			
			
		}
		
		public function updatesms($keyid,$keysecret,$signame,$templatecode){
			
			$data =[
				
				'keyid'=>$keyid,
				
				'keysecret'=>$keysecret,
				
				'signame'=>$signame,
				
				'templatecode'=>$templatecode,
			
			];
			
			$condition =['id'=>1];
				
			Db($this->table)->where($condition)->update($data);
			
			return $this->success('更新成功');
			
		}
		
		
	}