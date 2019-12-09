<?php 

	namespace app\admin\controller;
	
	use think\controller;
	use think\Db;
	
	class Home extends controller{
		
		function index(){			
			
		/*	$com = new Common();
			
			$com ->index(); //调用常规数据	*/
			
			return $this->fetch('home/index');
			
		}
		
		
	}