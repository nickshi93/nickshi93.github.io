<?php 
	
	namespace app\admin\controller;

	use app\admin\model\Role as RoleModel;

	class Roler extends Base{
		
		private $title='角色管理';
		
		private function roler()
		{
			
			$roler = new RoleModel();
		
			return $roler;
			
		}
		
		public function index()
		{
	
			$this->assign('title',$this->title);
			
			return $this->fetch('roler/index');
						
		}
		
		//角色表信息
		public function roleinfo($limit,$page)
		{
			//获取每页显示的条数
		    $limits = $limit;
		    //获取当前页数
		    $pages = $page-1;
			//计算出从那条开始查询
		    $tol = $pages *	$limits;
				   
			$count =  $this->roler()->counts();   //统计总个数   
			
			$countpage = ceil($count /$limits);  //总页数
			
			$list["msg"]='';
			
			$list['code']=0;
			
			$list['count']=$count;  //总条数

			// 查询出当前页数显示的数据
			$data = $this->roler()->selectlimit($tol,$limit);	
		
			$list['data']= $data;
			
			return json($list);
		
		}
		
		//批量删除角色
		public function delselrole($id)
		{
			
			$a =$id;

			for($i=0;$i<count($a);$i++){
				
				$id = $a[$i];
				
				if($id=='1'){
					
					$this->error('管理员角色无法删除');
					
					return;
				}
				
				$condition=['id'=>$id];
				
				$this->roler()->del($condition);
				
				}
			$this->Success('删除角色成功');								
		}
		
		//新增角色和角色的权限
		public function addrole($rolename,$role)
		{
						
			$role = implode(",", $role);
			
			$time =date('Y-m-d H:i:s',time());
			
			$data =[
				
				'name'=>trim($rolename),
				
				'addtime'=>$time,
				
				'authority' =>$role
				
			];
			
			$this->roler()->add($data);
				
			return $this->success('新增'.$rolename.'角色成功');
				
		}
		
		//删除角色
		public function delrole($id)
		{
			
			if($id=='1'){
				
				$this->error('管理员用户无法删除');
				
				return;
			}
			
			$condition=['id'=>$id];
			
			$this->roler()->del($condition);
			
			$this->Success('删除角色成功');
			
		}
		
		//编辑角色
		public function roledit($id)
		{
			
			if($id=='1'){
					
				$this ->error('管理员角色无法更改');
					
				return false;		
			}

			$condition=['id'=>$id];
			
			$role =$this->roler()->getAll($condition);
					
			foreach ($role as $authority){
							
				$a = $authority['authority'];
				
			}
			
			$this->assign('role',$role);
			
			$this->assign('authority',$a);
			
			$this->assign('id',$id);
			
			return $this->fetch();
						
		}
		
		//权限列表
		public function plus($id)
		{
						
			$menu = new Menu();
			
			$menus= $menu ->index(); //导航栏列表
		
			foreach($menus as $role){
				
				if($role['child']!=''){
					
					$child = $this->menulist($role['child'],$id);
	
					$true = $this->inrole($id,$role['id']);
					
					$data[] =[	
							
						'title'=>$role['name'],
							
						'id'=>$role['id'],
							
						'checked'=>$true,
						
						'spread'=>'',
							
						'children'=>$child,
							
					];
					
				}else{
				
					$data[] =[
						
						'title'=>$role['name'],
						
						'id'=>$role['id'],
						
						'checked'=>$true,
						
						'spread'=>'',
						
						'children'=>'',
				
					];
					
				}
				
			}
			
			return json($data);
					
		}
		//导航栏子类
		public function menulist($menu,$id)
		{
			
			foreach($menu as $rolechild){
						
				$rolechild['true'] = $this->inrole($id,$rolechild['id']);
					
				$true = $this->inrole($id,$rolechild['id']);

				$child[] =[
							
					'title'=>$rolechild['name'],
						
					'id'=>$rolechild['id'],
						
					'checked'=>$true,
						
					'spread'=>'',
						
					'children'=>'',
								
				];
						
			}
			return $child;
			
		}
		
		//是否有权限
		public function inrole($id,$roleid)
		{

			$condition=['id'=>$id];
			
			$role = $this->roler()->getAll($condition);
					
			foreach ($role as $authority){
							
				$a = $authority['authority'];
				
				$ar = explode(",",$a);//字符串转换数组
			
			}
			
			if(in_array($roleid,$ar)){
						
				return	true;
					
			}else{
						
				return	false;
			}
			
		}
		//layui更新权限
		public  function uprole($data,$rid)
		{
			
			foreach($data as $role){
				
				$id[] =$role['id'];
				
				foreach($role['children'] as $rolechild){
					
					$id[] =$rolechild['id'];
				}
			}
			
			$role = implode(",",$id); //数组转换字符串
			
			$condition =['id'=>$rid];
			
			$data=['authority'=>$role];
			
			$this->roler()->updates($condition,$data);
			
			$this ->success('更新权限成功');
		}
		
		//更新角色权限	
		public function updaterole($id,$role,$name)
		{		
							
			$role = implode(",",$role); //数组转换字符串
	
			$condition=['id'=>$id];
	
			$data=[
					
				'authority'  => $role,
					
				'name' => $name,
				
			];
				
			$this ->success('更新角色权限成功');
		
		}
		
		
		
	}