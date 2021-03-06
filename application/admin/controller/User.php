<?php 

	namespace app\admin\controller;
	
	use app\admin\model\User as UserModel;

	class User extends Base{
			
		private $table='user';	
		
		private $title='新增用户';
		
		private function user()
		{
			
			$user = New UserModel; //实例化模型
			
			return $user;
			
		}
			
		public function index()
		{
					
			$this->assign('title',$this->title);

			$condition=['id'>0];
			
			$users = $this->user()->page(); //获取用户数据
		
			$pages = $users->render();//用户数据分页

			$role = $this->user()->role();
			
			$token =$this->request->token('_token_');//生成令牌
			
			$this->assign('role',$role);  
			
			$this->assign('users',$users);
						
			return $this->fetch('user/index');
						
		}
		
		//查看用户表信息
		public function userinfo($limit,$page)
		{
			
			//获取每页显示的条数
		    $limits = $limit;
		   //获取当前页数
		    $pages = $page-1;
			//计算出从那条开始查询
		    $tol = $pages *	$limits;
			
			$condition=[];

			$count =$this->user()->counts($condition);   //统计总个数
			
			$countpage = ceil($count /$limits);  //总页数
			
			$list["msg"]='';
			
			$list['code']=0;
			
			$list['count']=$count;  //总条数
			
			// 联合role表查询出当前user页数显示的数据
			$data = $this->user()->userlist($tol,$limit);
			
			$list['data']= $data;
			
			return json($list);

		}
				
		//删除用户
		public function deluser($id)
		{
			
			if($id=='1'){
				
				$this->error('管理员用户无法删除');
				
				return false;
			}
				
			$condition =['id'=>$id];

			$this->user()->del($condition);
			
			$this->Success('删除用户成功');

		}
			
		//新增用户
		public function adduser($user)
		{
			
			$this->namecheck($user['username']);
				
			$password =$this->user()->hash_psd($user['password']);

			$this->user()->adduser($user,$password);
				
			return $this->success('新增'.$user['username'].'用户成功');
				
		}
		
		//重置用户密码
		public function resetpsd($id)
		{
		
			$psd =$this->user()->hash_psd(123456);
			
			$condition =['id'=>$id];
			
			$data =['password'=>$psd,];
				
			$this->user()->updates($condition,$data);
			
			return $this->success('重置密码为:123456');
			
		}
		
		//更新用户状态
		public function updataused($id,$used)
		{
			
			$condition = ['id'=>$id];	

			$used= $used=='1'?'0':'1';
			
			$data =['used'=>$used];
								
			$this->user()->updates($condition,$data); 
									
			$this->Success('更改成功');

		}
		
		//批量删除用户
		public function delseluser($id)
		{
			
			$a =$id;

			for($i=0;$i<count($a);$i++){
				
				$id = $a[$i];
				
				if($id=='1'){
					
					$this->error('管理员用户无法删除');
					
					return;
				}

				$condition =['id'=>$id];

				$this->user()->delu($condition);
							
			}
			$this->Success('删除用户成功');								
		}
		
		//编辑用户
		public function useredit($id)
		{
			
			$condition =['id'=>$id];
			
			$users = $this->user()->getAll($condition);  //查询用户信息
			
			$role = $this->user()->role();
			
			$this->assign('role',$role);  //角色列表
			
			$this->assign('user',$users);
			
			return $this->fetch('user/edit');					
		}
		
		//更新编辑后的用户权限
		public function updateuser($id,$role)
		{
		
			$condition =['id'=>$id];
			
			$data =['role'=>$role];
			
			$this->user()->updates($condition,$data); 
			
			$this->success('用户编辑成功');
								
		}
		
		//修改个人资料		
		public function changedetail()
		{
			
			$name = $this->admin(); //用户名
			
			$data =['username'=>$name];
			
			$users = $this->user()->find($this->table,$data);
		
			$img = $users['img'];
			
			$this->assign('image',$img);

			$this ->assign('name',$name);
			
			return $this->fetch('user/changedetail');
		}
		
		
		//更新修改后的个人密码
		public function userupdate($username,$password)
		{
			
			$psd = $this->user()->hash_psd($password);
		
			$condition =['username'=>$username];
			
			$data =['password'=>$psd];
			
			$this->user()->updates($condition,$data); 
			
			$this->success('用户'.$username.'编辑成功');
											
		}
		
		//查看用户名是否存在
		public function namecheck($username)
		{
			
			$condition =['username'=>$username];
			
			$user = $this->user()->counts($condition);
			
			if($user>0){
			
				return $this->success('用户名已存在');
				
				die;
				
			}
		
		}
		
		//用户搜索
		public function usersearch($limit,$page,$username)
		{
	
			//获取每页显示的条数
		    $limits = $limit;
		    //获取当前页数
		    $pages = $page-1;
			//计算出从那条开始查询
		    $tol = $pages *	$limits;
				   
			$count = $this->user()->searchcount($username);   //统计总个数
			
			$countpage = ceil($count /$limits);  //总页数
	
			$list =[
				
				'msg'=>'',
					
				'count'=>$count,//总条数
					
				'code'=>0,
			
			];

			// 联合role表查询出当前user页数显示的数据
			$data = $this->user()->likesearch($tol,$limit,$username);
			
			$list['data']=$data;
			
			return json($list);
			
		}
		
		//更换用户头像
		public function userimg()
		{
			
			// 获取表单上传文件 例如上传了001.jpg
			$file = request()->file('file');
			
			// 移动到框架应用根目录/public/userimage/ 目录下
			$info = $file->move(ROOT_PATH . 'public' . DS . 'userimage');
				
			if($info){	
				// 成功上传后 获取上传信息
				// 输出 jpg
				$img= $info->getExtension();
				   
				// 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
				$address = $info->getSaveName();	
								
				// 输出 42a79759f284b767dfcb2a0197904287.jpg
				$imgname = $info->getFilename(); 
					
				$data =[
						
					'img'=>'/userimage/'.$address,
					
				];
					
				$username = $this->admin(); //用户名
					
				$condition =['username'=>$username];
					
				$this->user()->updates($condition,$data); 
					
				$this->success('头像更改成功');

			}
		}
		
		
	}