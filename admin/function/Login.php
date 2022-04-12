<?php
require __DIR__.'/Connect.php';
if(isset($_POST['login'])){
	$FormData = array(
		'admin_email' => filter_var($_POST['email'], FILTER_SANITIZE_EMAIL),
		'admin_password' => hash('sha256', $_POST['password']),
		'error_msg' => '<div class="alert alert-danger">These credentials do not match our records.</div>'
	);
	printf($FormData['admin_email']);
	$sql = "SELECT * FROM `hosting_admin` WHERE `admin_email`= ? AND `admin_password`= ? LIMIT 1";
	$stmt = $connect->prepare($sql);
	$stmt->bind_param('ss', $FormData['admin_email'], $FormData['admin_password']);
	if($stmt->execute()){
		$_SESSION['LEASESS'] = base64_encode($FormData['admin_email']);
				$_SESSION['message'] = '';
				header('location: ../');
	}
	else{
		$_SESSION['message'] = $FormData['error_msg'];
		header('location: ../login');
	}
}
else{
	header('location: ../login');
}
$stmt->close();
?>
