<?php require 'include/header.php'; ?>

<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php
          $dirname = "res/facilities/";
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
          $dirname = "res/facilities/";
          $images =  array_slice(scandir($dirname),2);
          for($i=0;$i<count($images);$i++) 
          { 
              ?>
                  <div class="item <?php  if($i==0){ echo" active";} ?>">
                    <img src="res/facilities/<?php   echo $images[$i];?>"  style="width:1520px; max-height: 680px;">
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



<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10 text-center">

<div class="col-sm-3">
  <div class="card" style="width:100% height200px;">
    <img class="card-img-top" src="res/facilities/1.jpg" alt="Card image" style="width:100%">
   <div class="card-body">
      <h4 class="card-title">SRINIVASA RAMANUJAN COMPUTING CENTRE</h4>
<div class="hovertext">
      <p class="card-text">Equipped with state of the art machines including a Super Computer PARAM with transputers. This centre also functions as an Internet browsing Centre with 64Kbps-leased line from STPI..</p>
  </div>
    </div>
  </div>
</div>
 
 <div class="col-sm-3">
  <div class="card" style="width:100% height200px;">
    <img class="card-img-top" src="res/facilities/2.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">DISTRIBUTED COMPUTING LAB</h4>
      <div class="hovertext">
      <p class="card-text">Equipped with 40 system with Internet facility and has VPS-1 with i5 processor(64 bit os) RAM-4GB</p>
    </div>
</div>
  </div>
</div>

<div class="col-sm-3">
  <div class="card" style="width:100% height200px;">
    <img class="card-img-top" src="res/facilities/3.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">RESEARCH LABORATORY</h4>
      <div class="hovertext">
      <p class="card-text">Equipped with 14 system with internet facility with VPS-1,i3 processor(64 bit os) RAM-4GB</p>
    </div>
</div>
  </div>
</div>

<div class="col-sm-3">
  <div class="card" style="width:100% height200px;">
    <img class="card-img-top" src="res/facilities/4.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">HARDWARE AND TROUBLE SHOOTING LAB</h4>
      <div class="hovertext">
      <p class="card-text">Equipped with 24 system with i5-4th Gen processor(64 bit) RAM-4GB</p>
  </div>
    </div>
  </div>
</div>

</div>

<div class="col-sm-1"></div>
</div>

<div class="col-sm-12" style="width: 100%; height:70px;"></div>

<div class="row2">
<div class="col-sm-1"></div>

<div class="col-sm-10 text-center">

<div class="col-sm-3">
  <div class="card" style="width:100% height200px;">
    <img class="card-img-top" src="res/facilities/7.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">APPLICATION LAB</h4>
      <div class="hovertext">
      <p class="card-text">Equipped with 30 system i5-4th Gen processor(64 bit) RAM-2GB</p>
  </div>
  </div>
</div>
</div>
 
 <div class="col-sm-3">
  <div class="card" style="width:100% height200px;">
    <img class="card-img-top" src="res/facilities/6.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">MICROPROCESSOR LABORATORY</h4>
      <div class="hovertext">
      <p class="card-text">Equipped with 25-Microprocessor and 10-Microcontroller</p>
  </div>
    </div>
  </div>
</div>

<div class="col-sm-3">
  <div class="card" style="width:100% height200px;">
    <img class="card-img-top" src="res/facilities/7.jpg" alt="Card image" style="width:100%">
    <div class="card-body">
      <h4 class="card-title">INFORMATION SECURITY LAB</h4>
      <div class="hovertext">
      <p class="card-text">Equipped with 16 system i3 processor(64 bits) RAM-4GB</p>
  </div>
    </div>
  </div>
</div>

<div class="col-sm-3">
  <div class="card" style="width:100% height200px;">
    <img class="card-img-top" src="res/facilities/8.jpg" alt="Card image" style="width:100%">
    <div class="card-body"> 
      <h4 class="card-title">PROBLEM SOLVING LAB</h4>
      <div class="hovertext">
      <p class="card-text">Equipped with 27 system i5-4th GEN processor(64 bits) RAM-4GB</p>
  </div>
    </div>
  </div>
</div>

</div>

<div class="col-sm-1"></div>
</div>


  <div class="col-sm-12" style="width: 100%; height:70px;"></div>


</div>







<?php require 'include/footer.php'; ?>