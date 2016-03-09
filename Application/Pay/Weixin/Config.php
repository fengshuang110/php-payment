<?php
/**
* 	配置账号信息
*/
namespace Pay\Weixin;
class Config
{
	//=======【基本信息设置】=====================================


	const APPID = 'xxxxx';
const MCHID = 'xxxxx';
const KEY = 'xxxxxx';
const APPSECRET = 'xxxxxxx';


	//=======【JSAPI路径设置】===================================
	//获取access_token过程中的跳转uri，通过跳转将code传入jsapi支付页面
	const JS_API_CALL_URL = 'http://xxxxxx.wxpay/demo/js_api_call.php';

	//=======【证书路径设置】=====================================
	//证书路径,注意应该填写绝对路径
	const SSLCERT_PATH = '/xxx/xxx/xxxx/Wechat/cacert/apiclient_cert.pem';
	const SSLKEY_PATH = '/xxx/xxx/xxxx/Wechat/cacert/apiclient_key.pem';
	//=======【异步通知url设置】===================================
	//异步通知url，商户根据实际开发过程设定
	const NOTIFY_URL = 'http://xxxxxxx/paynotify/wechat';

	const NATIVE_NOTIFY_URL = 'http://www.xxxxxx.com';

	//=======【curl超时设置】===================================
	//本例程通过curl使用HTTP POST方法，此处可修改其超时时间，默认为30秒
	const CURL_TIMEOUT = 30;
}

?>
