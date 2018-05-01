<script type="text/javascript">
		function deletePaper(paper_id)
		{
			
			xhttp = new XMLHttpRequest();
  			xhttp.onreadystatechange = function() {
    			if (this.readyState == 4 && this.status == 200) {
    			document.getElementById(paper_id).innerHTML = this.responseText;
    			}
 		 };
  			xhttp.open("GET","include/handlers/delete.php?paper="+paper_id, true);
  			xhttp.send();

		}
</script>

<?php
	class Paper{
		private $user_obj;
		private $con;
		public function __construct($con,$user)
		{
			$this->con=$con;
			$this->user_obj=new User($con,$user);
		}
		public function submitPaper($title,$publication,$year,$authors,$link)
		{
			$title=htmlspecialchars($title);
			$title=mysqli_real_escape_string($this->con,$title);

			$publication=htmlspecialchars($publication);
			$publication=mysqli_real_escape_string($this->con,$publication);
			$check_empty=preg_replace('/\s+/','', $publication);

			$authors=htmlspecialchars($authors);
			$authors=mysqli_real_escape_string($this->con,$authors);

			$link=htmlspecialchars($link);
			$link=mysqli_real_escape_string($this->con,$link);

			
			if($check_empty!="")//there are no whitespaces
			{

				//current date and time
				$added_by=$this->user_obj->getUsername();


				$query=mysqli_query($this->con,"INSERT INTO papers VALUES('','$title','$publication','$year','$authors','$link','$added_by','no') ");
				$returned_id=mysqli_insert_id($this->con);
			}

		}

		public function loadPapers()
		{
			$username=$this->user_obj->getUsername();
			$data= mysqli_query($this->con,"SELECT * FROM papers WHERE deleted='no' AND added_by='$username' ORDER BY year DESC");
			$row;
			?>
			<div class="card-deck" style="width:80%;">
			<?php 
			while($row=mysqli_fetch_array($data))
			{
				
				$id=$row['id'];
				$arg="paper_".$id;

				$title=$row['title'];
				$year=$row['year'];
				$publication=$row['publication'];
				$authors=explode(",",$row['authors']);
				$team="<h4><span class='badge badge-info'>". $this->user_obj->getFirstAndLastName() ." </span></h4>";

				//divide authors to badges
				for($x=0; $x<count($authors); $x++ )
				{
					$team =$team . "<h4><span class='badge badge-info'>". $authors[$x] . " </span></h4>";
				}
				?>
						<div id='<?php echo $arg;?>'>
						<div class='card text-center'>
							<div class='card-title'><?php echo $title;?></div>
							<div class='card-title'><?php echo $publication; ?></div>
							<div class='card-text'><?php echo $year; ?></div>
							<?php echo $team; ?>
							<a class="btn btn-primary" href='<?php echo $link; ?>'>Download Paper</a>
							<button class='btn btn-danger text-center' onclick="deletePaper('<?php echo $arg; ?>')" style='width:25%' >X</button>
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
			$data= mysqli_query($this->con,"SELECT * FROM papers WHERE deleted='no' AND added_by='$username' ORDER BY year DESC");
			$row;
			?>
			<div class="card-deck">
			<?php 
			while($row=mysqli_fetch_array($data))
			{
				
				

				$title=$row['title'];
				$year=$row['year'];
				$publication=$row['publication'];
				$authors=explode(",",$row['authors']);
				$team="<h4><span class='badge badge-info'>". $this->user_obj->getFirstAndLastName() ." </span></h4>";

				//divide authors to badges
				for($x=0; $x<count($authors); $x++ )
				{
					$team =$team . "<h4><span class='badge badge-info'>". $authors[$x] . " </span></h4>";
				}
				?>
						
						<div class='card text-center'>
							<div class='card-title'><?php echo $title;?></div>
							<div class='card-title'><?php echo $publication; ?></div>
							<div class='card-text'><?php echo $year; ?></div>
							<?php echo $team; ?>

							<a class="btn btn-primary" href='<?php echo $link; ?>'>Download Paper</a>
						</div>
				<?php 
			}
			?>
			</div>
			<?php 

	} 
}


 ?>