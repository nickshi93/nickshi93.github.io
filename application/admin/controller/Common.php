<?php 

	namespace app\admin\controller;

	use app\admin\model;

	use think\Controller;  //引用think\Controller;是为了能够引用模板和变量赋值

	use think\Db;

	use think\Cookie;
	
	class Common extends Controller{
		
		public function index(){
			
			$name =cookie::get('name'); //用户名
				
			$this->assign('name',$name);
			
			$user =Db('admin')->where('username',$name)->find();
			
			$img =$user['img'];
			
			$this->assign('image',$img); //头像
			
			$menu = new Menu();
			
			$menus= $menu ->index();
			
			$this->assign('menu',$menus);
			
			
		}
		
		//统计各表单个数
		public function totaltable($table){
			
			return $total =Db($table)->count();
			
		}
		
		//查询用户列表权限
		public function userole(){
			
			$name = cookie::get('name'); //用户名
			
			$userole = Db::table('tp_admin')->where('username',$name)->field('role')->select();

			foreach ($userole as $role){
				
				$a =$role['role'];
			}
			
			$result = Db::table('tp_role')->where('id',$a)->field('authority')->select();
			
			foreach($result as $roles){
				
				$b = $roles['authority'];
				
			}
			
			return $role= $b;
			
		}
		
		/*新增数据*/
		public function add($data,$table){
		
			return  Db::table($table)->insert($data);  //插入数据
		
		}
		
		/*新增多条数据*/
		public function addall($data,$table){
		
			return  Db::table($table)->insertAll($data);  //插入多条数据
		
		}
		
		//删除数据
		public function deletes($table,$condition1,$condition2,$condition3){
		
			return Db::table($table)->where($condition1,$condition2,$condition3)->delete();

		}

		public function updates($table,$condition1,$condition2,$condition3,$condition4){
			
			
			return	Db::table($table) ->where($condition1,$condition2)->update([$condition3 =>$condition4]);
		}
		
		public function selectable($table){
			
			return Db::table($table)->field(['id','name'])->select();
		
		}
	}	
	