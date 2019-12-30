<?php 
	namespace app\admin\controller;
	
	use think\Controller;
	
	use think\Db;
	
	use think\Cookie;
	
	class Addarticle extends Base{
		
		public function index(){
			
			$id =0;
			
			$pid ='pid';
			
			$categorys = $this->artree($pid,$id); //查询文章pid=0的一级栏目
			
			 foreach($categorys as $k) {
				
				$id = $k['id'];
				
				$category['id']=$id;
				
				$category['name']=$k['name'];
				
				$category['child']=$this->artree($pid,$id); //根据一级栏目id查询二级栏目
				
				$data[]=$category;
			  } 
			  
			$this->assign('data',$data);
		
			return $this->fetch('article/add');
			
		}
		
		//富文本编辑器的图片上传
		public function uploadimg(){
			
			// 获取表单上传文件 例如上传了001.jpg
			$file = request()->file('file');
			
			// 移动到框架应用根目录/public/uploads/ 目录下
			$info = $file->move(ROOT_PATH . 'public' . DS . 'articleimg');
			
			if($info){	
				// 成功上传后 获取上传信息
				// 输出 jpg
				$img= $info->getExtension();
               
				// 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
				$address = $info->getSaveName();	
                       					
				// 输出 42a79759f284b767dfcb2a0197904287.jpg
				$imgname = $info->getFilename(); 
				
				$imgaddress ='/articleimg/'.$address;
				
				$result['code']  =  0;  //为了照顾到layui富文本编辑器的小脾气 所以此处必须要用0表示成功
                
				$result['msg']   =  '上传成功';
                
				$result['data']['src'] = $imgaddress;
                
				$result['data']['title'] = '';
				
				echo json_encode($result);

			}
		
		}
		
		//文章根据pid的值查询栏目
		public function artree($pid,$params){
			
			$cate =Db::table('tp_category')->where($pid,$params)->where('url','news')->select();
			
			return $cate;
		}
		
		//封面图片上传到后台
		public function artimg(){
			
			// 获取表单上传文件 例如上传了001.jpg
			$file = request()->file('file');
			
			// 移动到框架应用根目录/public/uploads/ 目录下
			$info = $file->move(ROOT_PATH . 'public' . DS . 'articleimg');
			
			if($info){	
				// 成功上传后 获取上传信息
				// 输出 jpg
				$img= $info->getExtension();
               
				// 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
				$address = $info->getSaveName();	
                       					
				// 输出 42a79759f284b767dfcb2a0197904287.jpg
				$imgname = $info->getFilename(); 
				
				$imgaddress ='/articleimg/'.$address;
								
				Cookie::set('img',$imgaddress);

				return $this->success('图片上传成功');
				
			}else{
			
				return $this->error('图片上传失败');
			}
			

			
			
		}
		
		//文章上传
		public function  uploads($title,$category,$author,$newsdate,$pv,$artcontent,$ishow,$top,$descript){
			
			$img = Cookie::get('img');
			
			$time = time();
			
			$data =[
			
				'title'=>$title,
				
				'category'=>$category,
				
				'author'=>$author,
				
				'newsdate'=>$newsdate,
				
				'pv'=>$pv,
				
				'artcontent'=>$artcontent,
				
				'ishow'=>$ishow,
				
				'top'=>$top,
				
				'coverimg'=>$img,
				
				'addtime'=>$time,
				
				'descript'=>$descript
			];
			
			$res =Db('article')->insert($data);
			
			Cookie::delete('img');
			
			$this->success('文章添加成功');
			
		}
		
		
		
	}