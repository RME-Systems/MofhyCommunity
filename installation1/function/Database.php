<?php
$sql = mysqli_query($connect,'CREATE TABLE IF NOT EXISTS `hosting_account` (
  `account_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `account_username` VARCHAR(22) NOT NULL,
  `account_password` VARCHAR(16) NOT NULL,
  `account_domain` VARCHAR(70) NOT NULL,
  `account_sql` VARCHAR(8) NOT NULL,
  `account_key` VARCHAR(8) NOT NULL,
  `account_status` INT(1) NOT NULL,
  `account_date` VARCHAR(20) NOT NULL,
  `account_for` VARCHAR(8) NOT NULL,
  `account_label` TEXT NOT NULL
)');
$sql = mysqli_query($connect,'CREATE TABLE IF NOT EXISTS `hosting_account_api` (
  `api_key` VARCHAR(7) NOT NULL,
  `api_username` VARCHAR(256) NOT NULL,
  `api_password` VARCHAR(256) NOT NULL,
  `api_cpanel_url` VARCHAR(100) NOT NULL,
  `api_server_ip` VARCHAR(15) NOT NULL,
  `api_ns_1` VARCHAR(30) NOT NULL,
  `api_ns_2` VARCHAR(30) NOT NULL,
  `api_package` VARCHAR(20) NOT NULL
)');
$sql = mysqli_query($connect,'CREATE TABLE IF NOT EXISTS `hosting_area` (
  `area_key` VARCHAR(4) NOT NULL,
  `area_name` VARCHAR(30) NOT NULL,
  `area_url` VARCHAR(70) NOT NULL,
  `area_email` VARCHAR(50) NOT NULL,
  `area_status` INT(2) NOT NULL
)');
$sql = mysqli_query($connect,'CREATE TABLE IF NOT EXISTS `hosting_clients` (
  `hosting_client_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `hosting_client_fname` VARCHAR(30) NOT NULL,
  `hosting_client_lname` VARCHAR(30) NOT NULL,
  `hosting_client_email` VARCHAR(70) NOT NULL,
  `hosting_client_key` VARCHAR(8) NOT NULL,
  `hosting_client_date` VARCHAR(30) NOT NULL,
  `hosting_client_status` INT(1) NOT NULL,
  `hosting_client_password` VARCHAR(64) NOT NULL
)');
$sql = mysqli_query($connect,'CREATE TABLE IF NOT EXISTS `hosting_domain_extensions` (
  `extension_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `extension_value` VARCHAR(70) NOT NULL
)');
$sql = mysqli_query($connect,'CREATE TABLE IF NOT EXISTS `hosting_smtp` (
  `smtp_key` VARCHAR(4) NOT NULL,
  `smtp_host` VARCHAR(50) NOT NULL,
  `smtp_username` VARCHAR(50) NOT NULL,
  `smtp_password` VARCHAR(100) NOT NULL,
  `smtp_port` VARCHAR(4) NOT NULL,
  `smtp_from` VARCHAR(50) NOT NULL
)');
$sql = mysqli_query($connect,'CREATE TABLE IF NOT EXISTS `hosting_ssl` (
  `ssl_id` INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `ssl_key` INT(12) NOT NULL,
  `ssl_for` VARCHAR(8) NOT NULL
)');
$sql = mysqli_query($connect,'CREATE TABLE IF NOT EXISTS `hosting_ssl_api` (
  `api_key` VARCHAR(7) NOT NULL,
  `api_username` VARCHAR(256) NOT NULL,
  `api_password` VARCHAR(256) NOT NULL
)');
$sql = mysqli_query($connect,'CREATE TABLE IF NOT EXISTS `hosting_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(30) NOT NULL,
  `admin_lname` varchar(30) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_key` VARCHAR(8) NOT NULL,
  `admin_password` varchar(70) NOT NULL
)');
$sql = mysqli_query($connect,"INSERT INTO `hosting_account_api`(`api_key`, `api_username`, `api_password`, `api_cpanel_url`, `api_server_ip`, `api_ns_1`, `api_ns_2`, `api_package`) VALUES ('MOFHAPI','MOFH API Username','MOFH API Password','cpanel.example.com','185.27.134.46','ns1.byet.org','ns2.byet.org','freehosting')");
$sql = mysqli_query($connect,"INSERT INTO `hosting_smtp`(`smtp_key`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_port`, `smtp_from`) VALUES ('SMTP','smtp.server.com','example@server.com','example123','587','example@server.com')");
$sql = mysqli_query($connect,"INSERT INTO `hosting_ssl_api`(`api_key`, `api_username`, `api_password`) VALUES ('FREESSL','example@gmail.com','SSL API Password')");
$sql = mysqli_query($connect,"INSERT INTO `hosting_builder_api`(`builder_id`, `builder_username`, `builder_password`) VALUES ('SITEPRO','apikey0','API Password')");
$sql = mysqli_query($connect,"INSERT INTO `hosting_domain_extensions`(`extension_value`) VALUES ('.example.com')");
?>
