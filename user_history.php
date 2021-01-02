<!-- This Page Is used to dispay status of request n donated blood to user
 -->

<?php 
  include 'links.php'; //Include Links
  include('dbconfig.php'); //Include Database
  session_start();
  error_reporting(E_ERROR | E_PARSE);
  
  if(!isset($_SESSION['user_name'])) //checking login or not
    {
    header('Location: homepage.php' );
    }
    $user=$_SESSION['user_name'];

?>
<style type="text/css">
  .linkd{
        color: #d6351e !important;}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<!-- CSS For Table -->
<link rel="stylesheet" href="css/abc.css"> 
 <!-- Ends -->
  <?php include 'navigation.php';   //Navigation Include?>

    <div class="container">
      <h1 class="mt-4 mb-3" style="color: #d6351e !important;">User History</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="homepage.php" style="color: #d6351e !important;">Home</a>
        </li>
        <li class="breadcrumb-item active">User History</li>
      </ol>
      <!-- side navigation -->
      <div class="row">
        <div class="col-lg-3 mb-4">
          <div class="list-group">
            <a href="user_history.php?select=1" class="list-group-item" style="color: #d6351e !important;">Blood Request</a>
            <a href="user_history.php?select=2" class="list-group-item" style="color: #d6351e !important;">Blood Donate</a>
          </div>
        </div>
        <!-- side ends -->

    <?php
        
  if(isset($_GET['select'])) //Select Variable ise used to toggle btw blood donation and recieve section id is used for pagination
  {
    $select=$_GET['select'];
        
    if($select==1) // showing request blood section
    {
      $start=0;
      $limit=3;
      if(isset($_GET['id']))
      {
        $id=$_GET['id'];
        $start=($id-1)*$limit;
      }
      else{
        $id=1;}
        
      $query=mysqli_query($dbconfig,"select r.id,r.hospital_name,r.bloodgroup,r.transfusion_date,r.status from request_blood r where r.email='$user' LIMIT $start, $limit"); //Query For request blood
      $total=mysqli_num_rows($query);
      if($total>0)
      { //Displaying Table
        echo"<div class=\"col-lg-9 mb-4\">
                <div class=\"row\">
                  <div class=\"col-lg-12 mb-4\"><h3 style=\"color: #d6351e !important;\">Blood Requests</h3>
                    <table class=\"rwd-table\">
                      <tr style=\"background-color: #d6351e !important;\">
                        <th>Blood Group</th>
                        <th>Requested Hospital</th>
                        <th>Tranfusion Date</th>
                        <th>Status</th>
                      </tr>";
        
        while($result=mysqli_fetch_array($query))
        { 
          if($result['status']=='')
            $result['status']='Not Seen Yet';
          
          echo"<tr>";
          echo"<td data-th=\"Blood Group\">$result[bloodgroup]</td>
                <td data-th=\"Hospital\">$result[hospital_name]</td>
                <td data-th=\"Transfusion Date\">$result[transfusion_date]</td>
                <td data-th=\"Status\">$result[status]</td></tr>";
        }
            //Table Ends
        echo"</table></div></div>
              <div class=\"row text-center\">
                <div class=\"col-lg-12\">
                  <br><br><br>";
            //Displayng Pagination

        $rows=mysqli_num_rows(mysqli_query($dbconfig,"select r.id,r.hospital_name,r.bloodgroup,r.transfusion_date,r.status from request_blood r where r.email='$user'"));
        $total=ceil($rows/$limit);
      
        echo"<ul class=\"pagination justify-content-center\">";
                
        if($id>1)
          {
            echo "<li class=\"page-item\"><a class=\"page-link\" href='?select=".$select."&&id=".($id-1)."' aria-label=\"Previous\"> <span aria-hidden=\"true\">&raquo;</span>
                <span class=\"sr-only\">Previous</span></a></li>";
          }
      
        for($i=1;$i<=$total;$i++)
          {
            if($i==$id) { echo "<li class=\"page-item\"><a class=\"page-link\">".$i."</a></li>"; }
            
            else { echo "<li class=\"page-item\"><a class=\"page-link\" href='?select=".$select."&&id=".$i."'>".$i."</a></li>";}
          }
        
        if($id!=$total)
          {
            echo "<li class=\"page-item\"><a class=\"page-link\" href='?select=".$select."&&id=".($id+1)."' aria-label=\"Previous\"> <span aria-hidden=\"true\">&raquo;</span>
            <span class=\"sr-only\">Next</span></a></li>";
          }
        
        echo"</ul>
        </div>
    </div>
  </div>";
      }
      else
        echo"<center><img class=\"img-fluid rounded mb-3 mb-md-0\" src=\"http://www.yamasuta.com/Content/images/NoDataAvailable.png\"  alt=\"Not Available\"></center>"; //Display Img if data is not available
    } //Displaying Request Blood Ends

    else if($select==2) //Displaying Donate Blood Starts
    { 

      $start=0;
      $limit=3;
      if(isset($_GET['id']))
      {
        $id=$_GET['id'];
        $start=($id-1)*$limit;
      }
      else{
          $id=1;}
      $query=mysqli_query($dbconfig,"select d.id,d.approved_hospital,d.dates,d.bloodgroup,d.status from blood_donor d where d.email='$user' LIMIT $start, $limit");
      $total=mysqli_num_rows($query);//Query For Donate Blood Requests
      if($total>0)
      { //Display Table
        echo"<div class=\"col-lg-9 mb-4\">
                <div class=\"row\">
                  <div class=\"col-lg-12 mb-4\"><h3 style=\"color: #d6351e !important;\">Blood Donations</h3>
                    <table class=\"rwd-table\">
                       <tr style=\"background-color: #d6351e !important;\">
                          <th>Blood Group</th>
                          <th>Selected Date</th>
                          <th>Accepted Hospital</th>
                          <th>Status</th>
                        </tr>";
        
        while($result=mysqli_fetch_array($query))
          { 
            if($result['status']==''||$result['approved_hospital']==''){$result['status']='Not Seen Yet';$result['approved_hospital']='Not Seen Yet';}
              echo"<tr>";
              echo"<td data-th=\"Blood Group\">$result[bloodgroup]</td>
                    <td data-th=\"Hospital\">$result[dates]</td>
                    <td data-th=\"Transfusion Date\">$result[approved_hospital]</td>
                    <td data-th=\"Status\">$result[status]</td></tr>";
          } //Display Table Ends

              echo"</table></div></div>
                    <div class=\"row text-center\">
                <div class=\"col-lg-12\">
                  <br><br><br>";
            //Pagination Starts
        
        $rows=mysqli_num_rows(mysqli_query($dbconfig,"select d.id,d.approved_hospital,d.dates,d.bloodgroup,d.status from blood_donor d where d.email='$user'"));
        $total=ceil($rows/$limit);
      
        echo"<ul class=\"pagination justify-content-center\">";
                
        if($id>1)
          {
            echo "<li class=\"page-item\"><a class=\"page-link\" href='?select=".$select."&&id=".($id-1)."' aria-label=\"Previous\"> <span aria-hidden=\"true\">&raquo;</span>
                <span class=\"sr-only\">Previous</span></a></li>";
          }
      
        for($i=1;$i<=$total;$i++)
          {
            if($i==$id) { echo "<li class=\"page-item\"><a class=\"page-link\">".$i."</a></li>"; }
            
            else { echo "<li class=\"page-item\"><a class=\"page-link\" href='?select=".$select."&&id=".$i."'>".$i."</a></li>";}
          }
        
        if($id!=$total)
          {
            echo "<li class=\"page-item\"><a class=\"page-link\" href='?select=".$select."&&id=".($id+1)."' aria-label=\"Previous\"> <span aria-hidden=\"true\">&raquo;</span>
            <span class=\"sr-only\">Next</span></a></li>";
          }
        
        echo"</ul>
        </div>
    </div>
  </div></div>";
  //Pagination Ends
      }
      else
        echo"<center><img class=\"img-fluid rounded mb-3 mb-md-0\" src=\"http://www.yamasuta.com/Content/images/NoDataAvailable.png\"  alt=\"Not Available\"></center>"; //Display Img if data is not available
    }
    else{
        echo"<script type=\"text/javascript\">
              window.open(\"user_history.php?select=1\",\"_self\")
              </script>"; //Redirect to same with page with select=1 if url contain select >2
      }
    }
    else{
          echo"<script type=\"text/javascript\">
          window.open(\"user_history.php?select=1\",\"_self\")
          </script>";//Redirect to same with page with select=1 if url does not contain select
        }

?>
  </div>
</div>

  <?php include 'footer.php';?>

    <!-- Bootstrap core JavaScript -->
    <script src="css/jquery.min.js"></script>
    <script src="css/bootstrap.bundle.min.js"></script>

  </body>

</html>
