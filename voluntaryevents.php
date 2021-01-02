<!-- This Page Contain All Blood Donation Event Details -->

<?php
    include('dbconfig.php');    //Database Connection
?>

<!--Link Files Starts-->
<?php include 'links.php';?> 
<!--Link Files Starts-->
    

<style type="text/css">
  .linkd{
        color: #d6351e !important;
        }
</style>

<body>

<!--Navbar Starts-->
 <?php include 'navigation.php';?>
<!--Navbar Ends-->

<!-- conatiner starts-->
 <div class="container">
    <h1 class="linkd" style="margin-top: 3%">Voluntary Events</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a class="linkd" href="homepage.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Voluntary Events</li>
      </ol>

  <?php
    $start=0;
    $limit=3;
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $start=($id-1)*$limit;
    }
    else{
        $id=1;}
    
    $index=0;
    $query=mysqli_query($dbconfig,"select * from voluntary_event LIMIT $start, $limit");
    $total=mysqli_num_rows($query);
    if($total>0){                         //Display Events using loops
    while($result=mysqli_fetch_array($query))
    {
      if($index%3==0)
      {
        echo"<div class=\"row\">";
      }
      echo"<div class=\"col-lg-4 col-sm-6 portfolio-item\">
          <div class=\"card h-100\">
            <a href=\"#\"><img class=\"card-img-top\" src=\"$result[image_name]\"  alt=\"\"></a>
            <div class=\"card-body\">
              <h4 class=\"card-title\">
                <a href=\"#\" class=\"linkd\">$result[headline]</a>
              </h4>
              <p class=\"card-text\">$result[content]</p>
              <p class=\"card-text\">Date: $result[dates]</p>              
              <p class=\"card-text\">Organised By:<br> $result[Organised]</p>
            </div>
          </div>
        </div>";

      if($index%3==2)
      {echo"</div>";}
      $index++;
    }

    if($total%3!=0)
      echo"</div>";
  }
  else
    echo"<center><img class=\"img-fluid rounded mb-3 mb-md-0\" src=\"http://www.yamasuta.com/Content/images/NoDataAvailable.png\"  alt=\"Not Available\"></center>"; //Display Img if data is not available
  ?>

<!-- display pagination -->
<div class="row text-center">
  <div class="col-lg-12">
    <br>
      <?php
        $rows=mysqli_num_rows(mysqli_query($dbconfig,"select * from voluntary_event"));
        $total=ceil($rows/$limit);
      ?>
    <ul class="pagination justify-content-center">
      <?php if($id>1)
        {
            echo "<li class=\"page-item\"><a class=\"page-link\" href='?id=".($id-1)."' aria-label=\"Previous\"> <span aria-hidden=\"true\">&raquo;</span>
            <span class=\"sr-only\">Previous</span></a></li>";
        }
      ?>

      <?php
        for($i=1;$i<=$total;$i++)
        {
            if($i==$id) { echo "<li class=\"page-item\"><a class=\"page-link\">".$i."</a></li>"; }
            
            else { echo "<li class=\"page-item\"><a class=\"page-link\" href='?id=".$i."'>".$i."</a></li>";}
        }
        
        if($id!=$total)
        {
            echo "<li class=\"page-item\"><a class=\"page-link\" href='?id=".($id+1)."' aria-label=\"Previous\"> <span aria-hidden=\"true\">&raquo;</span>
            <span class=\"sr-only\">Next</span></a></li>";
        }
      ?>
      </ul>
    </div>
  </div>
</div>
<!-- container end -->

<!--Footer Starts-->
  <?php include 'footer.php';?>
<!--Footer Ends-->

    <!-- Bootstrap core JavaScript -->
    <script src="css/jquery.min.js"></script>
    <script src="css/bootstrap.bundle.min.js"></script>
  </body>
</html>






