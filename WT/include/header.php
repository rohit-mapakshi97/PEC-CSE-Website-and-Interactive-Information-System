<?php 
	require 'config/config.php';

	if(isset($_SESSION['username']))
	{
		$userLoggedIn=$_SESSION['username'];
		$user_details_query=mysqli_query($con,"SELECT * FROM users WHERE username='$userLoggedIn'");
		$user=mysqli_fetch_array($user_details_query);
	}
	else
	{
		header("Location: register.php");
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Pofessor Name</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<!-- 	<link rel="stylesheet" type="text/css" href="css/landing.css"> -->
	<link rel="stylesheet" type="text/css" href="css/dynamicbg.css">

	
</head>
<body>

<!-- navigation top bar -->
<nav class="navbar navbar-expand-sm bg-light navbar-light sticky-top">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="papers.php">Papers Published</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="awards.php">Awards and Achievements</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="aboutme.php">About me</a>
    </li>
    <?php 
    		if($user['is_professor']=='yes')
    		{
    			?>
    			<li class="nav-item">
      				<a class="nav-link" href="notify.php">Add Notification</a>
    			</li>
    			<?php 
    		}
     ?>
    <li class="nav-item">
    	<a class="nav-link" href="include/logout.php">Logout</a>
    </li>
  </ul>
</nav>
<div class="row">
	<div class="col-sm-3">
		<div class="card text-center colorcard" id="side-nav">
			<div class="card-body">
			<img class="card-img-top" style="width: 100%" src="<?php echo $user['profile_pic']; ?>">
			<?php 
				if($user['is_professor']=='yes')
				{
					$display_name="Dr.".$user['last_name'].".".$user['first_name']; 
				}
				else $display_name=$user['first_name']." ".$user['last_name'];

			 ?>
			<h3 class="card-title"><?php echo $display_name; ?></h3>
			<h2><strong>
						<?php
							if($user['special_status']==5 or $user['special_status']== 4 or $user['special_status']==3 )
							{
								echo $user['status'];
							} 
							else
							{
								echo $user['designation'];
							}
						 ?>
					</strong></h2>
			</div>
					
		

				<div class="card-footer">
					<div class="card-text">
						<p class="card-subtitle"><?php echo $user['email']; ?></p>
					</div>
				</div>
			
			
		</div>
		
		
	</div>
	<!-- <div class="col-sm-1">
		
	</div> -->
	<div class="col-sm-8">
		
