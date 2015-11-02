<?php
namespace Pay;

/**
 * 
 * @author fengshuang
 * 2015/6/1
 * UTF-8
 */
class Config {
	private static $pay_config = array (
			'wechat' => array (
				'class_name' => 'Wechat',//螺丝帽短信通道
				'config' => array (
				),
			),
			'alipay' => array (
	
					'class_name' => 'Alipay',//
					
					'config' => array (
								'return_url'=>"http://beta.frontend.yzj.com/paymanager/alipay",
								'notify_url'=>"http://beta.frontend.yzj.com/paymanager/alipay",
								'partner' => 'xxxxxxxx',
					
								'key' => 'xxxxx',
			
								'seller_email' => 'xxxxx'
					),
			
			),
			//更多的通道W
	);
	
	/**
	 * 封闭构造
	 */
	private function __construct() {
	}
	
	/**
	 * 获得配置文件
	 *
	 * @param unknown $config_key        	
	 */
	public static function getConfig($config_key) {
		if (! isset ( self::$pay_config [$config_key] )) {
			return null;
		}
		return self::$pay_config [$config_key];
	}
}
