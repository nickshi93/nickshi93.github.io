<?php 

	namespace app\admin\controller;
	
	use think\Controller;
	
	use think\Db;
	
	class Category extends Controller{
		
		public function index()
		{
					
			$category =Db::table('tp_category')->where('pid','0')->select();
			
			$this->assign('category',$category);
			
			return $this->fetch('category/index');
					
		}
		//栏目信息
		public function categoryinfo(){
			
			$list["msg"]='';
			
			$list['code']=0;
			
			$id =0;
			
			$pid ='pid';
			
			$cate = $this ->categorytree($pid,$id); //查询pid=0的一级栏目
			
			  foreach($cate as $k) {
				
				$id = $k['id'];
				
				$cates['id']=$id;
				
				$cates['name']=$k['name'];
				
				$cates['children']=$this->categorytree($pid,$id); //根据一级栏目id查询二级栏目
				
				$data[]=$cates;
			  } 
			 
			$list['data'] = $data;	
		
			return  json($list);
		
			
		}
		
		//根据pid的值查询栏目
		public function categorytree($pid,$params){
			
			$cate =Db::table('tp_category')->where($pid,$params)->select();
			
			return $cate;
		}
		
		//删除栏目
		public function delcategory($id){
			
			$table ='tp_category';
			
			$field='id';
			
			$conditions='=';
			
			$result =new Common();
			
			$result->deletes($table,$field,$conditions,$id);
			
			$this->Success('删除成功');
			
			
		}
		//新增栏目
		public function addcategory($name,$id,$ishow,$sortid,$template){

			$data =[
				
				'name'=>$name,
					
				'pid'=>$id,
				
				'sortid'=>$sortid,
				
				'is_show'=>$ishow,
				
				'url'=>$template
			
			];
			
			$table ='tp_category';
			
			$result =new Common();
			
			$result ->add($data,$table);
			
			$this->Success('新增成功');
			
			
		}
		
		//编辑栏目
		public function edits($id){
		
			$category=Db::table('tp_category')->where('id','=',$id)->select();
			
			$this->assign('category',$category);
			
			foreach($category as $a){
				
				$pid =$a['pid'];
				
			}
			
			$tops =Db::table('tp_category')->where('pid','0')->select();
			
			$this->assign('tops',$tops);
			
			return $this->fetch();
						
		}
		
		//更新编辑栏目信息
		public function updatecate($id,$pid,$name,$sortid,$ishow,$template){

			$table ='tp_category';
			
			$data =[
			
				'pid'  => $pid,
				
				'name' => $name,
				
				'is_show'=>$ishow,
				
				'url'=>$template,
				
				'sortid'=>$sortid

			];
			
			$userole=Db::table($table)->where('id',$id)->update($data);
			
			$this->success('编辑成功');
				
		}
		
		
	}