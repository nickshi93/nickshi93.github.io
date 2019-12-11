<?php
	namespace app\home\controller;
	
	use think\Controller;
	
	use think\Cookie;
	
	class Lang extends Controller{
		
		public function index($lang){
			
			Cookie('think-var',null);
			
			switch($lang){
				
				case 'cn':
					Cookie('think_var','zh-cn');
				break;
					
				case 'en':
				
					Cookie('think_var','en-us');
					
				break;
				
			}
			
		}
		
		
		
	}