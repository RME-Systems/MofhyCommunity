<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_GET['client_id'])){
	$hosting_client_status = 2;
	$hosting_client_key = mysqli_real_escape_string($connect, $_GET['client_id']);
	$sql = "UPDATE `hosting_clients` SET `hosting_client_status`= ? WHERE `hosting_client_key`= ?";
	$stmt = $connect->prepare($sql);
	$stmt->bind_param('is', $hosting_client_status, $hosting_client_key);
	$tigger = $stmt->execute();
	if($tigger !== false){
			$_SESSION['message'] = '<div class="alert alert-success"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <path d="M9 12l2 2l4 -4"></path></svg>&nbsp;The requested client has been suspended successfully!</div>';
			header('location: ../clients');
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <path d="M10 10l4 4m0 -4l-4 4"></path></svg>&nbsp;Yikes, something is going the wrong way. Please contact support.</div>';
			header('location: ../clients');
		}
	}
	else{
		header('location: ../clients');
	}
	$stmt->close();
?>