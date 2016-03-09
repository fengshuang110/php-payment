<?php
namespace Pay\Adapter;
use Pay\Base\BaseAbstract;
use Pay\Weixin\Config;
use Pay\Weixin\Sdk;

class Wechat extends BaseAbstract{
    protected $wechat;
    protected $unifiedOrder;
    protected $jsApi;
    public  $order = null;


    public function __construct($options=array()){

        $this->unifiedOrder = Sdk::getAdapter("UnifiedOrder_pub");
        $this->jsApi = Sdk::getAdapter("JsApi_pub");
        $this->nativeLink = Sdk::getAdapter("NativeLink_pub");
		    $this->orderQuery = Sdk::getAdapter("OrderQuery_pub");
    }

    //设置参数
    public function setPayRequestData($order_id,$trade_type="J",$openid){

        $this->order = $this->getOrder($order_id);
        $member = $this->getMember($this->order['buyer_id']);
        $this->unifiedOrder->setParameter("openid","$openid");//商品描述
        $this->unifiedOrder->setParameter("body",$this->order['seller_name']."店铺订单");//商品描述
        $this->unifiedOrder->setParameter("out_trade_no",$this->order['order_sn']);//商户订单号
        $this->unifiedOrder->setParameter("total_fee",$this->order['order_amount']*100);//总金额
//      $this->unifiedOrder->setParameter("total_fee",1);//总金额
        $this->unifiedOrder->setParameter("notify_url",Pay_Wechat_Config::NOTIFY_URL);//通知地址
        $this->unifiedOrder->setParameter("trade_type","JSAPI");//交易类型
//      非必填参数，商户可根据实际情况选填
//      $unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号
//      $unifiedOrder->setParameter("device_info","XXXX");//设备号
//      $unifiedOrder->setParameter("attach","XXXX");//附加数据
//      $unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
//      $unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间
//      $unifiedOrder->setParameter("goods_tag","XXXX");//商品标记
//      $unifiedOrder->setParameter("openid","XXXX");//用户标识
//      $unifiedOrder->setParameter("product_id","XXXX");//商品ID
    }
    /**
     * jsapi 支付签名字符串返回
     * @return unknown
     */
    public function JsApi(){

        $prepay_id = $this->unifiedOrder->getPrepayId();
        $this->jsApi->setPrepayId($prepay_id);
        $jsApiParameters = $this->jsApi->getParameters();
        return $jsApiParameters;
    }

    public function getPayUrl($product_id){
      $this->unifiedOrder->setParameter("body","店铺订单");//商品描述
      $this->unifiedOrder->setParameter("out_trade_no",$product_id);//商户订单号
      $this->unifiedOrder->setParameter("total_fee",1);//总金额
      $this->unifiedOrder->setParameter("product_id",$product_id);//总金额
//      $this->unifiedOrder->setParameter("total_fee",1);//总金额
      $this->unifiedOrder->setParameter("notify_url",Config::NATIVE_NOTIFY_URL);//通知地址
      $this->unifiedOrder->setParameter("trade_type","NATIVE");//交易类型\
      $url = $this->unifiedOrder->getPayUrl();
  
      echo 	'<img alt="模式一扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data='.urlencode($url).'" style="width:150px;height:150px;"/>';die;
    }

    public function checkPaysign($obj){

        return  $this->jsApi->getSign($obj);
    }

	public function orderQuery($order_sn){

		$this->orderQuery->setParameter("out_trade_no",$order_sn);//商户订单号
		return $this->orderQuery->orderQuery();

	}


}



?>
