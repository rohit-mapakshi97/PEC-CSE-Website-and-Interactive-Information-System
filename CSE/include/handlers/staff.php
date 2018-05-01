<?php require '../../config/config.php' ?>

<?php
	// echo "get request ".$_GET['category'];
	// echo "request object".$_REQUEST['category'];

	if(isset($_REQUEST['category']))
	{
		$staff_type = $_REQUEST['category'];
		$staff_query = mysqli_query($con, "SELECT * FROM users WHERE designation='$staff_type' ORDER BY special_status DESC");
		$row;
		?>
		<div><div class="card-deck">
		<?php 
		while($row = mysqli_fetch_array($staff_query))
		{
			$imagePath="../wt/".$row['profile_pic'];
			$name ="Dr.". $row['last_name'].".".$row['first_name'];
			$email=$row['email'];
			//$stafftype-designation
			$status=$row['status'];
			$specialization=$row['specialization'];
			?>
			<div class="col-sm-3">
			<div class="card text-center" >
				<img src="<?php echo $imagePath; ?>" class="card-img-top">
				<div class="card-header"><h4 class="card-title"><strong><?php echo $name; ?></strong></h4></div>
				<div class="card-body">
					<h4><strong>
						<?php
							if($row['special_status']==5 or $row['special_status']== 4 or $row['special_status']==3 )
							{
								echo $status;
							} 
							else
							{
								echo ucwords($staff_type);
							}
						 ?>
					</strong></h4>
					<?php echo $specialization."<br>";?>
					<?php $link="../wt/profile.php?user=".$row['username']; ?>
					<a href="<?php echo $link ?>" class="btn btn-primary">View Profile</a>
				</div>

				<div class="card-footer">
					<div class="card-text">
						<p class="card-subtitle"><?php echo $email; ?></p>
					</div>
				</div>

				
			</div></div>
			<?php 
		}
		?>
		</div></div>
		<?php 
	}



 ?>