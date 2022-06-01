<?php
	/*
	echo "ID=". $_GET["ID"]	.	"</br>";
	echo "password=". $_GET["password"]	.	"</br>";
	*/

	$ID=$_GET["ID"];	
	$Password=$_GET["password"];	
	
	include("DB.php");
	$sql = "SELECT * FROM radusergroup WHERE username='$ID'";
	if(!$result = $DB->query($sql)){
		echo "select error\n";
		exit;
	}

	if($result->num_rows === 0){
		$sql = "INSERT into radcheck(username, attribute, op, value)values('$ID', 'User-Password', ':=', '$Password')";
		$DB->query($sql);
		$sql = "INSERT into radusergroup(username, groupname)values('$ID', 'user')";
		$DB->query($sql);
		echo "Sign up successfully.\n";
	}else{
		echo "Username exist. Please try again.\n";
	}

	
?>
