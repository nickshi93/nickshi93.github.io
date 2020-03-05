<?php 

	namespace app\admin\controller;
	
	use app\admin\model\Category AS CategoryModel;

	class Category extends Base{
	
		private  function category()
		{  
			
			$category =new CategoryModel();
			
			return $category;
			
		}
		
		public function index()
		{		
		
			$condition =['pid'=>0];
			
			$category = $this->category()->getAll($condition);
			
			$this->assign('category',$category);
			
			return $this->fetch('category/index');
					
		}
		
		//栏目信息
		public function categoryinfo()
		{
			
			$list=[
				
				'msg'=>'',
				
				'code'=>0,
			];
		
			$condition=['pid'=>0];

			$cate = $this->categorytree($condition); //查询pid=0的一级栏目
			
			  foreach($cate as $k) {
				
				$id = $k['id'];
				
				$cates['id']= $id;
				
				$cates['name']= $k['name'];
				
				$condition =['pid'=>$id];
				
				$cates['children']=$this->categorytree($condition); //根据一级栏目id查询二级栏目
				
				$data[]=$cates;
			  } 
			 
			$list['data'] = $data;	
		
			return  json($list);

		}
		
		//栏目list
		public function categorytree($condition)
		{
			
			$cate = $this->category()->getAll($condition);
			
			return $cate;
			
		}
	
		//删除栏目
		public function delcategory($id)
		{
			
			$condition =['id'=>$id];
			
			$this->category()->del($condition);
		
			$this->Success($this->category()->msg(20010));

		}
		//新增栏目
		public function addcategory($name,$id,$ishow,$sortid,$template)
		{

			$data =[
				
				'name'=>$name,
					
				'pid'=>$id,
				
				'sortid'=>$sortid,
				
				'is_show'=>$ishow,
				
				'url'=>$template
			
			];
			
			$this->category()->add($data);
			
			$this->Success($this->category()->msg(10010));
				
		}
		
		//编辑栏目
		public function edits($id)
		{
			
			$condition =['id'=>$id];
	
			$category = $this->category()->getAll($condition);
			
			foreach($category as $a){
				
				$pid =$a['pid'];
				
			}
			
			$condition =['id'=>$id];
			
			$tops =$this->category()->selectc($condition);
			
			$this->assign('tops',$tops);
			
			$this->assign('category',$category);
				
			return $this->fetch();
						
		}
		
		//更新编辑栏目信息
		public function updatecate($id,$pid,$name,$sortid,$ishow,$template)
		{
			
			$data =[
			
				'pid'  => $pid,
				
				'name' => $name,
				
				'is_show'=>$ishow,
				
				'url'=>$template,
				
				'sortid'=>$sortid

			];
			
			$condition=['id'=>$id];
			
			$this->category()->updates($condition,$data);
			
			$this->Success($this->category()->msg(30010));
				
		}
		
		
	}