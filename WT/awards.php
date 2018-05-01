<?php require 'include/header.php'; ?>
<?php include("include/classes/User.php") ?>
<?php include("include/classes/Award.php") ?>
<?php
	if(isset($_POST['post']))
	{
		require 'include/form_handlers/upload_all.php';//for image uploadd
		$award=new Award($con,$userLoggedIn);
		// $title,$body,$year,$teammates,$new_file_name
		$award->submitAward($_POST['title'],$_POST['post_award'],$_POST['year'],$_POST['teammates'],$new_file_name); 
	} 
 ?>


	<form method="POST" action="awards.php" enctype="multipart/form-data">
		<div class="form-group"> <div class="row"> <div class="col-sm-6">
			<input type="text" name="title" required class="form-control" placeholder="Give a title">
			<input type="number" min="1900" max="2099" step="1" placeholder="year" name="year" required class="form-control" />
			<textarea rows="6" name="post_award" class="form-control" required placeholder="Have somthing to share?"></textarea>
			<input type="file" accept=".png, .jpg, .jpeg, .gif" class="form-control-file" name="image">
			<input type="text" name="teammates" class="form-control" placeholder="Mention your teammates?? (Seperate by ',')">
			<button class="btn btn-primary" name="post">Add Award</button>

		</div></div></div>
	</form>	
	<?php
		$global_award=new Award($con,$userLoggedIn);
		$global_award->loadAwards(); 
	 ?>
	


 <?php require 'include/footer.php' ?>