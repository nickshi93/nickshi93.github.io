<?php 

	namespace app\admin\controller;
	
	use think\controller;
	
	use think\Db;
	
	class Home extends controller{
		
		function index(){			
			
			$com = new Common();
			
			$member = $com ->totaltable('member'); 
			
			$article = $com ->totaltable('article'); 
			
			$this->assign('member',$member);
			
			$this->assign('article',$article);
		
			return $this->fetch('home/index');
			
		}
		
		
	}