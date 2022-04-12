<?php
require __DIR__.'/../includes/Connect.php';
$api_key = 'MOFHAPI';
$stmt = $connect->prepare("SELECT * FROM `hosting_account_api` WHERE `api_key`= ?");
$stmt->bind_param('s', $api_key);
$stmt->execute();
$result = $stmt->get_result();
$HostingApi = $result->fetch_assoc();
$stmt->close();
?>
