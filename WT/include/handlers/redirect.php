<!-- tho be included after the config/config.php -->
<?php
	if(isset($_SESSION['username']))
	{
		$userLoggedIn=$_SESSION['username'];
		echo 'Welcome ' . $userLoggedIn;
	}
	else
	{
		header("Location: register.php");
	}

 ?>