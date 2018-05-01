	<script type="text/javascript">ww
		function deleteNotification(notify_id)
		{
			
			xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200)
    			{
    				document.getElementById(notify_id).innerHTML = this.responseText;
    			}
 		 };
  			xhttp.open("GET","include/handlers/delete.php?notification="+notify_id, true);
  			xhttp.send();

		}
	</script>



<?php 
 	class Notification
 	{
 		private $user_obj;
		private $con;
 		function __construct($con,$user)
 		{
 			$this->con=$con;
			$this->user_obj=new User($con,$user);
 		}
 		

 		public function submitNotification($title,$body,$priority)
 		{
 			$body=htmlspecialchars($body);
			$body=mysqli_real_escape_string($this->con,$body);
			$check_empty=preg_replace('/\s+/','', $body);
			$added_by=$this->user_obj->getUsername();
			if($check_empty!="")
			{
				$date_added=date("Y-m-d H:i:s");
				

				$query=mysqli_query($this->con,"INSERT INTO notification VALUES('','$title','$body','$added_by','$date_added','$priority')");
				$returned_id=mysqli_insert_id($this->con);
			}




 		}

 		public function loadNotifications()
 		{
 			$added_by=$this->user_obj->getUsername();
 			$data= mysqli_query($this->con,"SELECT * FROM notification WHERE added_by='$added_by' ORDER BY date_added DESC");
			$row;
			while($row=mysqli_fetch_array($data))
			{
				$arg="notify_".$row['id'];
				?>
				<div id="<?php echo $arg; ?>">
					<div class="alert <?php echo($row['priority']); ?>"><h4 class="alert-heading"><?php echo $row['title']; ?></h4><?php echo $row['message']; ?></div>
					<button class='btn btn-danger' onclick="deleteNotification('<?php echo $arg; ?>')" style='width:5%' >X</button>
				</div>
				<?php 
			}


 		}

 	}

 ?>




