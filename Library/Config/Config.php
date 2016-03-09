<?php 
namespace Library\Config;
class Config{
	
	
	public static function getDbConfig(){
		return require   __DIR__.'/../../Application/config/db.php';
	} 
	
	public static function getCacheConfig(){
		$cache_config_file = __DIR__.'/../../Application/config/cache.php';
		if(file_exists($cache_config_file)){
			return require $cache_config_file;
		}
	}
}


?>