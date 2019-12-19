<?php
	
	namespace app\home\controller;
	
	use think\Controller;
	
	use think\Db;
	
	use think\Cookie;
	
	
	class shownews extends Controller{
		
		public function index($id){
			
			$common =new Common();
			
			$article =Db('article')->where('id',$id)->select();
		
			$common ->pagenext($id); //下一篇文章
			
			$common ->pageprev($id); //上一篇文章
			
			foreach ($article as $a){
				
				$title =$a['title'];
				
				$cid =$a['category']; 
				
			}
			$thumb =Db('artlike')->where('artid',$id)->where('status','1')->count();//文章点赞数

			$coms =$common->common();//常用头部数据信息
			
			$this->assign('title',$title); //赋值标题

			$this->assign('id',$cid);//文章所属栏目ID
			
			$this->assign('artid',$id);//文章ID
			
			$this->assign('article',$article);  //文章内容
			
			$this->assign('thumb',$thumb);  //文章点赞数
						
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
		
		//文章点赞
		public function thumb($id){
			
			$user = Cookie::get('user');
	
			$user =Db('member')->where('phone',$user)->whereor('username',$user)->select();
			
			foreach ($user as $a){
				
				$uid =$a['id'];
			}			
			
			$thumb = Db('artlike')->where('userid',$uid)->where('artid',$id)->where('status',1)->select(); //查询用户是否已经点赞该文章
			
			if(!$thumb){
				
				$data = [
			
				'userid'=>$uid,
				
				'artid'=>$id,
				
				'addtime'=>time(),
			
				];
				
				$artlike =Db('artlike')->insert($data);
				
				$num =Db('artlike')->where('artid',$id)->where('status','1')->count();
				
				return $num;
				
			}else{
				
				$num =Db('artlike')->where('artid',$id)->where('status','1')->count();
				
				return $num;
			}
			
			
		}
		
		//取消点赞
		public function delthumb($id){
			
			$user = Cookie::get('user');
	
			$user =Db('member')->where('phone',$user)->whereor('username',$user)->select();
			
			foreach ($user as $a){
				
				$uid =$a['id'];
			}
			
			$data = [
			
				'userid'=>$uid,
				
				'artid'=>$id,
				
				'status'=>'0',
				
				'addtime'=>time(),
			
			];
			
			$artlike =Db('artlike')->where('artid',$id)->where('userid',$uid)->update($data);
			
			$num =Db('artlike')->where('artid',$id)->where('status','1')->count();
			
			return $num;
			
		}
}
		
