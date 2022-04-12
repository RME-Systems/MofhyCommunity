<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
    'smtp_host' => mysqli_real_escape_string($connect, $_POST['host']),
    'smtp_username' => mysqli_real_escape_string($connect, $_POST['username']),
    'smtp_password' => mysqli_real_escape_string($connect, $_POST['password']),
    'smtp_port' => mysqli_real_escape_string($connect, $_POST['port']),
    'smtp_from' => filter_var($_POST['from'], FILTER_VALIDATE_EMAIL),
	'smtp_key' => 'SMTP'
	);
	$sql = "UPDATE `hosting_smtp` SET `smtp_host`= ?, `smtp_username`= ?, `smtp_password`= ?, `smtp_port`= ?, `smtp_from`= ? WHERE `smtp_key`= ?";
	$stmt = $connect->prepare($sql);
	$stmt->bind_param('ssssss', $FormData['smtp_host'], $FormData['smtp_username'], $FormData['smtp_password'], $FormData['smtp_port'], $FormData['smtp_from'], $FormData['smtp_key']);
	$trigger = $stmt->execute();
	if($trigger !== false){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <path d="M9 12l2 2l4 -4"></path></svg>&nbsp;The new credentials have been updated successfully!</div>';
		header('location: ../apiSettings');
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <path d="M10 10l4 4m0 -4l-4 4"></path></svg>&nbsp;Yikes, something is going the wrong way. Please contact support.</div>';
		header('location: ../apiSettings');
	}
}
else{
	header('location: ../');
}
$stmt->close();
?>