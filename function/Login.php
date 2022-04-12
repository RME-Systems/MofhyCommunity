<?php
require __DIR__.'/Connect.php';
if(isset($_POST['login'])){
	$FormData = array(
		'email' => filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),
		'password' => hash('sha256', mysqli_real_escape_string($connect, $_POST['password'])),
		'error_msg' => '<div class="alert alert-danger">These credentials do not match our records.</div>'
	);
	$sql = "SELECT * FROM `hosting_clients` WHERE `hosting_client_email`= ? AND `hosting_client_password`= ? LIMIT 1";
	$stmt = $connect->prepare($sql);
	$stmt->bind_param("ss", $FormData['email'], $FormData['password']);
	$stmt->execute();
	$stmt_result = $stmt->get_result();
	$stmt->close();
	if(!$stmt_result->num_rows>0){
		$_SESSION['message'] = $FormData['error_msg'];
		header('location: ../login');
	}
	else{
		setcookie('LEFSESS', bin2hex($FormData['email']), time()+3600, '/');
		header('location: ../');
	}
}
else{
	header('location: ../login');
}
?>
