<?php
if(isset($_GET['client_id'])){
	$PageInfo = ['title'=>'View client ('.$_GET['client_id'].")",'rel'=>''];
	require_once __DIR__.'/includes/Connect.php';
	require_once __DIR__.'/handler/AreaHandler.php';
	require_once __DIR__.'/includes/Header.php';
	require_once __DIR__.'/handler/SessionHandler.php';
	require_once __DIR__.'/../handler/HostingHandler.php';
	require_once __DIR__.'/../modules/UserInfo/UserInfo.php';
	require_once __DIR__.'/includes/Navbar.php';
	include __DIR__.'/template/ViewClient.php';
	require_once __DIR__.'/includes/Footer.php';
}
else{
	$PageInfo = ['title'=>'Unathorized Access','rel'=>''];
	require_once __DIR__.'/includes/Connect.php';
	require_once __DIR__.'/handler/AreaHandler.php';
	require_once __DIR__.'/includes/Header.php';
	require_once __DIR__.'/handler/SessionHandler.php';
	require_once __DIR__.'/includes/Navbar.php';
	include __DIR__.'/../template/503.php';
	require_once __DIR__.'/includes/Footer.php';
}
?>