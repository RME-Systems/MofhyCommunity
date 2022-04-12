<?php
ob_start();
session_start();
if(isset($_POST['submit'])){
	include __DIR__."/../../modules/Database/Config.php";
	$connect = new mysqli($DataBase['hostname'], $DataBase['username'], $DataBase['password'], $DataBase['name']);
	$FormData = array(
		'area_key' => 'AREA',
		'area_name' => mysqli_real_escape_string($connect, $_POST['name']),
		'area_url' => filter_var($_POST['url'], FILTER_SANITIZE_URL),
		'area_email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
		'area_status' => '1'
	);
	$sql = "INSERT INTO `hosting_area` (`area_key`,`area_name`,`area_url`,`area_email`,`area_status`) VALUES (?, ?, ?, ?, ?)";
	$stmt = $connect->prepare($sql);
	$stmt->bind_param("sssss", $FormData['area_key'], $FormData['area_name'], $FormData['area_url'], $FormData['area_email'], $FormData['area_status']);
	if($stmt->execute()){
		$_SESSION['message'] = '<div class="alert alert-success">Information has been updated successfully.</div>';
		header('location: ../install?step=2');
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger">Something is going all the way round.</div>';
		header('location: ../install?step=1');
	}
}
$stmt->close();
$connect->close();
?>