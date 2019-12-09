<?php 

	namespace app\home\controller;
	
	use think\Controller;
	
	use think\Db;
	
	use think\Cookie;
	
	class User extends Controller{
		
		function index(){
			
		
			echo 'a';die;
			return	$this->fetch();
			
			
		}
	
		
	}