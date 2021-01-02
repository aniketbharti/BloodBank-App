<!-- It ispart of homepage and This page is used to show top 3 latest blood donation events -->
<div class="row">
  <div class="col-lg-12 mb-12">
    <div class="alert alert-danger" style="background-color: #d6351e !important;color: white">
        <h3>Blood Camps</h3>      
    </div>
  </div>
</div>

 <div class="row">
 <?php
include 'dbconfig.php';
 $query=mysqli_query($dbconfig,"select * from voluntary_event LIMIT 0, 3");
    $total=mysqli_num_rows($query);
    if($total>0){
    while($result=mysqli_fetch_array($query))
    {
      echo"<div class=\"col-lg-4 col-sm-6 portfolio-item\">
          <div class=\"card h-100\">
            <a href=\"#\"><img class=\"card-img-top\" src=\"$result[image_name]\" alt=\"\"></a>
            <div class=\"card-body\">
              <h4 class=\"card-title\">
                <a href=\"#\">$result[headline]</a>
              </h4>
              <p class=\"card-text\">$result[content]</p>
              <p class=\"card-text\">$result[dates]</p>
              <p class=\"card-text\">Organised By:<br> $result[Organised]</p>
            </div>
          </div>
        </div>";
      }
      }    
      else echo"<h4 style=\"margin-left:5%;color: #d6351e\">No Events Available</h4><br><br><br>"; ?>
  </div>
      <!-- /.row -->
