<?php require 'config/config.php' ?>
<?php require 'include/header.php' ?>
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8">
<?php 

			$str="";
			$data= mysqli_query($con,"SELECT added_by,username,image,body,date_added,first_name,last_name FROM posts,users WHERE is_professor='yes' AND added_by=username ORDER BY date_added DESC");
			$row;
			while($row=mysqli_fetch_array($data))
			{
				$imagePath="../wt/".$row['image'];

					$body=$row['body'];
					$date_added=$row['date_added'];
					$color = array('#e6ee9c','#4fc3f7','#80deea','#ffcc80','#f8bbd0');
					$color_no=mt_rand(0,4);
					?>
					
					<div class='card' style='width:100%; margin-top:15px;margin-bottom:15px; background:<?php echo $color[$color_no] ?> ;'>
								<?php
								if($imagePath!='../wt/')
								{ ?> 
								<img  style='max-width:100%;' class='card-img-top' src='<?php echo $imagePath; ?>'>
								<?php 
								}
								 ?>
								<div class='card-body'>
									<div class='card-text'><?php echo $body; ?>
									</div>
								</div>
								<h6><span class='bg-primary'><?php echo $date_added; ?></span></h6>
								<h6><span class='bg-primary'><?php echo "Dr. ".$row['last_name']." ".$row['first_name']; ?></span></h6>
								
					</div>
					<?php  
			
			}





 ?>
</div>
<div class="col-sm-2"></div>
</div>
<?php require 'include/footer.php' ?>