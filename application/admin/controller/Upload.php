<?php 

	namespace app\admin\controller;
	
	use think\Controller;
	
	use think\Db;
	
	class Upload extends Base{
		
		public function upload(){        
       
			// 获取表单上传文件 例如上传了001.jpg
			$file = request()->file('file');
			
			// 移动到框架应用根目录/public/uploads/ 目录下
			$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
			
			if($info){	
				// 成功上传后 获取上传信息
				// 输出 jpg
				$img= $info->getExtension();
               
				// 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
				$address = $info->getSaveName();	
                       					
				// 输出 42a79759f284b767dfcb2a0197904287.jpg
				$imgname = $info->getFilename(); 
				
				$data =[
					
					'image_address'=>'/uploads/'.$address,
                   	'imgtype'=>0,
                    'sortid'=>0
				
				];
					
				$result =Db::table('tp_banner')->insert($data);
			
				return $this->success('图片上传成功');
				
			}else{
			
				return $this->error('图片上传失败');
			}
		
		}

		
		
		
		
	}