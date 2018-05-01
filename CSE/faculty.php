<?php require 'include/header.php' ?>

<!-- carousel -->

<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php
          $dirname = "res/faculty/";
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
          $dirname = "res/faculty/";
          $images =  array_slice(scandir($dirname),2);
          for($i=0;$i<count($images);$i++) 
          { 
              ?>
                  <div class="item <?php  if($i==0){ echo" active";} ?>">
                    <img src="res/faculty/<?php   echo $images[$i];?>"  style="width:1520px; max-height: 680px;">
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
<div class="row container">
  <div class="col-sm-4"></div>
  <!-- <div class="col-sm-4"> -->
   
    <script type="text/javascript">
      function fetchData(type)
      {
        // document.getElementById("staff").innerHTML = type;
        var xhttp= new XMLHttpRequest();
        xhttp.onreadystatechange=function()
        {
          if(this.readyState == 4 && this.status==200)
          {
                document.getElementById("staff").innerHTML = this.responseText;
          }
        };
        xhttp.open("GET","include/handlers/staff.php?category="+type,true);
        xhttp.send();
        
      }

      document.onload = fetchData('professor');


    </script>
    
    <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">
      <button class="btn btn-primary" onclick="fetchData('professor')">Professors</button>
      <button class="btn btn-primary" onclick="fetchData('associate professor')">Associate Professors</button>
      <button class="btn btn-primary" onclick="fetchData('assistant professor')">Assistant Professors</button>
      <button class="btn btn-primary" onclick="fetchData('programmer')">Programmer</button>
    </div>

<!-- </div> -->
  <div class="col-sm-4"></div>
</div>

<!-- end of button group -->
<div id="staff" class="container-fluid">


  
</div>

<?php include 'include/footer.php' ?>