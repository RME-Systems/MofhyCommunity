<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_GET['extension'])){
	$FormData = array(
		'extension_value' => mysqli_real_escape_string($connect, $_GET['extension']),
	);
	$sql = "SELECT * FROM `hosting_domain_extensions` WHERE `extension_value`= ?";
	$stmt = $connect->prepare($sql);
	$stmt->bind_param('s', $FormData['extension_value']);
	$stmt->execute();
	$stmt_result = $stmt->get_result();
	if(!$stmt_result->num_rows>0){
		$_SESSION['message'] = '<div class="alert alert-danger"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <path d="M10 10l4 4m0 -4l-4 4"></path></svg>&nbsp;Oops! No such subdomain extension exists.</div>';
		header('location: ../extensions');
		$stmt->close();
		exit;
	}
	else{
		$sql = "DELETE FROM `hosting_domain_extensions` WHERE `extension_value`= ?";
		$stmt1 = $connect->prepare($sql);
		$stmt1->bind_param('s', $FormData['extension_value']);
		$trigger = $stmt1->execute();
		$stmt1->close();
		if($trigger !== false){
			$_SESSION['message'] = '<div class="alert alert-success" role="alert"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <path d="M9 12l2 2l4 -4"></path></svg>&nbsp;The subdomain has been deleted successfully!</div>';
			header('location: ../extensions');
			exit;
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <path d="M10 10l4 4m0 -4l-4 4"></path></svg>&nbsp;Yikes, something is going the wrong way. Please contact support. '.$stmt->error.'</div>';
			header('location: ../extensions');
			exit;
		}
	}
}
else{
	header('location: ../');
}
?>