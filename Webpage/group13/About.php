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
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>

    <body>
        <header id="main-header">
            <div class="container">
                <h1>About Us!</h1>
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
                <h1>
                    Our mission is to provide an simple but beneficial ad-based wifi service to a small vendors.
                </h1>
            </div>
        </section>

        <div class="container">
            <section id="main">
                <h1>Group 13</h1>
                <p>
                    <ui>
                        <li>B07902101 楊傑森</li>
                        <li>B07902065 楊雨樓</li>
                        <li>B08902094 高橋茉莉香</li>
                        <li>B08902137 楊淳竣</li>
                        <li>B08902084 魏美芳</li>
                        <li>B06902084 方家豪</li>
                    </ui>
                </p>
            </section>
            <aside id="sidebar">
                <p>Source code: <button href="">Github</button></p>
                <p>Report: <button>hackMD</button></p>
                <p>demo: <button>Youtube</button></p>
            </aside>
        </div>

        <footer id="main-footer">
            <p>Copyright &copy; 2022 Group 14</p>
        </footer>
    </body>

    </html>