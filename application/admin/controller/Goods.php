<?php

	namespace app\admin\controller;

	use think\db;
	
	use think\view;
	
	use think\Cookie;

	class Goods extends Base{

		public function index()
		{
			
			$qx ='1';
			
			$this ->assign('qx',$qx);
		
			$title ="商品";
			
			$this->assign('title',$title);
			
			$com = new Common();
			
			$com ->index(); //调用常规数据
						
			return $this->fetch('goods/index');			
				
		}

	}
