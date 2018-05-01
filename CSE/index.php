<?php require 'config/config.php'; ?>
<?php require 'include/header.php' ?>




<!-- carousel -->

<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php
          $dirname = "res/home/";
          $images = glob($dirname."*.JPG");
          for($i=0;$i<count($images);$i++)
          {
              ?>
                  <li class="<?php  if($i==0){ echo" active";} ?>" data-target="#myCarousel" data-slide-to="<?php   echo $i; ?>"></li>
              <?php
          }
       ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" style="margin-bottom:1.5%;">
      <?php
          $dirname = "res/home/";
          $images = array_slice(scandir($dirname),2);
          for($i=0;$i<count($images);$i++)
          {
              ?>
                  <div class="item <?php  if($i==0){ echo" active";} ?>">
                    <img src="res/home/<?php   echo $images[$i];?>"  style="width:1520px; max-height: 680px;">
                  </div>
              <?php
          }

       ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</div>

<!-- end of carousel -->

<div id="container">
<div class="row">
  <div class="col-sm-2">

  </div>
  <div class="col-sm-8 jumbotron text-center addshadow">
    <h2 class="text-center">ABOUT CSE</h2>
    <div>
      <?php require 'res/aboutcse.txt' ?>
    </div>
  </div>
  <div class="col-sm-2">

  </div>

</div>
<br /><br />
<div class="container card-group text-center">
 <?php 

      $str="";
      $data= mysqli_query($con,"SELECT * FROM posts WHERE added_by='admin_admin' ORDER BY date_added DESC");
      $row;
      while($row=mysqli_fetch_array($data))
      {
        $imagePath="../wt/".$row['image'];

          $body=$row['body'];
          $date_added=$row['date_added'];
          $color = array('#e6ee9c','#4fc3f7','#80deea','#ffcc80','#f8bbd0');
          $color_no=mt_rand(0,4);
          ?>
          
          <div class="col-sm-4"><div class='card' style='width:100%; margin-top:15px;margin-bottom:15px; background:<?php echo $color[$color_no] ?> ;'>
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
                
          </div></div>
          <?php  
      
      }





 ?>

</div>

</div>
