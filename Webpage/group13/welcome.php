<?php

	/*  
	    How to get client IP at the other web page?
	    1.  add session_start() 
	    2.  _SESSION[clientIP] will be the variable which store client IP
	*/	
	session_start();
	$_SESSION['clientIP'] = _SERVER['REMOTE_ADDR']; 
	
	/*  Iptable setting  */   
	exec("sudo iptables -A FORWARD -s $_SESSION[clientIP] -j DROP");
	exec("sudo iptables -A FORWARD -d $_SESSION[clientIP] -j DROP");
	exec("sudo iptables -t nat -I PREROUTING -s $_SESSION[clientIP] -j ACCEPT");

?>

<html>

<head>
    <title>Final Project</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <header id="main-header">
        <div class="container">
            <h1>Group 13 CNL Final Project</h1>
        </div>
    </header>
    <nav id="navbar">
        <div class="container">
            <ul>
                <li><a href="welcome.php">Home</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="About.php">About</a></li>
            </ul>
        </div>
    </nav>
    <section id="showcase">
        <div class="container">
            <h1>Connect to the WIFI by watching a video! <button>Sponsered Ad</button></h1>
            <h1>OR answring a quick survey! <button href="quesionnairePage.php">Survey</button></h1>
        </div>
    </section>

    <div class="container">
        <section id="main">
            <h1>Welcome</h1>
            <p>ad ad ad ad ad</p>
        </section>
        <aside id="sidebar">
            <p>Login to see your status: button</p>
        </aside>
    </div>

    <footer id="main-footer">
        <p>Copyright &copy; 2022 Group 14</p>
    </footer>
</body>

</html>
