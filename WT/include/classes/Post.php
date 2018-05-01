	<script type="text/javascript">
		function deletePost(post_id)
		{
			
			xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200)
    			{
    				document.getElementById(post_id).innerHTML = this.responseText;
    			}
 		 };
  			xhttp.open("GET","include/handlers/delete.php?post="+post_id, true);
  			xhttp.send();

		}
	</script>

	<!-- <div id=testcase></div> -->
<?php
	class Post {
		private $user_obj;
		private $con;
		public function __construct($con,$user)
		{
			$this->con=$con;
			$this->user_obj=new User($con,$user);
		}

		public function submitPost($body,$user_to,$new_file_name){
			$body=htmlspecialchars($body);
			$body=mysqli_real_escape_string($this->con,$body);
			$check_empty=preg_replace('/\s+/','', $body);
			if($check_empty!="")
			{

				//current date and time
				$date_added=date("Y-m-d H:i:s");
				$added_by=$this->user_obj->getUsername();

				//If user is on own profile, user_to=none
				// if($user_to==$added_by)
				// {
				// 	$user_to='none';
				// }

				$query=mysqli_query($this->con,"INSERT INTO posts VALUES('','$body','$added_by','$date_added','no','no','0','$new_file_name') ");
				$returned_id=mysqli_insert_id($this->con);

		
			}
		} 

		public function loadPosts()
		{
			$username=$this->user_obj->getUsername();
			$str="";
			$data= mysqli_query($this->con,"SELECT * FROM posts WHERE deleted='no' AND added_by='$username' ORDER BY date_added DESC");
			$row;
			while($row=mysqli_fetch_array($data))
			{
				$imagePath=$row['image'];

					$id=$row['id'];
					$new_str="id='post_".$id."'";
					$arg="post_".$id;
					// echo $arg;
					// "."post_".$id."
					$body=$row['body'];
					$date_added=$row['date_added'];
					// $delete_button="<button class='btn btn-danger' onclick='"."deletePost(".$arg.")' style='width:5%' >X</button>";
					// $str=
					?>
					<div id='<?php echo $arg;?>'>
					<div class='card bg-light' style='width:70%; margin-top:15px;margin-bottom:15px;'>
								<img  style='max-width:100%;' class='card-img-top' src='<?php echo $imagePath; ?>'>
								<div class='card-body'>
									<div class='card-text'><?php echo $body; ?>
									</div>
								</div>
								<h6><span class='badge badge-dark'><?php echo $date_added; ?></span></h6>
								<button class='btn btn-danger' onclick="deletePost('<?php echo $arg; ?>')" style='width:5%' >X</button>
					</div></div>
					<?php  
 				// echo $str;

			}
		}

		public function viewOnly()
		{
			$username=$this->user_obj->getUsername();
			$str="";
			$data= mysqli_query($this->con,"SELECT * FROM posts WHERE deleted='no' AND added_by='$username' ORDER BY date_added DESC");
			$row;
			while($row=mysqli_fetch_array($data))
			{
				$imagePath=$row['image'];

					$body=$row['body'];
					$date_added=$row['date_added'];
					// $delete_button="<button class='btn btn-danger' onclick='"."deletePost(".$arg.")' style='width:5%' >X</button>";
					// $str=
					?>
					
					<div class='card bg-light' style='width:70%; margin-top:15px;margin-bottom:15px;'>
								<img  style='max-width:100%;' class='card-img-top' src='<?php echo $imagePath; ?>'>
								<div class='card-body'>
									<div class='card-text'><?php echo $body; ?>
									</div>
								</div>
								<h6><span class='badge badge-dark'><?php echo $date_added; ?></span></h6>
								
					</div>
					<?php  
 				// echo $str;

			}
		}

	}
 ?>

