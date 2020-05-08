<?php
ob_start();
session_start();
spl_autoload_register(function($class){
  require "model/".$class.".php";
});
require('function.php');
?>