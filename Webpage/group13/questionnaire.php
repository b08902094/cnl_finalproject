<?php
	session_start();	

	$answer1 = $_GET['answer1']; 
	$answer2 = $_GET['answer2']; 
	$answer3 = $_GET['answer3']; 
	$answer4 = $_GET['answer4']; 
	$answer5 = $_GET['answer5']; 

	if($answer1 == $answer4){
		
		/*Allow connection*/	
		exec("sudo iptables -D FORWARD -s $_SESSION[clientIP] -j DROP");
		exec("sudo iptables -D FORWARD -d $_SESSION[clientIP] -j DROP");
		exec("sudo iptables -t nat -D PREROUTING -s $_SESSION[clientIP] -j ACCEPT");

		/*update database*/
		include("DB.php");
		for($i=1; $i<=5; $i++){
			$sql = "SELECT * FROM questions WHERE questionNumber='$i'";
        	
			if(!$result = $DB->query($sql)){
                		echo "select error\n";
                		exit;
        		}
		
			$answer = "answer$i";
			$sql = "UPDATE `questions` SET statistic" . $$answer . "= statistic". $$answer . "+ 1 WHERE questionNumber = $i\n";
			$DB->query($sql);
		}
			
		/*start the timer*/
		$starttime = microtime(true);
		$_SESSION['starttime']=$starttime;
		$redirect_page = 'user.php';
		header('Location: '. $redirect_page);

		die();
		
	}else{

		$redirect_page = 'index.php';
		header('Location: '. $redirect_page);

		die();

	}
		
?>
