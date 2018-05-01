<?php require 'config/config.php' ?>
<?php require 'include/header.php' ?>
<div class="container">
<?php
$data= mysqli_query($con,"SELECT * FROM notification ORDER BY date_added DESC");
			$row;
			while($row=mysqli_fetch_array($data))
			{
				?>
					<div class="alert <?php echo($row['priority']); ?> text-center addshadow">
						<h4 class="alert-heading"><?php echo $row['title']; ?></h4>
						<?php echo $row['message']; ?>
						<p><?php echo $row['added_by']; ?></p>
					</div>
				<?php 
			} 
 ?>
</div>

 <?php require 'include/footer.php' ?>