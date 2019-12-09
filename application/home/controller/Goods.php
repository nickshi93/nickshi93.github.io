<?php

	namespace app\home\controller;

	use think\Controller;
	
	use think\db;

	class Goods extends Controller{

		public function index()
		{
			
			return $this->fetch();
						
		}
	
		public function say()
		{
		 
			echo  "123(goods.php)<br>";
		
		}
	
	}
