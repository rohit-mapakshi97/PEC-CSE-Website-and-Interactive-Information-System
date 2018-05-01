<?php require 'include/header.php';?>
<?php require 'include/form_handlers/upload.php' ?>

	<form  action="aboutme.php" method="POST" enctype="multipart/form-data">
		<div class="alert alert-success">Change Profile Pic</div>
		<div class="form-group">
			<div class="col-sm-4"><input type="file" accept=".png, .jpg, .jpeg, .gif" class="form-control-file" name="image"></div>
			<div class="col-sm-4"><button class="btn btn-warning" name="submit">Save Changes</button></div>
		</div>
	</form>

	<form class="form-group" method="POST">
		<div class="alert alert-success">Change Detais</div>
			<div class="col-sm-6"><input type="text" placeholder="Dean | Associate Dean | Class Rep" class="form-control" name="designation"></div>
			<div class="col-sm-6"><input type="text" placeholder="Professor | Assistant Professor | Student" class="form-control" name="position"></div>
			<div class="col-sm-6"><button class="btn btn-warning" name="stats">Save Changes</button></div>
	</form>
	  <div class="alert alert-danger">Change Password</div>
	<form action="aboutme.php" method="POST">
          <div class="form-group">
			<div class="col-sm-8"><button class="btn btn-danger" name="passwordchange_button">Change Password</button></div>
		  </div>
	    </form>
<?php require 'include/form_handlers/passwordchange_handler.php' ?>
<?php 
	if(isset($_POST['stats']))
	{
		$designation=$_POST['designation'];
		$position=strtolower($_POST['position']);
		if($designation!='')
		{
			$stat_update=mysqli_query($con,"UPDATE users SET status='$designation' WHERE username='$userLoggedIn'");
		}
		if($position!='')
		{
			$des_update=mysqli_query($con,"UPDATE users SET designation='$position' WHERE username='$userLoggedIn'");
		}
	}
 ?>


<?php require 'include/footer.php' ?>