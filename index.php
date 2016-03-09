<?php
error_reporting(E_ALL);
$uri = $_SERVER['REQUEST_URI'];
$uriArr = explode('?',$uri);
$path = $uriArr[0];
$path = trim($path,'/');
$arr = explode('/',$path);

$className = (empty($arr[0])) ?  'IndexController' : Ucfirst(strtolower($arr[0])).'Controller';
$actionName = (empty($arr[0])) ?  'actionIndex' : 'action'.Ucfirst(strtolower($arr[1]));
$namespace = "Application\\Controller\\";

//明明空间注册
include __DIR__ . '/Library/Loader/AutoloaderFactory.php';
Library\Loader\AutoloaderFactory::factory(array(
			'Library\Loader\StandardAutoloader' => array(
			'autoregister_zf' => true,
			"namespaces"=>array(
				"Application"=>__DIR__.'/Application',
        "Pay"=>__DIR__.'/Application/Pay',
			)
		)
));

$className = $namespace.$className;
if(!class_exists($className)){
	return ;
}
$class = new $className;
if(!method_exists($class,$actionName)){
	return ;
}

call_user_func_array(array($class, $actionName),$_REQUEST);
