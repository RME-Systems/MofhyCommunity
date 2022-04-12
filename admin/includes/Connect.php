<?php
ob_start();
if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}
require __DIR__ . "/../../modules/Database/Config.php";
if (!isset($connect))
{
    $connect = mysqli_connect($DataBase['hostname'], $DataBase['username'], $DataBase['password'], $DataBase['name']);
    if (!$connect)
    {
        echo 'Connection not established';
    }
}
// Get User Gravatar Avatar
function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
	$url = 'https://www.gravatar.com/avatar/';
	$url .= md5( strtolower( trim( $email ) ) );
	$url .= "?s=$s&d=$d&r=$r";
	if ( $img ) {
	  $url = '<img src="' . $url . '"';
	  foreach ( $atts as $key => $val )
		$url .= ' ' . $key . '="' . $val . '"';
	  $url .= ' />';
	}
	return $url;
}
// Get MOFHY Version
function get_mofhy_version()
{
    return '2.0.1';
}
?>