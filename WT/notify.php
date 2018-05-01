<?php require 'include/header.php'; ?>
<?php include("include/classes/User.php") ?>
<?php include("include/classes/Notification.php") ?>

<?php 
	if(isset($_POST['notify']))
	{
		$title = $_POST['title'];
		$message = $_POST['message'];
		$priority=$_POST['priority'];
		
		$notification=new Notification($con,$userLoggedIn);
		$notification->submitnotification($title,$message,$priority);
	}
 ?>

<div>
		<form action="notify.php" method="POST" enctype="multipart/form-data" class="form-group">
						<input type="text" name="title" class="form-control" placeholder="Enter Title" required>
						<textarea rows="2" class="form-control" name="message" id="post_text" placeholder="Notify!!" required></textarea></div>
						<select name="priority" class="form-control" required>
							<option value="">Select Importance</option>
							<option value="alert-danger">Important</option>
							<option value="alert-primary">Normal</option>
						</select>
				<button class="btn btn-success" name="notify">Post</button>
		</form>
	<?php
		
		$global_notification=new notification($con,$userLoggedIn);
		$global_notification->loadnotifications(); 
	 ?>
</div>
	
 <?php require 'include/footer.php' ?>