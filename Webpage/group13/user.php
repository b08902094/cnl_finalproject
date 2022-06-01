<?php

	session_start();
	$starttime = $_SESSION['starttime'];
	echo "User Page";

	// $timeelapsed = microtime(true)-$starttime;
	// list($hour,$min,$sec) = explode(':', $dbSessionDuration);
	// $dbSessionDurationTime = mktime(0,0,0,$hour,$min,$sec);
	echo "<br />";
	$ipaddr=getenv("REMOTE_ADDR") ;
	// $ipaddr=$_SERVER['REMOTE_ADDR'];
	echo 'User IP Address - '.$ipaddr; 
	echo "<br/>Please note that you will be disconnected automatically and redirected to the logout page after 10 minutes.<br/>";
	echo "You can also logout manually if you do not want to connect anymore.<br/>";
	// $sec = (int)$timeelapsed;
	echo "<br />";

?>
<script type="text/javascript">
	var timerVariable = setInterval(countUpTimer, 1000);
	var totalSeconds = 0;

	function countUpTimer() {
  	++totalSeconds;
  var hour = Math.floor(totalSeconds / 3600);
  var minute = Math.floor((totalSeconds - hour * 3600) / 60);
  	var seconds = totalSeconds;
  	document.getElementById("count_up_timer").innerHTML =  "Time Elapsed: " +minute+ " minutes "+seconds+" seconds";
	}
	setTimeout(function () {
   //Redirect with JavaScript
   window.location.href= 'logout.php';
	}, 600000);

</script>
<html>
	<head>
		<meta http-equiv="refresh' content="6;url="logout.php" >
	</head>
	<body>
	<div id ="count_up_timer">Time Elapsed: 0 seconds</div>
	<br />

	<form action="logout.php">
		<button type="submit">
			logout
		</button>
	</form>
	</body>
<html>
