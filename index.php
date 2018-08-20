<?php
define("WEBROOT", str_replace('index.php', "", $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));
require(ROOT.'core/model.php');
require(ROOT.'core/controller.php');

$params = explode('/',$_GET['p']);
$controller = !empty($params[0]) ? $params[0] : 'default';
$action = isset($params[1]) && !empty($params[1]) ? $params[1] : 'index';

$controller = strtolower($controller);
$action = strtolower($action);

if(!file_exists('controllers/'.$controller.'.controller.php')){
	require('404.php');
}
else{
	require('controllers/'.$controller.'.controller.php');
	$controller = ucfirst($controller)."Controller";
	$controller = new $controller();
	if(!method_exists($controller,$action)){
		require('404.php');
	}
	else{
		unset($params[0]);
		unset($params[1]);
		call_user_func_array(array($controller,$action), $params);
	}
}

