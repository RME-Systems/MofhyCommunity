<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
    'area_name' => mysqli_real_escape_string($connect, $_POST['name']),
    'area_url' => filter_var($_POST['url'], FILTER_VALIDATE_URL),
    'area_email' => filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),
    'area_status' => $_POST['status'],
	'area_key' => 'AREA'
	);
	$stmt = $connect->prepare("UPDATE `hosting_area` SET `area_name`= ?, `area_url`= ?,`area_email`= ?, `area_status`= ? WHERE `area_key`= ?");
	$stmt->bind_param('sssss', $FormData['area_name'], $FormData['area_url'], $FormData['area_email'], $FormData['area_status'], $FormData['areay_key']);
	$trigger = $stmt->execute();
	if($trigger !== false){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <path d="M9 12l2 2l4 -4"></path></svg>&nbsp;The new clientarea settings have been updated successfully!</div>';
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
$stmt->close();
?>