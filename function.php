<?php
function filter($data){
	$data = filter_var($data,FILTER_SANITIZE_STRING);
	$data = trim($data);
	return $data;
}

function login($user,$pass)
{
  global $db;
	if(if_exist($user,$pass)){
		$stmt = $db->single("SELECT * FROM admin WHERE username = '{$user}' AND password = '{$pass}' LIMIT 1 ");
		$count = $db->rowcount();
		if($count == 1){
			$id = $stmt->id;
			$username = $stmt->username;

			$_SESSION['sess_id'] = $id;
			$_SESSION['sess_username'] = $username;
			redirect('home.php');
		}
	}
}


function loggedUser()
{
	global $db;
	if (isset($_SESSION['logged_user'])) {
		$id = (int)$_SESSION['logged_user'];
		$query = $db->query("SELECT * FROM admin WHERE id = '{$id}' ");
		$data = $query->fetch(PDO::FETCH_OBJ);
		return $data;
	}else{
		header('Location: index.php');
	}
}

function notification($msg,$type){
	$upper = strtoupper($type);
	return '
		<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">
		  <strong>'.$upper.'!</strong> '.$msg.'
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	';
}

function redirect($url){
	ob_start();
	header('location:'.$url);
}
