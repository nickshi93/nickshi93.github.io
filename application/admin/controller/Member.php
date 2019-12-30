<?php 
	
	namespace app\admin\controller;
	
	use think\Controller;
	
	use think\Db;
	
	class member extends Base{
		
		public function index(){

			return $this->fetch('member/index');
			
		}
		
		//会员信息
		public function memberinfo($limit,$page){
			//获取每页显示的条数
		    $limits = $limit;
		   //获取当前页数
		    $pages = $page-1;
			//计算出从那条开始查询
		    $tol = $pages *	$limits;
				   
			$count = Db('member')->count();   //统计总个数
		
			$countpage = ceil($count /$limits);  //总页数
			
			$list["msg"]='';
			
			$list['code']=0;
			
			$list['count']=$count;  //总条数

			$data = Db('member')->select(); 	
			
			$list['data']=$data;
			
			return json($list);
			
			$member =Db('member')->select();
			
			return json($member);
		}
		
		//更新会员状态启用/禁用
		public function updatestatus($id,$status){
				
			switch($status){
				
				case 0:
				
					$status =1;
					
					$data=[
						'status'=>$status
					
					];
					
					$member_status =Db('member')->where('id',$id)->update($data);					
					
					$this->success("启用成功");
				
				break;				
				
				case 1:
					$status =0;
					
					$data=[
						'status'=>$status
					
					];
					
					$member_status =Db('member')->where('id',$id)->update($data);		
				
					$this->success("禁用成功");
				
				break;	
				
			}		
			
		}
		
		//删除会员
		public function delmember($id){
			
			$table ='tp_member';
			
			$delete =new Common();
			
			$delete->deletes($table,'id','=',$id);
			
			$this->Success('删除会员成功');
			
		}
		
		//批量删除会员
		public function delselmember($id){
			
			$a =$id;

			for($i=0;$i<count($a);$i++){
				
				$id = $a[$i];
				
				$table ='tp_member';
			
				$delete =new Common();
				
				$delete->deletes($table,'id','=',$id);
							
			}
			$this->Success('删除会员成功');								
		}
		
		//会员重置密码
		public function memberepsd($id){
			
			$table ='tp_member';
			
			$psd =md5(md5(123456));
			
			$updateused =new Common();
				
			$updateused->updates($table,'id',$id,'password',$psd);
			
			return $this->success('会员重置密码为:123456');
					
		}
		//新增会员
		public function addmember($username,$password,$status,$phone){
				
			$member = Db('member')->where('username',$username)->count();
			
			if($member>0){
			
				return $this->error('用户名已存在');
				
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
			
			$result=Db('member')->insert($data);
			
			return $this->success('新增'.$username.'会员成功');			
		
		}
		
		
		//查看用户名是否存在
		public function namecheck($username){
			
			$user = Db('member')->where('username',$username)->count();
			
			if($user>0){
			
				return $this->success('用户名已存在');
				
			}else{
				
				return $this->success('用户名可以使用');
				
			}
		
		}
		
		//会员编辑
		public function edit($id){
			
			$member = Db('member')->where('id',$id)->select();
			
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