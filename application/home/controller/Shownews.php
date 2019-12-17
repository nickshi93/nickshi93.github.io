<?php
	
	namespace app\home\controller;
	
	use think\Controller;
	
	use think\Db;
	
	use think\Cookie;
	
	
	class shownews extends Controller{
		
		public function index($id){
			
			$common =new Common();
			
			$article =Db('article')->where('id',$id)->select();
			
			$this->assign('artid',$id);//文章ID
			
			$common ->pagenext($id); //下一篇文章
			
			$common ->pageprev($id); //上一篇文章
			
			foreach ($article as $a){
				
				$title =$a['title'];
				
				$id =$a['category'];
				
			}
			
			$coms =$common->common();//常用头部数据信息
			
			$this->assign('title',$title); //赋值标题

			$this->assign('id',$id);//文章所属栏目ID
			
			$this->assign('article',$article);  //文章内容
						
			return $this->fetch('news/shownews');
			
		}
		
		
		//文章浏览量
		public function pageview($id){
			
			$article =Db('article')->where('id',$id)->select();
			
			foreach ($article as $a ){
				
				$view =$a['pv'];
				
			}
			
			$view =$view+1;
			
			$data =[
			
				'pv'=>$view
			
			];
			
			$newarticle = Db('article')->where('id',$id)->update($data);
			
			return $view;
			
		}
		
		
	}