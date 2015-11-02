<?php 
namespace Pay\Adapter;
use Pay\Base\BaseAbstract;
use Pay\Alipay\Sdk;

class Alipay extends BaseAbstract{
	
	private  $alipay = null; 
	public function __construct($option){
		$this->alipay = new Sdk($option);
	}
	public function getInstance(){
		return $this->alipay;
	}
	
	public function getPayUrl($order_id,$type){
		
		$order = $this->getOrder($order_id,$type);
		$url = $this->alipay->getPayUrl($order_id, '云族佳',  $order['amount']);
		return $url;
	}
}

?>