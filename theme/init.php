<?php
ob_start();
session_start();
require('function.php');
spl_autoload_register(function($class){
  require "model/".$class.".php";
});

$db = new DB();
function base_url()
{
	return 'http://'.$_SERVER['HTTP_HOST'].'/evoting';
}
function __($url)
{
	return base_url()."/". $url; 
}
?>