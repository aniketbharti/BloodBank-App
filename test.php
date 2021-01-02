<!-- This File Is Used To Add Blood Donation Camp Details -->


<?php 
  session_start();
  error_reporting(E_ERROR | E_PARSE);
  if(!isset($_SESSION['hospital_adminstration'])) //checking login or not
    {
    header('Location: homepage.php' );
    }
    
  $user=$_SESSION['hospital_adminstration'];
  include 'dbconfig.php'; //Database File
?>
<?php include 'links.php'; //Link Files?> 

	<script type="text/javascript">
			$(document).ready(function(){
			    $('[data-toggle="tooltip"]').tooltip();
			});
	</script>
	
  <script type="text/javascript">
		function news_show(){
			document.getElementById("news").style.display="block";
		} //Used To How Hidden Edit Event
	</script>
	
  <script type="text/javascript">
		$('.modal').modal('hide');
	</script>
  
  <style type="text/css">
  .linkd{
    color: #d6351e !important;
    }
  </style>

<?php include 'navigation_hospital.php'; //Navigation Included?>

<body>

<div class="container" > <!-- container starts -->
  <h1 class="linkd" style="margin-top: 3%" class="linkd">Event Add</h1>
   <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a class="linkd" href="homepage.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Add Event</li>
    </ol>

	<div class="row"> <!-- row starts  -->
		<div class="col-lg-12 mb-4">
			<div class="card h-100" > <!-- background card -->
					<h3 class="card-header" class="linkd" >Add Voluntary Event</h3>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12 mb-12">
                <form method="POST" id="form">
                  <div class="row">     
                    <div class="col-sm-12">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <label>Image File Name:</label>
                          <input type="text" name="image_name" value="image/" class="form-control" required>
                        </div>
                      </div>
                  </div>
              </div>
            <div class="row">     
              <div class="col-sm-12">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Headline:</label>
                    <input type="text" name="headline" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>
          <div class="row">     
            <div class="col-sm-12">
              <div class="col-sm-12">
                <div class="form-group">
                  <label>Content:</label>
                    <textarea rows="5" name="content" class="form-control" required></textarea>
                </div>
              </div>
          </div>
      </div>
    <div class="row">     
        <div class="col-sm-12">
          <div class="col-sm-12">
            <div class="form-group">
              <label>Date:</label>
               <input type="date" name="date" class="form-control" required>
            </div>
          </div>
        </div>
      </div>
    <div class="row" >
        <div class="col-sm-12" align="right">
           <button type="reset" class="btn" style="background-color: ">Reset <span class="glyphicon glyphicon-repeat"></span></button>
            <button type="submit" name="post_submit" class="btn btn-success" style="background-color: #d6351e;color: white">Continue <span class="glyphicon glyphicon-chevron-right"></span></button>
        </div>
      </div>
    </form>         
  </div>
</div>
</div>
</div> <!-- card ends -->
</div>
</div><!-- row ends -->

<?php 

include 'admin_open_edit_delete_news.php';?>
			
</div><!-- cointainer ends -->

<?php include 'footer.php';?>
		<!--MAIN FOOTER CLOSE-->
</body>
</html>

<?php

if(isset($_POST['post_submit'])) //Insert Data
{
  $image_name=$_POST["image_name"];
  $headline=$_POST["headline"];
  $content=$_POST["content"];
  $date=$_POST["date"];
  $sql="INSERT INTO voluntary_event (image_name,headline,content,dates,Organised) VALUES('$image_name','$headline','$content','$date','$user')";
  if(!mysqli_query($dbconfig,$sql))
    echo mysqli_error($dbconfig);
  else
    echo "<script>
          alert('Event Posted Successfully');
        window.location.href='test.php';
        </script>
        ";

}


?>