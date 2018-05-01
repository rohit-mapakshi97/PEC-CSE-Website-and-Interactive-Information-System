<?php require 'config/config.php' ?>
<?php require 'include/classes/User.php' ?>
<?php
	if(isset($_GET['user']))
	{
		$userLoggedIn=htmlspecialchars($_GET['user']);
		$userLoggedIn= mysqli_real_escape_string($con,$userLoggedIn);
		$user_details_query=mysqli_query($con,"SELECT * FROM users WHERE username='$userLoggedIn'");
		$num_rows=mysqli_num_rows($user_details_query);
		if($num_rows==1)
		{
			// $user=mysqli_fetch_array($user_details_query);
			$user= new User($con,$userLoggedIn);

		}

		else
		{
			header("Location: register.php");
		} 
		
	}
	else
	{
		header("Location: register.php");
	} 

 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title><?php $name = $user->getFirstAndLastName(); echo $name;?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript">
		function loadStuff(type,user)
	      {
	        var xhttp= new XMLHttpRequest();
	        xhttp.onreadystatechange=function()
	        {
	          if(this.readyState == 4 && this.status==200)
	          {
	                document.getElementById("myContent").innerHTML = this.responseText;
	          }
	        };
	        xhttp.open("GET","include/handlers/load_stuff.php?category="+type+"&user="+user,true);
	        xhttp.send();
	        // include/handlers/load_stuff.php?category=papers&user=rohit_mapakshi
	        // 
	      }
		
	</script>
</head>
<body onload="loadStuff('posts','<?php echo $userLoggedIn; ?>')">

<div class="row">
	<div class="col-sm-3">
		<!-- profile bar goes here -->
		<?php
			$row=mysqli_fetch_array($user_details_query);
			$imagePath=$row['profile_pic'];
			if($row['is_professor'])
			{
				$name ="Dr.". $row['last_name'].".".$row['first_name'];	
			}
			else
			{
				$name =$row['first_name']." ".$row['last_name'];
			}
			$email=$row['email'];
			$status=$row['status'];
			$specialization=$row['specialization']; 
		 ?>
			<div class="card text-center" >
				<img src="<?php echo $imagePath; ?>" class="card-img-top">
				<div class="card-header"><h4 class="card-title"><strong><?php echo $name; ?></strong></h4></div>
				<div class="card-body">
					<h5><strong>
						<?php
							if($row['special_status']==5 or $row['special_status']== 4 or $row['special_status']==3 )
							{
								echo $status;
							} 
							else
							{
								echo ucwords($row['designation']);
							}
						 ?>
					</strong></h5>
					<?php echo $specialization."<br>";?>
				</div>

				<div class="card-footer">
					<div class="card-text text-muted">
						<p class="card-subtitle"><?php echo $email; ?></p>
					</div>
				</div>

				
			</div>
			<!-- profile bar ends here -->
		
	</div>
	<div class="col-sm-8">
				<!-- <div class="row">	
					<div class="col-sm-3"></div> -->
		
					<!-- <div class="col-sm-6"> -->
						<div class="btn-group" role="group" aria-label="Basic example">
  							<button  class="btn btn-primary" onclick="loadStuff('posts','<?php echo $userLoggedIn;?>')">News Feed</button>
  							<button  class="btn btn-primary" onclick="loadStuff('papers','<?php echo $userLoggedIn;?>')">Papers Published</button>
  							<button  class="btn btn-primary" onclick="loadStuff('awards','<?php echo $userLoggedIn; ?>')">Awards and Achievements</button>
						</div>
					<!-- </div> -->
		
					<!-- <div class="col-sm-3"></div>
				</div> -->
				<!-- end of button positioning -->

		<div id="myContent" class="container" style="margin-top: 1%;">
			
		</div>

	</div>
	
	
		
</div>

	

</body>
</html>