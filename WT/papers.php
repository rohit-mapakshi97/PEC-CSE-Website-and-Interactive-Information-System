<?php require 'include/header.php'; ?>
<?php include("include/classes/User.php") ?>
<?php include("include/classes/Paper.php") ?>

<?php
	if(isset($_POST['post']))
	{
		
		$paper=new Paper($con,$userLoggedIn);
		
		$paper->submitPaper($_POST['title'],$_POST['publication'],$_POST['year'],$_POST['authors'],$_POST['link']); 
	} 
 ?>
<!-- $title,$publication,$year,$authors,$link -->

		<form method="post" action="papers.php">
			<div class="form-group col-sm-8">
				<input type="text" name="title" class="form-control" placeholder="Paper Title" required>
				<input type="text" name="publication" class="form-control" placeholder="Name of The Publication" required>
				<input type="number" min="1900" max="2099" step="1" placeholder="Year" name="year" class="form-control" required />
				<input type="text" name="authors" class="form-control" placeholder="List of Authors (,) seperated">
				<input type="text" name="link" class="form-control" placeholder="Download Link" required>
				<button class="btn btn-warning" name="post">Add Paper</button>
			</div>
		</form>
<?php
		$global_paper=new Paper($con,$userLoggedIn);
		$global_paper->loadPapers(); 
?>