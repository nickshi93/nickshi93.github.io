<?php 
	namespace app\admin\controller;
	
	use think\Controller;
	
	use app\admin\model\Article as ArticleModel;
		
	use think\Cookie;
	
	class Article extends Base{
		
		private $table='article';
		
		private function article(){
			
			$article = New ArticleModel();
			
			return $article;

		}
		
		public function index(){
			
			return $this->fetch('article/index');
			
		}
		
		//文章目录
		public function articleinfo($limit,$page){
			
			//获取每页显示的条数
		    $limits = $limit;
		   //获取当前页数
		    $pages = $page-1;
			//计算出从那条开始查询
		    $tol = $pages *	$limits;
			
			$condition=[];
			
			$count = $this->article()->counts($this->table,$condition);  //统计总个数
			
			$countpage = ceil($count /$limits);  //总页数
			
			$list =[
			
				'msg'=>'',
				
				'code'=>0,
				
				'count'=>$count,//总条数
			
			];
			$data = $this->article()->articlemenu($tol,$limits);
			
			$list['data']=$data;
			
			return json($list);	
			
		}
		
		
		//主页更新字段内容
		public function update($id,$value,$field){
			
			$condition=['id'=>$id];
			
			$data=[$field=>$value];
			
			$this->article()->updates($this->table,$condition,$data); 
			
			echo $this->article()->msg(50010);
		}
		
		
		//更新主页文章是否显示
		public function updateishow($id,$ishow){
			
			if($ishow=='1'){
				
				$ishow ='0';
				
			}else{
				
				$ishow='1';
				
			}
			
			$data =['ishow'=>$ishow];
			
			$condition =['id'=>$id];
			
			$this->article()->updates($this->table,$condition,$data); 
			
			$this->success($this->article()->msg(50010));
		}
		
		//更新主页文章置顶
		public function updatetop($id,$top){
			
			if($top=='1'){
				
				$top ='0';
				
			}else{
				
				$top='1';
				
			}
			
			$data =['top'=>$top];
			
			$condition =['id'=>$id];
			
			$this->article()->updates($this->table,$condition,$data); 
			
			$this->success($this->article()->msg(50010));
			
		}
		
		
		//批量删除文章
		public function delselarticle($id){
			
			$a =$id;

			for($i=0;$i<count($a);$i++){
				
				$id = $a[$i];
				
				$condition = ['id'=>$id];
				
				$this->article()->del($this->table,$condition,$data); 
							
			}
			
			$this->Success($this->article()->msg(20010));			
			
		}
		
		//按标题搜索文章
		public function titlesearch($limit,$page,$title){
			
			//获取每页显示的条数
		    $limits = $limit;
		   //获取当前页数
		    $pages = $page-1;
			//计算出从那条开始查询
		    $tol = $pages *	$limits;	   
		
			$count = $this->article()->countitle($title);   //统计总个数
			
			$countpage = ceil($count /$limits);  //总页数
			
			$list["msg"]='';
			
			$list['code']=0;
			
			$list['count']= $count;  //总条数

			// 联合role表查询出当前user页数显示的数据
			
			$data = $this->article()->searhtitle($title,$tol,$limits);
	
			$list['data']=$data;
			
			return json($list);

		}
		
		//文章编辑页面
		public function edit($aid){
			
			$cate =New Addarticle();
			
			$id =0;
			
			$pid ='pid';
			
			$categorys =$cate->artree($pid,$id); //查询文章pid=0的一级栏目
			
			 foreach($categorys as $k) {
				
				$id = $k['id'];
				
				$category['id']=$id;
				
				$category['name']=$k['name'];
				
				$category['child']=$cate->artree($pid,$id); //根据一级栏目id查询二级栏目
				
				$data[]=$category;
			  } 

			$condition=['id'=>$aid];
			
			$article =$this->article()->select($this->table,$condition);
				
			$this->assign('data',$data);
			
			$this->assign('article',$article);
		
			return $this->fetch();
			
		}
		//更新文章内容
		public function updatearticle($id,$title,$category,$author,$newsdate,$pv,$artimg,$artcontent,$ishow,$top,$descript){
			
			$img = Cookie::get('img');
			
			if($img!==null){
				
				$artimg = $img;
				
			}else{
				
				$img =$artimg;
				
			}
			
			$time = time();
			
			$data =[
			
				'title'=>$title,
				
				'category'=>$category,
				
				'author'=>$author,
				
				'newsdate'=>$newsdate,
				
				'pv'=>$pv,
				
				'artcontent'=>$artcontent,
				
				'ishow'=>$ishow,
				
				'top'=>$top,
				
				'coverimg'=>$img,
				
				'addtime'=>$time,
				
				'descript'=>$descript
			];
			
			$condition=['id'=>$id];
			
			$this->article()->updates($this->table,$condition,$data);
			
			Cookie::delete('img');
			
			$this->success($this->article()->msg(50010));
			
			
		}
	}