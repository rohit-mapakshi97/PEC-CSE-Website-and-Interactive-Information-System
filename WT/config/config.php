<?php	
	ob_start();//turns on output buffer
	session_start();

	$timezone=date_default_timezone_set("Asia/Kolkata");

	$con= mysqli_connect("localhost","root","","social");//connection variable
	if(!$con)
	{
		die("Connection failed: " . mysqli_connect_error());
	}
?>