<?php 
	
	namespace app\admin\controller;
	
	use app\admin\model\Member as MemberModel;

	class member extends Base{
	
		public function index()
		{

			return $this->fetch('member/index');
			
		}
		
		private function member()
		{
			
			$member = new MemberModel();
			
			return $member;
		}
		
		//会员信息
		public function memberinfo($limit,$page)
		{
	
			//获取每页显示的条数
		    $limits = $limit;
		   //获取当前页数
		    $pages = $page-1;
			//计算出从那条开始查询
		    $tol = $pages *	$limits;
			
			$condition =[];
			
			$count = $this->member()->counts($condition);   //统计总个数
		
			$countpage = ceil($count /$limits);  //总页数
			
			$list =[
				
				'msg'=>'',
				
				'code'=>'',
				
				'count'=>$count, //总条数
					
			];
			
			$data = $this->member()->getAll($condition); 	
			
			$list['data']=$data;
			
			return json($list);
		
		}
		
		//更新会员状态启用/禁用
		public function updatestatus($id,$status)
		{
			
			$condition =['id'=>$id];
			
			$status = $status =='1'?'0':'1';
					
			$data=['status'=>$status];
					
			$this->member()->updates($condition,$data);					
					
			$this->success($this->member()->msg(50010));
				
		}
		
		//删除会员
		public function delmember($id)
		{
			
			$condition =['id'=>$id];
			
			$this->member()->del($condition);
			
			$this->Success($this->member()->msg(20010));
			
		}
		
		//批量删除会员
		public function delselmember($id)
		{
			
			$a =$id;
			
			for($i=0;$i<count($a);$i++){
				
				$id = $a[$i];
				
				$condition =['id'=>$id];
				
				$this->member()->del($condition);
							
			}
			
			$this->Success($this->member()->msg(20010));								
		}
		
		//会员重置密码
		public function memberepsd($id)
		{
				
			$psd =$this->member()->hash_psd(123456);
			
			$condition =['id'=>$id];
			
			$data =['password'=>$psd];
			
			$this->member()->updates($condition,$data);			
			
			$this->success('会员重置密码为:123456');
					
		}
		//新增会员
		public function addmember($username,$password,$status,$phone)
		{
				
			$this->namecheck($username);
				
			$password = $this->member()->hash_psd($password);
			
			$time = date('Y-m-d H:i:s',time());
			
			$data=[
				
				'username'=>$username,
				
				'password'=>$password,
				
				'login_time'=>'',
				
				'resign_time'=>$time,
				
				'phone'=>$phone,
				
				'status'=>$status
			];
			
			$this->member()->add($data);
			
			$this->success($this->member()->msg(10010));			
		
		}
		
		//查看用户名是否存在
		public function namecheck($username)
		{
				
			$condition =['username'=>$username];	

			$user = $this->member()->counts($condition);
			
			if($user>0){
			
				return $this->error('用户名已存在');
				
				die;
				
			}
		
		}
		
		//会员编辑
		public function edit($id)
		{
			
			$condition =['id'=>$id];
			
			$member =$this->member()->getAll($condition);
			
			$this->assign('member',$member);
			
			return  $this->fetch();
			
		}
		
		//更改会员信息
		public function updatemember($username,$id)
		{
			
			
			
		}
		
		//会员搜索
		public function membersearch($limit,$page,$username,$selects,$mstatus)
		{
			
			//获取每页显示的条数
		    $limits = $limit;
		    //获取当前页数
		    $pages = $page-1;
			//计算出从那条开始查询
		    $tol = $pages *	$limits;
						
			$condition =['status'=>$mstatus];
	
			$count = $this->member()->searchcount($selects,$username,$condition);   //统计总个数
					
			$countpage = ceil($count /$limits);  //总页数
				
			$list =[
				
				'msg'=>'',
				
				'code'=>'',
				
				'count'=>$count, //总条数
					
			];
			
			$list['data']=$this->member()->search($selects,$username,$condition);
					
			return json($list);
					
		
		}
	}