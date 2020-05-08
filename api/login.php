<?php
require('../init.php');
$json = file_get_contents("php://input");
$obj = json_decode($json,true);

$username = $obj['username'];
$password = $obj['password'];

$stmt = $db->single_assoc("SELECT * FROM admin WHERE username = '{$username}' AND password = '{$password}' ");

$count = $db->rowcount();

if($count > 0){
	$sch = $db->single_assoc("SELECT * FROM schools");
	$successLoginMsg = 1;
	$user = $stmt;
	$successLoginJson = json_encode($successLoginMsg);
	//array_push($user, $sch);
	
	$param = array(
		'message' => 1,
		'data' => $user,
		'sch' => $sch
	);
	echo json_encode($param);
}else{
	$invalidMsg = 0;
	$invalidMsgJson = json_encode($invalidMsg);
	echo $invalidMsgJson;
}




