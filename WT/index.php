<?php require 'include/header.php';?>
<?php include("include/classes/User.php") ?>
<?php include("include/classes/Post.php") ?>

<?php
	
	if(isset($_POST['post']))
	{
		require 'include/form_handlers/upload_all.php';
		$post=new Post($con,$userLoggedIn);
		// echo $new_file_name;
		$post->submitPost($_POST['post_text'],'none',$new_file_name);	
	}
 ?>
 
	

	<div >
		<div class='alert-primary'>Max Picture Size : 2Mb</div>
		<form action="index.php" method="POST" enctype="multipart/form-data" >
			<div class="form-group">
				<div class="row">

					<div class="col-sm-6">
						<input type="file" accept=".png, .jpg, .jpeg, .gif" class="form-control-file" name="image">
						<textarea rows="6" class="form-control" name="post_text" id="post_text" placeholder="Post Something!"></textarea></div>
				</div>

				<button class="btn btn-success" name="post">Post</button>
			</div>
		</form>

	</div>
	<?php
		$global_post=new Post($con,$userLoggedIn);
		$global_post->loadPosts(); 
	 ?>
	 
<?php require 'include/footer.php' ?>
