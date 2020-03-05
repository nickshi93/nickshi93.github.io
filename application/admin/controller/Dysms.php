<?php 
	
	namespace app\admin\controller;
	
	use app\admin\model\Dysms as DysmsModel;
	
	class Dysms extends Base{
	
		public function dysms()
		{
			$dysms =new DysmsModel();
			
			return $dysms;
			
		}
		
		public function index()
		{
			$condition=[];
			
			$dysms =$this->dysms()->getAll($condition);
			
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
				
			$this->dysms()->updates($condition,$data);
			
			return $this->success('更新成功');
			
		}
		
		
	}