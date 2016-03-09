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
				'class_name' => 'Wechat',//
				'config' => array (
				),
			),
			'alipay' => array (

					'class_name' => 'Alipay',//

					'config' => array (
								'return_url'=>"http://beta.xxxxx.com/paymanager/alipay",
								'notify_url'=>"http://beta.xxxx.com/paymanager/alipay",
								'partner' => 'xxxxx',

								'key' => 'xxxxxx',

								'seller_email' => 'xxxx@xx.com'
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
