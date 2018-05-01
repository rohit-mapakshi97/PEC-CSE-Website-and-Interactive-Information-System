<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_ext = array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=explode('.',$file_name);
      $extension=end($file_ext);
      $extension=strtolower($extension);
      echo $file_name;
      if($file_size > 2097152 or $file_size==0){
         echo "File Size greater than 2Mb";
      }
      else
      {
         $new_file_name="profilepics/".$userLoggedIn.".".$extension;
         $propic_update_query=mysqli_query($con,"UPDATE users SET profile_pic='$new_file_name' WHERE username='$userLoggedIn'");
         move_uploaded_file($file_tmp,$new_file_name);
         echo "Success file upload";
      }
      
   }
?>


