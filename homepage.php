<?php
header("Access-Control-Allow-Origin: *");
session_start();
error_reporting(E_ERROR | E_PARSE);
$_SESSION['hospital_adminstration']='';
unset($_SESSION['hospital_adminstration']);

?>
<!--Link Files Starts-->
<?php include 'links.php';?> 
<!--Link Files Starts-->

<body>
    <!--Navbar Starts-->
    <?php include 'navigation.php';?>
    <!--Navbar Ends-->
    <div id="test"></div>
    <!--Donor Starts-->
    <?php include 'search_header.php';?>
    <!--Donor Ends-->

    <!-- Page Content -->
<div class="container" >

    <!-- Voluntary Events -->
    <?php include 'latest_voluntary_events.php';?>
    <!--Voluntary Events Ends-->
    
    <!-- Nearest Hospital-->
		<?php include 'search-maps.php';?>
    <!--Nearest Hospital Ends-->
    
    <!-- Emergency Number -->
    <?php include 'emergence_number.php';?>
    <!--Emergency Number Ends-->
    
      <hr>

    <div class="row mb-4">
      <div class="col-md-8">
      </div>
      <div class="col-md-4">
          <a class="btn btn-lg btn-secondary btn-block" href="#test">Go To Top</a>
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
