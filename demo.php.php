<?php
//一般人都是mvc的吧 不解释了
 class DemoController{
	public function getPayUrl(){
		$order_id = $_GET['order_id'];
		$type = 1;//代表你的支付是什么类型的 
		//order_id 就是你的订单的订单号 通过订单号确定支付信息
		//type 代表你的支付类型 
		$url = Factory::getAgent('alipay')->getPayUrl($order_id,$type);
		if(!empty($url)){
			header("location: $url");die;//跳转到支付链接
		}
		echo "请求参数错误";
	}

	//支付回调接口
	public function alipay(){
		$async = false;//从请求头中获取是不是post和异步 同步的时候是false 异步post是true
		$paySuccess = Factory::getAgent('alipay')->getInstance()->verifySign($async);
		if($paySuccess){//支付成功检验签名成功
			$trans_no = $_REQUEST['out_trade_no'];//你支付的订单号
			if($async){
				//todo 你的订单状态更改
				//异步的 echo "success" or "fail";
			}else{
				//todo
				//跳转到你想跳转的页面header();
			}
			
			
		}
		
		echo "签名校验失败";die;
		
	}
 }
?>
	
	