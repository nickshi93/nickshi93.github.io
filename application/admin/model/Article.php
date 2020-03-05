<?PHP

	namespace app\admin\model;
	
	class Article extends BaseModel{
		
		//文章标题模糊搜索
		public function searhtitle($title,$tol,$limit){
			
			return  $this->where('title','like','%'.$title.'%')
					->limit($tol,$limit)
					->order('id desc')
					->select(); 	
			
		}
		//模糊搜索结果个数
		public function countitle($title){
			
			$result =$this->where('title','like','%'.$title.'%')
					->count();
			
			return $result;
		}
		
		public function counts($condition)
		{
			return $this->where($condition)->count();
			
		}
		//文章info
		public function articlemenu($tol,$limit){
			
			return $this->limit($tol,$limit)->order('id desc')->select();
		
		}
		
		public function updates($condition,$data)
		{
			
			$this->where($condition)->update($data);
		}
		
		
		public function del($condition,$data)
		{
			$this->where($condition)->delete($data);
		}
		
		
		public function getAll($condition)
		{
			return $this->where($condition)->select();
			
		}
		//文章的栏目分类list
		public function articlecate($condition)
		{
			
			return Db('category')->where($condition)->select();
		}
		
		public function add($data)
		{
			$this->save($data);
			
		}
		
	}