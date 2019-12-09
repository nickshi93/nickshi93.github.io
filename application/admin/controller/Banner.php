<?php 
	namespace app\admin\controller;
	
	use think\Controller;
	
	use app\admin\model\UserModel;
	
	use think\Db;
	
	Class Banner extends  Controller{
		
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
				  
			$count = Db::table('tp_banner')->count();   //统计总个数
			
			$countpage = ceil($count /$limits);  //总页数
			
			$list["msg"]='';
			
			$list['code']=0;
			
			$list['count']=$count;  //总条数

			// 查询出当前页数显示的数据
			$data = Db::table('tp_banner')->limit($tol,$limit)->select(); 
	
			$list['data']= $data;
			
			return json($list);
					
		}
		//更改轮播图类型
		public function imgtype($id,$used){
			
				$field = 'id';
				
				$field1 ='imgtype';
			
				$table ='tp_banner';	

				$user =New UserModel(); //实例化模型					
			
				if($used=='1'){
				
					$used='0';
								
					$user->updateuser($table,$field,$id,$field1,$used); 
									
					$this->Success('成功改为PC端');
				
				}else{
					
					$used='1';
				
					$user->updateuser($table,$field,$id,$field1,$used); 
			
					$this->Success('成功改为手机端');
				}			
		}
		//删除数据库中的轮播图数据
		public function delbanner($id){
					
			$table ='tp_banner';
			
			$delete =new Common();
			
			$delete->deletes($table,'id','=',$id);
			
			$this->Success('删除图片成功');
			
		}
		
		//更新轮播图排序
		
		public function updatesort($id,$value,$field){
					
			$field = 'id';
				
			$field1 ='sortid';
			
			$table ='tp_banner';	

			$user =New UserModel(); //实例化模型					
								
			$user->updateuser($table,$field,$id,$field1,$value); 	

			$data ='编辑成功';
			
			return json($data);
		}
		
	}