<?php require 'config/config.php' ?>
<?php require 'include/header.php' ?>
<div class="container">
	<div class="">
		<?php

			if(isset($_GET['search']))
			{
				$name = $_GET['name'];
				$name=mysqli_real_escape_string($con,$name);
				$data = mysqli_query($con,"SELECT * FROM users WHERE username LIKE '%$name%'");

				$no = mysqli_num_rows($data);
				if($no==0)
				{
					?>
					<div class="alert alert-danger alert-heading text-center"><?php echo "No Results Found"; ?></div>
					<?php 
				}
				else
				{
					?>
					<div class="alert alert-primary alert-heading text-center"><?php echo "Results Found : ".$no; ?></div>
					<?php 
				}

				?>
				<div class="card-group">
				<?php 
				while($row = mysqli_fetch_array($data))
				{
					$imagePath="../wt/".$row['profile_pic'];
					$Stud_name =$row['first_name']." ".$row['last_name'];
					$email=$row['email'];
					$status=$row['status'];
					$specialization=$row['specialization'];
				 	?>
				 	<div class="col-sm-3">
				 	<div class="card text-center" style="margin-bottom:10px; ">
				 	<img src="<?php echo $imagePath;?>" class="card-img-top">
				 	<div class="card-header"><h4 class="card-title"><strong><?php echo $Stud_name; ?></strong></h4></div>	
				 	<div class="card-body">
					<h4><strong><?php echo ucwords($row['designation']); ?></strong></h4>
					<div><?php echo $specialization; ?></div>
					<?php $link="../wt/profile.php?user=".$row['username']; ?>
					<a href="<?php echo $link ?>" class="btn btn-primary">View Profile</a>
				</div>




					</div> <!-- end of col-sm-3 -->

				 	</div>
				 	<?php 
				}
				?>
			</div> <!-- end of card deck -->
				<?php  

			}
		 ?>
	</div>
</div>
 <?php require 'include/footer.php' ?>