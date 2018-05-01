<?php

if(isset($_POST['passwordchange_button']))
{
	?>
	<div class="col-6 col-sm-6" align="center" >
	<form action="aboutme.php" method="POST" enctype="multipart/form-data">
  <div class="form-group row">
    <div class="col-sm-10">
      <input type="Password" class="form-control form-control" id="colFormLabelSm" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <input type="Password" class="form-control" id="colFormLabel" name="Password" placeholder="new Password">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <input type="Password" class="form-control form-control" id="colFormLabelLg" name="pc" placeholder="Confirm_Password">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-8"><button class="btn btn-primary" name="pchandler_button">Confirm Changes</button></div>
  </div>
</form>
</div>
	<?php
}
if(isset($_POST['pchandler_button']))
{  
   $Password=md5($_POST['Password']);
   $cp=md5($_POST['pc']);
   if($Password==$cp)
   {
    $username=$_SESSION['username'];
    $query=mysqli_query($con,"UPDATE users SET Password='$Password'  WHERE username='$username'"); }
    else
    {
      echo "Password mismatch :( ";
    }
}
?>