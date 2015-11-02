<?php
namespace Pay;
/**
 * @name Factory
 * @desc 第三方支付渠道代理工厂类
 * @author fengshuang
 */
class Factory{
	
	public static function getAgent($agentName) {
		$config = Config::getConfig($agentName);
		if(empty($config)){
			throw new \Exception('支付渠道不存在');
		}
		$class_name =  __NAMESPACE__."\\Adapter\\".$config['class_name'];
		if(!class_exists($class_name)){
			throw new \Exception('支付渠道不合法');
		}
		$adapter = new $class_name($config['config']);
		return $adapter;
	}
}

