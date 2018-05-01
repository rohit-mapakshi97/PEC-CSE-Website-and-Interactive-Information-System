<?php
	require '../../config/config.php'; 
	if(isset($_REQUEST['post']))
	{
		$post_id=$_REQUEST['post'];
		$arr=explode("_", $post_id);
		$id=$arr[1];
		$deletequery=mysqli_query($con,"DELETE FROM posts WHERE id='$id'");
		echo "";

	}
	
	if(isset($_REQUEST['award']))
	{
		$award_id=$_REQUEST['award'];
		$arr=explode("_", $award_id);
		$id=$arr[1];
		$deletequery=mysqli_query($con,"DELETE FROM awards WHERE id='$id'");
		echo "";

	}

	if(isset($_REQUEST['paper']))
	{
		$paper_id=$_REQUEST['paper'];
		$arr=explode("_", $paper_id);
		$id=$arr[1];
		$deletequery=mysqli_query($con,"DELETE FROM papers WHERE id='$id'");
		echo "";

	}
	if(isset($_REQUEST['notification']))
	{
		$notify_id=$_REQUEST['notification'];
		$arr=explode("_", $notify_id);
		$id=$arr[1];
		$deletequery=mysqli_query($con,"DELETE FROM notification WHERE id='$id'");
		echo "";

	}

 ?>