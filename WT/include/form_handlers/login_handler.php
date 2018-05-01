<?php
	$login_error=[];
	
	if(isset($_POST['login_button']))
	{
		$email=filter_var($_POST["log_email"],FILTER_SANITIZE_EMAIL);//sanitize email
		$_SESSION['log_email']=$email;
		$password=md5($_POST['log_password']);

		$check_database_query= mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND password='$password'");
		$check_login_query=mysqli_num_rows($check_database_query);
		
		if($check_login_query==1) //if there exists a user with correct username and password
		{
			$row=mysqli_fetch_array($check_database_query);
			$username=$row['username'];

	

			$_SESSION['username'] = $username;
			header("Location: index.php");
			exit();
		}
		else
		{
			array_push($login_error,"Email or Password was incorrect<br>");
		}

	}


 ?>