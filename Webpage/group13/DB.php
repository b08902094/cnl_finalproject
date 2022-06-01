<?php	

	$servername = "localhost";
	$username = "root";
	$password = "vma";
	$database = "radius";

	$DB = new mysqli($servername, $username, $password, $database);

	if($DB->connect_errno){
		die("connection error:". $DB->connect_errno);
	}
?>

