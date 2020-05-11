<?php
require 'theme\init.php';

if(isset($_POST['email']) AND isset($_POST['password']))
{
	$email = filter($_POST['email']);
	$password = md5($_POST['password']);

	$data = $db->single("SELECT * FROM admin WHERE email = '{$email}' AND password = '{$password}' ");

	if($db->rowcount() == 1){
		$_SESSION['logged_id'] = $data->id;
		echo "true";
	}else{
		echo "false";
	}
}