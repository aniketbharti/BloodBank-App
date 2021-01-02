<!-- This page list of hospital that contain blood sample that you required -->

<?php
    session_start();
    include('dbconfig.php');
    error_reporting(E_ERROR | E_PARSE);
    if(isset($_POST['search'])) //Storing search terms in session so that we can navigated in different page number in same page
    {
      $_SESSION['bloodgrp']=$_POST['bloodgrp'];
      $_SESSION['cities']=$_POST['cities'];
    }
    if(!isset($_SESSION['bloodgrp']))
    {
    header('Location: homepage.php' );
    }
?>

<!--Link Files Starts-->
<?php include 'links.php';?> 
<!--Link Files Starts-->
    

<style type="text/css">
  .linkd{
        color: #d6351e !important;
        }
</style>

<script type="text/javascript">
 // Checking Wheather A User Has Logged In
  function collect_values4()
    {
      if(sessionStorage.getItem("userlogin_flag")=="true")
        { sessionStorage.setItem("confirm_flag",true);return true;}      
    else
      {
        alert("Please Login First");
        return false;
      }
    }
</script>

<body>
<!--Navbar Starts-->
 <?php include 'navigation.php';?>
<!--Navbar Ends-->

 <div class="container">
    <h1 class="linkd" style="margin-top: 3%">Available Blood Bank</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a class="linkd" href="homepage.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Search Donor</li>
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
    $query=mysqli_query($dbconfig,"select * from blood_bank b,hospital_adminstration h where b.blood_group=\"$_SESSION[bloodgrp]\" AND h.city=\"$_SESSION[cities]\" AND b.hospital_name=h.hospital_name LIMIT $start, $limit");
    $total=mysqli_num_rows($query);
    if($total>0){ //Displaying Data in cards 
    while($result=mysqli_fetch_array($query))
    { 
      if($index%3==0)
      {
        echo"<div class=\"row\">";}
         echo"<div class=\"col-lg-4 mb-4\">
          <div class=\"card h-100\">
            <h5 class=\"card-header\" style=\"background-color: #d6351e !important;color: white;\">$result[hospital_name]</h5>
            <div class=\"card-body\">
              <p class=\"card-text\">Blood Group: $result[blood_group]</p>
              <p class=\"card-text\">Address: $result[address]</p>
              <p class=\"card-text\">Street: $result[street]</p>
              <p class=\"card-text\">City: $result[city]</p>
              <p class=\"card-text\">Contact: $result[contact_no]</p>
              <p class=\"card-text\">Email: $result[email]</p>
              
            </div>
            <div class=\"card-footer\" style=\"background-color: #d6351e !important;color: white;\">
                 <a href=\"confirmrequest.php?id=$result[hospital_name]&&bloodgroup=$result[blood_group]\" class=\"btn\" style=\"float: right;background-color:#332f2e;color: white; \" id onclick=\"return collect_values4();\">Request</a>

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
      echo"<center><img class=\"img-fluid rounded mb-3 mb-md-0\" src=\"http://www.yamasuta.com/Content/images/NoDataAvailable.png\"  alt=\"Not Available\"></center>";

  ?>
<!-- display pagination -->
<div class="row text-center">
  <div class="col-lg-12">
    <br>
      <?php
        $rows=mysqli_num_rows(mysqli_query($dbconfig,"select * from blood_bank b,hospital_adminstration h where b.blood_group=\"$_SESSION[bloodgrp]\" AND h.city=\"$_SESSION[cities]\" AND b.hospital_name=h.hospital_name"));
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

<!--Footer Starts-->
  <?php include 'footer.php';?>
<!--Footer Ends-->

    <!-- Bootstrap core JavaScript -->
    <script src="css/jquery.min.js"></script>
    <script src="css/bootstrap.bundle.min.js"></script>
  </body>
</html>






