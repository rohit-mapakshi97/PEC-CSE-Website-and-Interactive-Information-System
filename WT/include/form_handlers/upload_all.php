<?php
   // echo "file included";
   $new_file_name='';
   if(isset($_FILES['image'])){
      // echo "file selected";
      $file_ext = array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=explode('.',$file_name);
      $extension=end($file_ext);
      $extension=strtolower($extension);
      // echo $file_name;

      if($file_size > 2097152 or $file_size==0){
         // echo "<div class='alert-danger'>File Size greater than 2Mb <hr> Delete post and upload with new size </div>";
      }
      else
      {
         $new_file_name="uploads/".uniqid().".".$extension;
         move_uploaded_file($file_tmp,$new_file_name);
         // echo "file uploaded";
      }
      
   }
?>


  