<?php 

	namespace app\home\controller;
		
	require  __DIR__ . "../../sms/SignatureHelper.php";

	use think\Controller;
	
	use think\Db;
	
	use think\Session;
	
	use Aliyun\DySDKLite\SignatureHelper;
	
	class Sendsms extends Controller{
			
		function index($phone){
			
			$params = array ();

			// *** 需用户填写部分 ***
			// fixme 必填：是否启用https
			$security = false;
			
			$dysms =Db::table('tp_dysms')->select();
				
			foreach($dysms as $sms){
				
				$keyid = $sms['keyid'];
				
				$keysecret = $sms['keysecret'];
				
				$signame = $sms['signame'];
				
				$templatecode = $sms['templatecode'];
			
			}
			
			if($keyid =='' | $keysecret=='' | $signame=='' | $templatecode==''){
					
				$this->error('短信发送失败');
				
				return;
			}
			
			// fixme 必填: 请参阅 https://ak-console.aliyun.com/ 取得您的AK信息
			$accessKeyId = $keyid; 
			$accessKeySecret = $keysecret;

			// fixme 必填: 短信接收号码
			$params["PhoneNumbers"] = $phone;

			// fixme 必填: 短信签名，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
			$params["SignName"] =$signame;

			// fixme 必填: 短信模板Code，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
			$params["TemplateCode"] = $templatecode; //SMS_137689131是正确模板
			
			$code =str_pad(mt_rand(10, 999999), 6, "0", STR_PAD_BOTH); //随机生成6位数字
			
			// fixme 可选: 设置模板参数, 假如模板中存在变量需要替换则为必填项
			$params['TemplateParam'] = Array (
				"code" => $code,
				"product" => "阿里通信"
			);

			// fixme 可选: 设置发送短信流水号
			$params['OutId'] = "12345";

			// fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
			$params['SmsUpExtendCode'] = "1234567";


			// *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
			if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
				$params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
			}
			
			// 初始化SignatureHelper实例用于设置参数，签名以及发送请求
			$helper = new SignatureHelper();

			// 此处可能会抛出异常，注意catch
			$content = $helper->request(
				$accessKeyId,
				$accessKeySecret,
				"dysmsapi.aliyuncs.com",
				array_merge($params, array(
					"RegionId" => "cn-hangzhou",
					"Action" => "SendSms",
					"Version" => "2017-05-25",
				)),
				$security
			);
						
			//print_r($content); 短信发送返回的信息

			Session::set('yzm',md5($code));
			
			$yzm =Session::get('yzm');
			
			$this->success('短信发送成功');
			
		}
		
		
		
	}