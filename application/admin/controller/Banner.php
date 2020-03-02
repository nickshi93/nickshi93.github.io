<?php 
	namespace app\admin\controller;

	use app\admin\model\Banner as BannerModel;
	
	use think\Db;
	
	Class Banner extends  Base{
		
		public function index(){
					
			return $this->fetch('banner/index');
					
		}
		
		public function bannerinfo($limit,$page){
		
			//获取每页显示的条数
		    $limits = $limit;
		    //获取当前页数
		    $pages = $page-1;
			//计算出从那条开始查询
		    $tol = $pages *	$limits;
			
			$banner = new BannerModel();
			
			$count =$banner->bannercount();   //统计总个数
			
			$countpage = ceil($count /$limits);  //总页数
			
			$list["msg"]='';
			
			$list['code']=0;
			
			$list['count']=$count;  //总条数

			// 查询出当前页数显示的数据
			$data = $banner->select($tol,$limit);
	
			$list['data']= $data;
			
			return json($list);
					
		}
		//更改轮播图类型
		public function imgtype($id,$used){
			
			$banner =New BannerModel(); //实例化模型		
				
			$condition =['id'=>$id];
				
			$useds =$used=='1'?'0':'1';
				
			$data =['imgtype'=>$useds];
								
			$banner->updateb($condition,$data); 
									
			$this->Success('更改成功');
						
		}
		//删除数据库中的轮播图数据
		public function delbanner($id){

			$banner =New BannerModel(); //实例化模型	

			$condition =['id'=>$id];
			
			$banner->deletes($condition);
			
			$this->Success('删除图片成功');
			
		}
		
		//更新轮播图排序
		
		public function updatesort($id,$value,$field){
				
			$condition=['id'=>$id];
			
			$data=['sortid'=>$value];

			$banner =New BannerModel(); //实例化模型						
								
			$banner->updateuser($condition); 	

			$data ='编辑成功';
			
			return json($data);
		}
		
	}