<?php 
	
	namespace app\admin\controller;
	
	use think\Controller;
	
	use app\admin\model\MemberModel;
	
	use think\Db;
	
	class member extends Base{
		
		public function index(){

			return $this->fetch('member/index');
			
		}
		
		//会员信息
		public function memberinfo($limit,$page){
			
			$member = new MemberModel();
			//获取每页显示的条数
		    $limits = $limit;
		   //获取当前页数
		    $pages = $page-1;
			//计算出从那条开始查询
		    $tol = $pages *	$limits;
				   
			$count = $member->membercount();   //统计总个数
		
			$countpage = ceil($count /$limits);  //总页数
			
			$list["msg"]='';
			
			$list['code']=0;
			
			$list['count']=$count;  //总条数

			$data = $member->memberinfo(); 	
			
			$list['data']=$data;
			
			return json($list);
		
		}
		
		//更新会员状态启用/禁用
		public function updatestatus($id,$status){
			
			$member = new MemberModel();
			
			$condition =['id'=>$id];
				
			switch($status){
				
				case 0:
				
					$status =1;
					
					$data=['status'=>$status];
					
					$member->updatemember($condition,$data);					
					
					$this->success("启用成功");
				
				break;				
				
				case 1:
					
					$status =0;
					
					$data=['status'=>$status];
					
					$member->updatemember($condition,$data);
				
					$this->success("禁用成功");
				
				break;	
				
			}		
			
		}
		
		//删除会员
		public function delmember($id){
			
			$member = new MemberModel();
			
			$condition =['id'=>$id];
			
			$member->delmember($condition);
			
			$this->Success('删除会员成功');
			
		}
		
		//批量删除会员
		public function delselmember($id){
			
			$a =$id;
			
			$member = new MemberModel();

			for($i=0;$i<count($a);$i++){
				
				$id = $a[$i];
				
				$condition =['id'=>$id];
				
				$member->delmember($condition);
							
			}
			
			$this->Success('删除会员成功');								
		}
		
		//会员重置密码
		public function memberepsd($id){
			
			$member = new MemberModel();
			
			$psd =md5(md5(123456));
			
			$condition =['id'=>$id];
			
			$data =['password'=>$psd];
			
			$member->updatemember($condition,$data);			
			
			$this->success('会员重置密码为:123456');
					
		}
		//新增会员
		public function addmember($username,$password,$status,$phone){
			
			$members = new MemberModel();
			
			$condition =['username'=>$username];	
				
			$member = $members->membername($condition);
			
			if($member>0){
			
				$this->error('用户名已存在');
				
			}
				
			$password =md5(md5($password));
			
			$time = date('Y-m-d H:i:s',time());
			
			$data=[
				
				'username'=>$username,
				
				'password'=>$password,
				
				'login_time'=>'',
				
				'resign_time'=>$time,
				
				'phone'=>$phone,
				
				'status'=>$status
			];
			
			$members->insertmember($data);
			
			$this->success('新增'.$username.'会员成功');			
		
		}
		
		//查看用户名是否存在
		public function namecheck($username){
			
			$member = new MemberModel();
			
			$condition =['username',$username];	

			$user = $member->membername($condition);
			
			if($user>0){
			
				return $this->success('用户名已存在');
				
			}else{
				
				return $this->success('用户名可以使用');
				
			}
		
		}
		
		//会员编辑
		public function edit($id){
			
			$member = new MemberModel();
			
			$condition =['id'=>$id];
			
			$member =$member->memberidinfo($condition);
			
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
			
					$count = Db('member')->where('phone','like','%'.$username.'%')->where('status',$mstatus)->count();   //统计总个数
					
					$countpage = ceil($count /$limits);  //总页数
				
					$list["msg"]='';
					
					$list['code']=0;
					
					$list['count']=$count;  //总条数

					$data = Db::table('tp_member')		
							
							->where('phone','like','%'.$username.'%')
							
							->where('status',$mstatus)
							
							->order('id desc')
							
							->select(); 	
					
					$list['data']=$data;
					
					return json($list);
				
				break;
				
				case 'username':
				
					$count = Db('member')->where('username','like','%'.$username.'%')->where('status',$mstatus)->count();   //统计总个数
					
					$countpage = ceil($count /$limits);  //总页数
				
					$list["msg"]='';
					
					$list['code']=0;
					
					$list['count']=$count;  //总条数

					$data = Db::table('tp_member')		
							
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