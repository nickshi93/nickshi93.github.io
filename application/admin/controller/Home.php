<?php 

	namespace app\admin\controller;
	
	use app\admin\model\Home as HomeModel;
	
	class Home extends Base{
		
		protected function Home()
		{
			
			return $home = new HomeModel();
			
		}
		
		public function index()
		{			
	
			$member = $this->home()->countable('member'); 
			
			$article =$this->home()->countable('article'); 
			
			$this->assign('member',$member);
			
			$this->assign('article',$article);
		
			return $this->fetch('home/index');
			
		}
		
		
	}