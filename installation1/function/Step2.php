<?php
ob_start();
session_start();
if(isset($_POST['submit'])){
	include __DIR__."/../../modules/Database/Config.php";
	$connect = new mysqli($DataBase['hostname'], $DataBase['username'], $DataBase['password'], $DataBase['name']);
	$FormData = array(
		'admin_id' => '1',
		'admin_fname' => htmlentities(mysqli_real_escape_string($connect, $_POST['first'])),
		'admin_lname' => htmlentities(mysqli_real_escape_string($connect, $_POST['last'])),
		'admin_password' => hash('sha256', mysqli_real_escape_string($connect, $_POST['password'])),
		'admin_email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
		'admin_key' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'), 0, 8)
	);
	$sql = "INSERT INTO `hosting_admin` (`admin_id`, `admin_fname`, `admin_lname`, `admin_email`, `admin_key`, `admin_password`) VALUES (?, ?, ?, ?, ?, ?)";
	$stmt = $connect->prepare($sql);
	$stmt->bind_param("ssssss", $FormData['admin_id'], $FormData['admin_fname'], $FormData['admin_lname'], $FormData['admin_email'], $FormData['admin_key'], $FormData['admin_password']);
	if($stmt->execute()){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert">Successfully created admin account.</div>';
		header('location: ../install?step=3');
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">Something is going all the way round.</div>';
		header('location: ../install?step=2');
	}
	$stmt->close();
	$connect->close();
}
?>
