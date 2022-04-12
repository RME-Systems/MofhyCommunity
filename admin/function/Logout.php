<?php
ob_start();
session_start();
if(isset($_SESSION['LEASESS'])){
	unset($_SESSION['LEASESS']);
	$_SESSION['message'] = '<div class="alert alert-success" role="alert">Your session has been cleared.</div>';
	header('location: login');
}
else{
	$_SESSION['message'] = '<div class="alert alert-danger" role="alert">This session does not exist</div>';
	header('location: login');
}
?>