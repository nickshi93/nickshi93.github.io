<?php 
	
	namespace app\admin\controller;
	
	use think\Controller;
	
	use app\admin\model\MemberModel;
	
	use think\Db;
	
	class member extends Base{
		
		private $table ='member';
		
		public function index(){

			return $this->fetch('member/index');
			
		}
		
		private function memberm(){
			
			$memberm = new MemberModel();
			
			return $memberm;
		}
		
		//会员信息
		public function memberinfo($limit,$page){
	
			//获取每页显示的条数
		    $limits = $limit;
		   //获取当前页数
		    $pages = $page-1;
			//计算出从那条开始查询
		    $tol = $pages *	$limits;
			
			$condition =[];
			
			$count = $this->memberm()->counts($this->table,$condition);   //统计总个数
		
			$countpage = ceil($count /$limits);  //总页数
			
			$list["msg"]='';
			
			$list['code']=0;
			
			$list['count']=$count;  //总条数
			
			$data = $this->memberm()->select($this->table,$condition); 	
			
			$list['data']=$data;
			
			return json($list);
		
		}
		
		//更新会员状态启用/禁用
		public function updatestatus($id,$status){
			
			$condition =['id'=>$id];
				
			switch($status){
				
				case 0:
				
					$status =1;
					
					$data=['status'=>$status];
					
					$this->memberm()->updates($this->table,$condition,$data);					
					
					$this->success($this->memberm()->msg(40010));
				
				break;				
				
				case 1:
					
					$status =0;
					
					$data=['status'=>$status];
					
					$this->memberm()->updates($this->table,$condition,$data);
				
					$this->success($this->memberm()->msg(40020));
				
				break;	
				
			}		
			
		}
		
		//删除会员
		public function delmember($id){
			
			$condition =['id'=>$id];
			
			$this->memberm()->del($this->table,$condition);
			
			$this->Success($this->memberm()->msg(20010));
			
		}
		
		//批量删除会员
		public function delselmember($id){
			
			$a =$id;
			
			for($i=0;$i<count($a);$i++){
				
				$id = $a[$i];
				
				$condition =['id'=>$id];
				
				$this->memberm()->del($this->table,$condition);
							
			}
			
			$this->Success($this->memberm()->msg(20010));								
		}
		
		//会员重置密码
		public function memberepsd($id){
				
			$psd =$this->memberm()->hash_psd(123456);
			
			$condition =['id'=>$id];
			
			$data =['password'=>$psd];
			
			$this->memberm()->updates($this->table,$condition,$data);			
			
			$this->success('会员重置密码为:123456');
					
		}
		//新增会员
		public function addmember($username,$password,$status,$phone){
				
			$this->namecheck($username);
				
			$password = $this->memberm()->hash_psd($password);
			
			$time = date('Y-m-d H:i:s',time());
			
			$data=[
				
				'username'=>$username,
				
				'password'=>$password,
				
				'login_time'=>'',
				
				'resign_time'=>$time,
				
				'phone'=>$phone,
				
				'status'=>$status
			];
			
			$this->memberm()->insert($this->table,$data);
			
			$this->success($this->memberm()->msg(10010));			
		
		}
		
		//查看用户名是否存在
		public function namecheck($username){
				
			$condition =['username'=>$username];	

			$user = $this->memberm()->counts($this->table,$condition);
			
			if($user>0){
			
				return $this->error('用户名已存在');
				
				die;
				
			}
		
		}
		
		//会员编辑
		public function edit($id){
			
			$condition =['id'=>$id];
			
			$member =$this->memberm()->select($this->table,$condition);
			
			$this->assign('member',$member);
			
			return  $this->fetch();
			
		}
		
		//更改会员信息
		public function updatemember($username,$id){
			
			
			
		}
		
		//会员搜索
		public function membersearch($limit,$page,$username,$selects,$mstatus){
			
			//获取每页显示的条数
		    $limits = $limit;
		    //获取当前页数
		    $pages = $page-1;
			//计算出从那条开始查询
		    $tol = $pages *	$limits;
			
			switch($selects){
				
				case 'phone':
			
					$count = Db($this->table)->where('phone','like','%'.$username.'%')->where('status',$mstatus)->count();   //统计总个数
					
					$countpage = ceil($count /$limits);  //总页数
				
					$list["msg"]='';
					
					$list['code']=0;
					
					$list['count']=$count;  //总条数

					$data = Db($this->table)		
							
							->where('phone','like','%'.$username.'%')
							
							->where('status',$mstatus)
							
							->order('id desc')
							
							->select(); 	
					
					$list['data']=$data;
					
					return json($list);
				
				break;
				
				case 'username':
				
					$count = Db($this->table)->where('username','like','%'.$username.'%')->where('status',$mstatus)->count();   //统计总个数
					
					$countpage = ceil($count /$limits);  //总页数
				
					$list["msg"]='';
					
					$list['code']=0;
					
					$list['count']=$count;  //总条数

					$data = Db($this->table)		
							
							->where('username','like','%'.$username.'%')
							
							->where('status',$mstatus)
							
							->order('id desc')
							
							->select(); 	
					
					$list['data']=$data;
					
					return json($list);
				
				break;				
				
			}
		
		}
	}