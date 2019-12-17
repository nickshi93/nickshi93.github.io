<?php 

	namespace app\home\controller;
	
	use think\Controller;
	
	use think\Db;
	
	use think\Cookie;
	
	use think\lang;
	
	class news extends Controller{

		public function index($id){
			
			$common =new Common();
			
			$coms =$common->common();//常用头部数据信息
			
			$category =Db('category')->where('id',$id)->select();
			
			foreach($category as $cate){
				
				$title =$cate['name'];
				
			}
			
			$this->assign('title',$title);	
			
			$pid =Db('category')->where('pid',$id)->select(); //查询id是否有子栏目
			
			if(!$pid){  				//如果没有子栏目就查该ID下的文章
				
				$article = Db('article')->where('category',$id)
						->where('ishow','1')
						->order('top  desc')
						->select();
				$news =Db('category')->where('id',$id)->select();
				
				foreach($news as $a){
					
					$id =$a['pid'];     //没有子栏目的ID用父ID赋值到模板头部用于当前下划线
				}	
				
				$this->assign('id',$id);  

			}else{   //如果有子栏目就查所有文章
				
				$article = Db('article')
						->where('ishow','1')
						->order('top desc')
						->select();
						
				$this->assign('id',$id);
			}
			
			$this->assign('article',$article); //头部栏目	
	
			return $this->fetch();
			
		}
		
		
	}