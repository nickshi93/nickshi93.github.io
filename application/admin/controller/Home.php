<?php 

	namespace app\admin\controller;
	
	use think\Controller;
	
	class Home extends Base{
		
		public function index(){			
			
			$com = new Common();
			
			$member = $com ->totaltable('member'); 
			
			$article = $com ->totaltable('article'); 
			
			$this->assign('member',$member);
			
			$this->assign('article',$article);
		
			return $this->fetch('home/index');
			
		}
		
		
	}