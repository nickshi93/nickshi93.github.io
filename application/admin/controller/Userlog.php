<?php 

	namespace app\admin\controller;
	
	use think\controller;
	
	class Userlog extends Base{
		
		function index(){
			
			$com = new Common();
			
			$com ->index(); //调用常规数据	
			
			return $this->fetch('userlog/index');
			
		}
		
		
	}