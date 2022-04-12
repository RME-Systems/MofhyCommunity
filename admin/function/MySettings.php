<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
    'admin_fname' => mysqli_real_escape_string($connect, $_POST['fname']),
    'admin_lname' => mysqli_real_escape_string($connect, $_POST['lname']),
    'admin_key' => mysqli_real_escape_string($connect, $AdminInfo['admin_key'])
	);
	$sql = "UPDATE `hosting_admin` SET `admin_fname`= ?, `admin_lname`= ? WHERE `admin_key`= ?";
	$stmt = $connect->prepare($sql);
	$stmt->bind_param('sss', $FormData['admin_fname'], $FormData['admin_lname'], $FormData['admin_key']);
	$trigger = $stmt->execute();
	$stmt->close();
	if($trigger !== false){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <path d="M9 12l2 2l4 -4"></path></svg>&nbsp;The new profile settings have been updated successfully!</div>';
		header('location: ../profileSettings');
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