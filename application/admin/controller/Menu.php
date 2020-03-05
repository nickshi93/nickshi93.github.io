<?php
	
	namespace app\admin\controller;
	
	use think\Controller;
	
	class Menu {
				
		public function index()
		{
			
			return	$menu =[
			
						[
						'id'=>'1',
						
						'name'=>'用户管理',						
						
						"url"=>"user",
						
						"icon"=>'&#xe612;',
						
						"child"=>[
							
								[
									'id'=>6,
									'pid'=>1,
									'name'=>'用户管理',
									"icon"=>'&#xe770;',
									'url'=>'user'
								
								],
								[
									'id'=>7,
									'pid'=>1,
									'name'=>'会员管理',
									"icon"=>'&#xe66f;',
									'url'=>'member'
								
								],
								[
									'id'=>8,
									'pid'=>1,
									'name'=>'用户日志',
									"icon"=>'&#xe66e;',
									'url'=>'userlog'
								
								]
						
							]
						
						],
						[
						'id'=>'2',
						
						'name'=>'角色管理',						
						
						"url"=>"roler",
						
						"icon"=>'&#xe647;',
						
						"child"=>[
						
								[
									'id'=>9,
									'pid'=>2,
									'name'=>'角色管理',
									"icon"=>'&#xe613;',
									'url'=>'roler'
								
								],
							/*	[
									'id'=>10,
									'name'=>'权限管理',
									"icon"=>'&#xe63c;',
									'url'=>'author'
								
								]*/
										
							]
						
						],
						
					/*	[
						'id'=>'3',
						
						'name'=>'商品管理',
						
						"url"=>"goods",
						
						"icon"=>'&#xe60a;',
						
						"child"=>[
						
								[
									'id'=>11,
									'name'=>'商品管理',
									"icon"=>'',
									'url'=>'goods'
								
								],
								[
									'id'=>12,
									'name'=>'商品审核',
									"icon"=>'',
									'url'=>'goodcheck'
								
								]
			
							]
						],*/
						
						[
						'id'=>'4',
						
						'name'=>'栏目管理',
						
						"url"=>"goods",
						
						"icon"=>'&#xe62e;',
						
						"child"=>[
								
								[
									'id'=>13,
									'pid'=>4,
									'name'=>'栏目分类',
									"icon"=>'&#xe647;',
									'url'=>'category'
								
								]					
			
							]
						],
						[
						'id'=>'5',
						
						'name'=>'系统管理',
						
						"url"=>"banner",
						
						"icon"=>'&#xe631;',
						
						"child"=>[
						
								[
									'id'=>14,
									'pid'=>5,
									'name'=>'轮播管理',
									"icon"=>'&#xe634;',
									'url'=>'banner'
								
								],	
								[
									'id'=>15,
									'pid'=>5,
									'name'=>'阿里大鱼短信',
									"icon"=>'&#xe63b;',
									'url'=>'dysms'
								
								]										
				
							]
						],
                		[
						'id'=>'16',
						
						'name'=>'文章管理',
						
						"url"=>"article",
						
						"icon"=>'&#xe631;',
						
						"child"=>[
						
								[
									'id'=>17,
									'pid'=>16,
									'name'=>'文章管理',
									"icon"=>'&#xe634;',
									'url'=>'article'
								
								],
								[
									'id'=>18,
									'pid'=>16,
									'name'=>'新增文章',
									"icon"=>'&#xe634;',
									'url'=>'addarticle'
								
								],
				
							]
						]
              
              
              
              
					];	
									
		}
		
	
		
		
	}