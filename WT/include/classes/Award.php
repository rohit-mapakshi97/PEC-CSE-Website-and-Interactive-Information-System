<script type="text/javascript">
		function deleteAward(award_id)
		{
			
			xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
    			document.getElementById(award_id).innerHTML = this.responseText;
    			}
 		 };
  			xhttp.open("GET","include/handlers/delete.php?award="+award_id, true);
  			xhttp.send();

		}
</script>

<?php
	class Award{
		private $user_obj;
		private $con;
		public function __construct($con,$user)
		{
			$this->con=$con;
			$this->user_obj=new User($con,$user);
		}
		public function submitAward($title,$body,$year,$teammates,$new_file_name)
		{
			$title=htmlspecialchars($title);
			$title=mysqli_real_escape_string($this->con,$title);

			$body=htmlspecialchars($body);
			$body=mysqli_real_escape_string($this->con,$body);
			$check_empty=preg_replace('/\s+/','', $body);

			$teammates=htmlspecialchars($teammates);
			$teammates=mysqli_real_escape_string($this->con,$teammates);

			
			if($check_empty!="")//there are no whitespaces
			{

				//current date and time
				$added_by=$this->user_obj->getUsername();


				$query=mysqli_query($this->con,"INSERT INTO awards VALUES('','$title','$body','$year','$added_by','no','no','$teammates','$new_file_name') ");
				$returned_id=mysqli_insert_id($this->con);
			}

		}

		public function loadAwards()
		{
			$username=$this->user_obj->getUsername();
			$str="";
			$data= mysqli_query($this->con,"SELECT * FROM awards WHERE deleted='no' AND added_by='$username' ORDER BY year DESC");
			$row;
			?>
			<div class="card-columns" style="width:80%;">
			<?php 
			while($row=mysqli_fetch_array($data))
			{
				$imagePath=$row['image'];
				
				$id=$row['id'];
				$arg="award_".$id;

				$title=$row['title'];
				$year=$row['year'];
				$description=$row['description'];
				$teammates=explode(",",$row['teammates']);
				$team="<h4><span class='badge badge-info'>". $this->user_obj->getFirstAndLastName() ." </span></h4>";

				//divide teammates to badges
				for($x=0; $x<count($teammates); $x++ )
				{
					$team =$team . "<h4><span class='badge badge-info'>". $teammates[$x] . " </span></h4>";
				}
				?>
						<div id='<?php echo $arg;?>'>
						<div class='card text-center'>
							<img class='card-img-top' src='<?php echo $imagePath; ?>'>
							<div class='card-title'><h2> <?php echo $title;?></h2> </div>
							<div class='card-title'><h3><?php echo $year; ?></h3></div>
							<div class='card-body'><?php echo $description; ?></div>
							<?php echo $team; ?>
							<button class='btn btn-danger' onclick="deleteAward('<?php echo $arg; ?>')" style='width:10%' >X</button>
						</div></div>
				<?php 
			}
			?>
			</div>
			<?php 

	} 

	public function viewOnly()
		{
			$username=$this->user_obj->getUsername();
			$str="";
			$data= mysqli_query($this->con,"SELECT * FROM awards WHERE deleted='no' AND added_by='$username' ORDER BY year DESC");
			$row;
			?>
			<div class="card-columns">
			<?php 
			while($row=mysqli_fetch_array($data))
			{
				$imagePath=$row['image'];
				
				$title=$row['title'];
				$year=$row['year'];
				$description=$row['description'];
				$teammates=explode(",",$row['teammates']);
				$team="<h4><span class='badge badge-info'>". $this->user_obj->getFirstAndLastName() ." </span></h4>";

				//divide teammates to badges
				for($x=0; $x<count($teammates); $x++ )
				{
					$team =$team . "<h4><span class='badge badge-info'>". $teammates[$x] . " </span></h4>";
				}
				?>
						
						<div class='card text-center'>
							<img class='card-img-top' src='<?php echo $imagePath; ?>'>
							<div class='card-title'><h2> <?php echo $title;?></h2> </div>
							<div class='card-title'><h3><?php echo $year; ?></h3></div>
							<div class='card-body'><?php echo $description; ?></div>
							<?php echo $team; ?>
						</div>
				<?php 
			}
			?>
			</div>
			<?php 

	} 
}


 ?>


	
