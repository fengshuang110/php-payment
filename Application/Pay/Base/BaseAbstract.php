<?php
namespace Pay\Base;
use Model\Custodian;
/**
 * @author fengshuang
 * 2015-7-7
 * UTF-8
 */
abstract class BaseAbstract{

	public $config;

	public function setConfig($config){
		$this->config = $config;
	}
	/**
	 * 获得订单
	 * @param unknown $order_id
	 * @throws Exception
	 * @return Ambigous <Ambigous, NULL>
	 */
	protected function getOrder($order_id,$type){
		if (empty ( $order_id )) {
			throw new \Exception ( 'order_id 不能为空' );
		}
		$data = array("amount"=>1);
		return $data;

		switch ($type){
			//托管支付
			case 1:
				$data = $this->getCustodian($order_id);
				break;
		}
		return $data;

	}

	public function getCustodian($trans_no){
		if(empty($trans_no)){
			return false;
		}
		$order = new Custodian();
		$record = $order->where(['field'=>'trans_no','op'=>'=','value'=>$trans_no])
			  			->where(['field'=>"status",'op'=>'=','value'=>0])
			  			->getOne();

		return $record;
	}

}
