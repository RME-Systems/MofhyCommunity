<?php
include __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
		'hashed_password' => hash('sha256', $_POST['new_password']),
		'user_key' => mysqli_real_escape_string($connect, $AdminInfo['admin_key']),
	);
	$sql = "UPDATE `hosting_admin` SET `admin_password`= ? WHERE `admin_key`= ?";
	$stmt = $connect->prepare($sql);
	$stmt->bind_param('ss', $FormData['hashed_password'], $FormData['user_key']);
	$trigger = $stmt->execute();
	if($trigger !== false){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert">The new password has been set.</div>';
		header('location: ../login');
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <path d="M10 10l4 4m0 -4l-4 4"></path></svg>&nbsp;Yikes, something is going the wrong way. Please contact support. '.$stmt->error.'</div>';
		header('location: ../profileSettings');
	}
}
else{
	header('location: ../');
}
?>
