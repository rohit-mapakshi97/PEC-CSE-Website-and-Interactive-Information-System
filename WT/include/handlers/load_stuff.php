<?php require '../../config/config.php' ?>
<?php require '../classes/User.php' ?>
<?php require '../classes/Award.php' ?>
<?php require '../classes/Paper.php' ?>
<?php require '../classes/Post.php' ?>

<?php


	if(isset($_REQUEST['category']))
	{
		$userLoggedIn=$_GET['user'];
		$category=$_REQUEST['category'];
		if($category=='posts')
		{
			$posts=new Post($con,$userLoggedIn);
			$posts->viewOnly();
		}
		elseif ($category=='papers')
		{
			$papers=new Paper($con,$userLoggedIn);
			$papers->viewOnly();
		}	
		elseif ($category=='awards') {
			$awards=new Award($con,$userLoggedIn);
			$awards->viewOnly();
		}
	}

 ?>