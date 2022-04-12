<?php
if(isset($_COOKIE['LEFSESS'])){
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_clients` WHERE `hosting_client_email`='".hex2bin($_COOKIE['LEFSESS'])."'");
	if(mysqli_num_rows($sql)>0){
		$ClientInfo = mysqli_fetch_Assoc($sql);
	}
	else{
		setcookie('LEFSESS',NULL,-1,'/');
		$_SESSION['message'] = '<div class="alert alert-danger">Your session has been expired.</div>';
		header('location: login.php');
	}
}
else{
	$_SESSION['message'] = '<div class="alert alert-danger">Your session has been expired.</div>';
	header('location: login.php');
}
?>