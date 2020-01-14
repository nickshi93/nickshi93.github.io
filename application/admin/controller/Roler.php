<?php 
	namespace app\admin\controller;
	
	use think\Controller;
	
	use think\Db;
	
	use app\admin\model\RolerModel;
	
	class Roler extends Base{
		
		public function index(){
			
			$com = new Common();
			
			$com ->index(); //调用常规数据	
			
			$title='角色管理';
			
			$this->assign('title',$title);
			
			return $this->fetch('roler/index');
						
		}
		
		//角色表信息
		public function roleinfo($limit,$page){
			//获取每页显示的条数
		    $limits = $limit;
		    //获取当前页数
		    $pages = $page-1;
			//计算出从那条开始查询
		    $tol = $pages *	$limits;
				   
			$count = Db::table('tp_role')->count();   //统计总个数
			
			$countpage = ceil($count /$limits);  //总页数
			
			$list["msg"]='';
			
			$list['code']=0;
			
			$list['count']=$count;  //总条数

			// 查询出当前页数显示的数据
			$data = Db::table('tp_role')->limit($tol,$limit)->select(); 		
		
			$list['data']= $data;
			
			return json($list);
		
		}
		
		
		
		//批量删除角色
		public function delselrole($id){
			
			$a =$id;

			for($i=0;$i<count($a);$i++){
				
				$id = $a[$i];
				
				if($id=='1'){
					
					$this->error('管理员角色无法删除');
					
					return;
				}
				
				$table ='tp_role';
			
				$delete =new Common();
				
				$delete->deletes($table,'id','=',$id);
				
				
				}
			$this->Success('删除角色成功');								
		}
		
		//新增角色和角色的权限
		public function addrole($rolename,$role){
						
			$role = implode(",", $role);
			
			$time =date('Y-m-d H:i:s',time());
			
			$data =[
				
				'name'=>$rolename,
				
				'addtime'=>$time,
				
				'authority' =>$role
				
			];
			
			$table ='tp_role';
			
			$userole =new Common();
				
			$userole->add($data,$table);
				
			return $this->success('新增'.$rolename.'角色成功');
				
		}
		
		//删除角色
		public function delrole($id){
			
			if($id=='1'){
				
				$this->error('管理员用户无法删除');
				
				return;
			}
			$table ='tp_role';
			
			$delete =new Common();
			
			$delete->deletes($table,'id','=',$id);
			
			$this->Success('删除角色成功');
			
		}
		
		//编辑角色
		public function roledit($id){
			
			$com = new Common();
			
			$com ->index(); //调用常规数据	
			
			if($id=='1'){
					
					$this ->error('管理员角色无法更改');
					
					return;
					
			}
			
			$rolemodel = new RolerModel();
			
			$field ='id';
			
			$role = $rolemodel ->selectrole($field,$id);
					
			foreach ($role as $authority){
							
				$a =$authority['authority'];
				
			}
									
			$this->assign('role',$role);
			
			$this->assign('authority',$a);
			
			return $this->fetch();
						
		}
		
		
		//更新角色权限
		
		public function updaterole($id,$role,$name){		
							
				$role = implode(",", $role); //数组转换字符串
				
				$table ='tp_role';
				
				$userole=Db::table($table)
					->where('id',$id)
					->update([
						'authority'  => $role,
						'name' => $name,
					]);

				$this ->success('更新角色权限成功');
		}
		
		
		
	}