<?php
namespace app\home\Controller;

use app\home\model\goodsModel;

use think\Controller;  //引用think\Controller;是为了能够引用模板和变量赋值

use think\Db;

use think\Cookie;

class Index extends Controller{
	
   public function index()
   {	   
		goodsModel::eat();//use app\index\model\goodsModel后就能调用model里的类
	   
		$shi =new Goods();
		
		$shi ->say();
		
		$say = 'hello world,这是PHP文件赋值的语句';
		
		$this->assign('say',$say);		  				 
				 
		$name = new user();

		$name ->say();	 //虽然上面也有say()方法，但是因为namespace的原因，两个类方法一样但没问题
				
        $result = Db::name('user')->where('id',1)->find();  //默认情况下，find和select方法返回的都是数组。

		$psd= $this->random_char();	//$this->   调用本类中的其他函数
		
		$time =time();
			
		$data = [
								
			['name' =>'nick',
			
			'password'=>$psd,
			
			'addtime'=>$time
			],
			
			[
			'name' =>'nick1',
			
			'password'=>$psd,
			
			'addtime'=>$time
			
			]
				
		];
		
			
		$datas =[
		
			'name' =>'nicks',
			
			'password'=>$psd,
			
			'addtime'=>$time
		
		];
		
	
		
		$table ='tp_user';
		
		$result =Db::table($table)->where('id','>',1)->paginate(10); //find（）查询所有
		
		$page = $result->render(); //分页显示输出
		
		//$result =Db::table($table)->where('id','>',1)->find(); //find（）只查询一个
		
		//Cookie::set('name','nick',3600);
		
		foreach($result as $v){
			
			$user[] = $v;
			
		}
		
		$this->assign('user',$user);

		$this->assign('page',$page);			
		
		$com = new com();
		
		//$com->deletes($table,'id','>','10'); //根据条件删除数据
		
		//$com ->add($datas,$table);
		//$com ->addall($data,$table);
		//$this->addall($data,$table);  //$this调用类的其他函数
		//$this->add($datas,$table);  //$this调用类的其他函数
		
		//$this ->success('新增成功','view/goods/index');
		
		
		return $this->fetch();
		//return $this->fetch('goods/index'); //引用goods文件下的index.html
		
    }
		
	public function show()
	{
		
		return "hello";
		
	}
	
	/*随机密码*/
	function random_char($length = 8,$chars = null){
		 
		 if( empty($chars) ){
		
			$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		
		}
		 
		$chars = str_shuffle($chars);
		
		$num = $length < strlen($chars) - 1 ? $length:str_len($chars) - 1;
		
		return substr($chars,0,$num);
	}
		

	
}
