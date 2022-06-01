<html>
<script>
	function videoEnded(){
		location.href="user.php";
	}
</script>
<body>
	<center>
		<?php
		echo "You will be redirected to connect your Wi-Fi once the video ends.<br/>"
		?>
		<script type="text/javascript">window.alert(vidlength);</script>
	</center>
<!-- <div class="center"> -->
	<center>
	<video
		id = "myvideo"
		class="center"
		autoplay
		onended="videoEnded()"
		width="640"
		height="640"
	>
		<source src="groupad.mp4" type="video/mp4">
	</video>

</center>

</body>
</html>
