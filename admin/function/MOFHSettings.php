<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
    'api_username' => mysqli_real_escape_string($connect, $_POST['username']),
    'api_password' => mysqli_real_escape_string($connect, $_POST['password']),
    'api_cpanel_url' => mysqli_real_escape_string($connect, $_POST['url']),
    'api_server_ip' => mysqli_real_escape_string($connect, $_POST['ip']),
    'api_ns_1' => mysqli_real_escape_string($connect, $_POST['ns1']),
    'api_ns_2' => mysqli_real_escape_string($connect, $_POST['ns2']),
    'api_package' => mysqli_real_escape_string($connect, $_POST['pkg']),
	'api_key' => 'MOFHAPI'
	);
	$sql = "UPDATE `hosting_account_api` SET `api_username`= ?, `api_password`= ?, `api_cpanel_url`= ?, `api_server_ip`= ?, `api_ns_1`= ?, `api_ns_2`= ?, `api_package`= ? WHERE `api_key`= ?";
	$stmt = $connect->prepare($sql);
	$stmt->bind_param('ssssssss', $FormData['api_username'], $FormData['api_password'], $FormData['api_cpanel_url'], $FormData['api_server_ip'], $FormData['api_ns_1'], $FormData['api_ns_2'], $FormData['api_package'], $FormData['api_key']);
	$trigger = $stmt->execute();
	if($trigger !== false){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <path d="M9 12l2 2l4 -4"></path></svg>&nbsp;The new credentials have been updated successfully!</div>';
		header('location: ../apiSettings');
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-x alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <path d="M10 10l4 4m0 -4l-4 4"></path></svg>&nbsp;Yikes, something is going the wrong way. Please contact support. '.$stmt->error.'</div>';
		header('location: ../apiSettings');
	}
}
else{
	header('location: ../');
}
$stmt->close();
?>