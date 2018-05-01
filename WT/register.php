<?php
	require 'config/config.php';
	require 'include/form_handlers/register_handler.php';
	require 'include/form_handlers/login_handler.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

	<nav class="navbar bg-dark">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand btn btn-primary" href="../cse/index.php">CSE @ PEC</a>
    </div>
   	
   	<form method="POST" action="register.php" class="form-inline">
			<div class="=form-group">
				<input type="email" placeholder="Email" class="form-control" name="log_email" required>
				<input type="password" placeholder="Password" class="form-control" name="log_password" required>
				<button class="btn btn-success" name="login_button" >Login</button>
				<?php
				$array_length=count($login_error);
				if($array_length!=0)
				{
					echo "<p>incorrect password</p>";
				} 

				 ?>
			</div>
			
		</form>

  </div>
</nav>



		<form  action="register.php" method="POST">
		<div class="form-group">
			<div class="col-sm-4"><input type="text" placeholder="First Name" value="<?php if(isset($_SESSION['reg_fname'])){echo $_SESSION['reg_fname'];} ?>" class="form-control" name="reg_fname" required></div>
		
			<div class="col-sm-4"><input type="text" placeholder="Last Name" value="<?php if(isset($_SESSION['reg_lname'])){echo $_SESSION['reg_lname'];} ?>" class="form-control" name="reg_lname" required></div>


			<div class="col-sm-4"><input type="email" placeholder="Email" value="<?php if(isset($_SESSION['reg_email1'])){echo $_SESSION['reg_email1'];} ?>" class="form-control" name="reg_email1" required></div>

			<div class="col-sm-4"><input type="email" placeholder="Confirm Email" value="<?php if(isset($_SESSION['reg_email2'])){echo $_SESSION['reg_email2'];} ?>" class="form-control" name="reg_email2" required></div>

			<div class="col-sm-4"><input type="password" placeholder="Enter Your Password" class="form-control" name="reg_password1" required></div>

			<div class="col-sm-4"><input type="password" placeholder="Confirm Password" class="form-control" name="reg_password2" required></div>

			<div class="col-sm-4"><button class="btn btn-success" name="register_button" >Register</button></div>
			<?php
				$array_length=count($error_array);
				if($array_length!=0)
				{
					for($x = 0; $x < $array_length; $x++) 
					{
    						echo $error_array[$x];
					}
				} 
			 ?>
			
		</div>
	</form>

</body>
</html>