<?php
		// varaibles to prevent errors
	$fname='';
	$lname='';
	$em='';
	$em2='';
	$password='';
	$password2='';
	$date='';
	$error_array=[];

	if(isset($_POST['register_button']))
	{
		// registration form values

		// first name
		$fname= strip_tags($_POST['reg_fname']); //remove html tags
		$fname=str_replace(' ','',$fname);//remove spaces
		$fname=ucfirst(strtolower($fname));
		$_SESSION['reg_fname']=$fname;

		//lastname
		$lname= strip_tags($_POST['reg_lname']); //remove html tags
		$lname=str_replace(' ','',$lname);//remove spaces
		$lname=ucfirst(strtolower($lname));
		$_SESSION['reg_lname']=$lname;

		//email1
		$em= strip_tags($_POST['reg_email1']); //remove html tags
		$em=str_replace(' ','',$em);//remove spaces
		$em=strtolower($em);
		$_SESSION['reg_email1']=$em;

		//email2
		$em2= strip_tags($_POST['reg_email2']); //remove html tags
		$em2=str_replace(' ','',$em2);//remove spaces
		$em2=strtolower($em2);
		$_SESSION['reg_email2']=$em2;

		//password
		$password= strip_tags($_POST['reg_password1']); //remove html tags
		$password2= strip_tags($_POST['reg_password2']); //remove html tags

		$date =date('Y-m-d');

		if($em == $em2) {
			if(filter_var($em,FILTER_VALIDATE_EMAIL))
			{
				$em=filter_var($em,FILTER_VALIDATE_EMAIL);

				// check if email already exists
				$e_check= mysqli_query($con,"SELECT email FROM users WHERE email='$em'");
				// count the number of rows returned
				$num_rows=mysqli_num_rows($e_check);

				if($num_rows>0)
				{
					array_push($error_array,"Email already in use <br>") ;
				}

			}
			else
			{
				array_push($error_array,"Invalid Email format<br>");;
			}


		}
		else
		{
			array_push($error_array,"Emails dont match<br>");
		}
		if(strlen($fname)>25 || strlen($fname)<2)
		{
			array_push($error_array,"Your First name must be betwwen 2 and 25 charecters<br>");
		}

		if($password!=$password2)
		{
			array_push($error_array,"Your Passwords doesnt match<br>");
		}
		else
		{
			if(preg_match('/[^A-Za-z0-9]/',$password ))
				array_push($error_array,"Your Password can contain English charecters or numbers<br>");
		}

		if(strlen($password)>30 || strlen($password)<5)
		{
			array_push($error_array, "Your Password must be between 5 and 30 charecters<br>");
		}

		// login if there are no errors
		if(empty($error_array))
		{
			$password=md5($password); //encryption
			//username
			$username=strtolower($fname."_".$lname);
			$check_username_query=mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
			$i=0;
			while (mysqli_num_rows($check_username_query)!=0) {
				$i++;
				$username=$username . "_" . $i;
				$check_username_query=mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
				
			}

			$profile_pic="assets/defaults/default_pro_pic.png";
			$query=mysqli_query($con,"INSERT INTO users VALUES('$fname','$lname','$username','$em','$password','$date','$profile_pic','no','no','','','','')");
			array_push($error_array,"<span style='color:#14c800'>Great! you are all set!! continue to login!</span>");
			
			// remove all session variables
			session_unset();

			// destroy the session
			session_destroy(); 



		}
	}

?>