<?php

	namespace app\index\controller;

	use think\Controller;
	
	use think\db;

	class goods extends Controller{

		public function index()
		{
			
			return $this->fetch();
						
		}
	
		public function say()
		{
		 
			echo  "123(goods.php)<br>";
		
		}
	
	}
