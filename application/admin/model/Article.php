<?PHP

	namespace app\admin\model;
	
	use think\Model;
	
	class Article extends BaseModel{
		
		//文章标题模糊搜索
		public function searhtitle($title,$tol,$limit){
			
			$result = $this->where('title','like','%'.$title.'%')
					->limit($tol,$limit)
					->order('id desc')
					->select(); 	
			
			return $result;
			
		}
		//模糊搜索结果个数
		public function countitle($title){
			
			$result =$this->where('title','like','%'.$title.'%')
					->count();
			
			return $result;
		}
		
		//文章info
		public function articlemenu($tol,$limit){
			
			$result =$this->limit($tol,$limit)->order('id desc')->select();
			
			return $result;
		}
		
	}