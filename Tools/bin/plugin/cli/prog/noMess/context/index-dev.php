<?php
declare(strict_types=1);
error_reporting(E_ALL);
ini_set('display_errors', 'on');
ini_set("log_errors", "1");

define('WEBROOT', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

ini_set('error_log', ROOT .'Api/var/log/error.log');

if(isset($_POST['resetCache'])){
	opcache_reset();
	unset($_POST);
}

if(isset($_POST['invalide'])){
	opcache_invalidate($_POST['invalide'], true);
	unset($_POST);
}

if(isset($_POST['resetCacheRoute'])){
	unlink(ROOT . 'Api/var/cache/routes/routing.xml');
	unset($_POST);
}

require (ROOT . 'Api/vendor/autoload.php');
require (ROOT . 'Api/config/config-dev.php');
require (ROOT . 'Tools/bin/tools/time.php');

global $vController, $action, $method, $time, $tree;

$time = new Time();
$time->startController();

$debut = microtime(true);

if(!file_exists(ROOT . "Api/var/cache/routes/routing.xml")){
	$buildRouting = new NoMess\Core\BuildRoutes(ROOT . "Api/var/cache/routes/routing.xml");
	$buildRouting->build();
}

$builder = new DI\ContainerBuilder();
$builder->useAnnotations(true);
$builder->addDefinitions(ROOT . 'Api/config/di-definitions.php');
$container = $builder->build();
$controller = "";
$action = "";

$file = simplexml_load_file(ROOT . "Api/var/cache/routes/routing.xml");

foreach($file->routes as $value){
	if((string)$value->attributes()['url'] === $_GET['p']){
		$controller = (string)$value->controller;
		$vController = $controller;
		
		if(isset($_POST) && !empty($_POST)){
			$action = (string)$value->post->attributes()['action'];
			$method = "POST";
		}else{
			$action = (string)$value->get->attributes()['action'];
			$method = "GET";
		}
		
		break;
	}
} 

if(file_exists(ROOT . "Api/src/Controllers/" . ucfirst($controller) . ".php")){	
	$controller = $container->get("App\\Controllers\\" . ucfirst($controller));
	$controller->$action();
}

require ROOT . 'Tools/bin/tools/toolbar.php';

?>