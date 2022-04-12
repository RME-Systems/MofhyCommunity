<?php
ob_start();
session_start();
if(isset($_POST['submit'])){
	$fh = fopen(__DIR__.'/../../modules/Database/Config.php', 'w');
	fwrite($fh, chr(60) . "?php\n");
	fwrite($fh, sprintf('$DataBase = array('."\n"));
	fwrite($fh, sprintf("\t".'"hostname" => '.'"'.$_POST['hostname'].'",'."\n"));
	fwrite($fh, sprintf("\t".'"username" => '.'"'.$_POST['username'].'",'."\n"));
	fwrite($fh, sprintf("\t".'"password" => '.'"'.$_POST['password'].'",'."\n"));
	fwrite($fh, sprintf("\t".'"name" => '.'"'.$_POST['name'].'"'."\n"));
	fwrite($fh, sprintf(');'."\n"));
	fwrite($fh, sprintf('?>'));
	fclose($fh);
	include __DIR__."/../../modules/Database/Config.php";
	$connect = mysqli_connect($DataBase['hostname'], $DataBase['username'], $DataBase['password'], $DataBase['name']);
	if(!$connect){
		$_SESSION['message'] = '<div class="alert alert-danger">Error establishing a database connection.</div>';
		header('location: ../install');
	}
	else{
		include __DIR__."/Database.php";
		if($sql){
			$_SESSION['message'] = '<div class="alert alert-success">Successfully connected to the database.</div>';
			header('location: ../install?step=1');
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger">Something is going all the way round.</div>';
			header('location: ../install');
		}
		
	}
}
?>