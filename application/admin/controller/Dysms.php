<?php 
	
	namespace app\admin\controller;
	
	use think\Controller;
	
	use think\Db;
	
	class Dysms extends Base{

		public function index(){
			
			$dysms =Db::table('tp_dysms')->select();
			
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
			$table='tp_dysms';
					
			Db::table($table)->where('id',1)->update($data);
			
			return $this->success('更新成功');
			
		}
		
		
	}