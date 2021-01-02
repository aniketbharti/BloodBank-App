<!-- Confirm Request For Blood And Providing Additional Information To The Bank -->


<?php
	session_start();
	error_reporting(E_ERROR | E_PARSE);
	include('dbconfig.php');
	if(!isset($_GET['bloodgroup'])||!isset($_GET['bloodgroup']))
    {
    header('Location: homepage.php' );
    }

	if(isset($_POST['register']))
    {
        $dieases= mysqli_real_escape_string($dbconfig,$_POST['dieases']);
        $doc_name= mysqli_real_escape_string($dbconfig,$_POST['doc_name']);
        $date = mysqli_real_escape_string($dbconfig,$_POST['date']);
        $password   = mysqli_real_escape_string($dbconfig,$_POST['password']);
        $id=$_GET['id'];
        $bloodgroup=$_GET['bloodgroup'];
        
        $email=$_SESSION['user_name'];

        $query = "SELECT email,password FROM user where email='".$email."' AND password='".$password."'";
        $result = mysqli_query($dbconfig,$query);
        $numResults = mysqli_num_rows($result);
    
        if($numResults!=1)
        {
            echo"<script type=\"text/javascript\">alert('Check Password')</script>";

        }
        else
        {

        $result=mysqli_query($dbconfig,"insert into request_blood(email,bloodgroup,hospital_name,patience_dieases,doctor_name,transfusion_date) values('$email','$bloodgroup','$id','$dieases','$doc_name','$date')");
        if($result)
        echo"<script type=\"text/javascript\">alert('Register Sucessfully');window.open(\"homepage.php\",\"_self\")</script>";
            
        }
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
        
<?php include 'navigation.php';?>

<div class="container">
    <h1 class="linkd" style="margin-top: 3%">Confirm Request</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a class="linkd" href="homepage.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Confirm Request</li>
      </ol>
	<div class="row">
		<div class="col-lg-12 mb-12">
			<form method="POST" id="form">
				<div class="row">
					<div class="col-sm-12">
						<div class="alert alert-danger">
							All the fields marked asterisk (*) are mandatory. <br>NOTE: In order to save the current data, click on Continue button. Pressing Previous button will remove the changes.
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="alert alert-info">
							Please enter as much detail as possible about yourself. Any information entered will assist us in others.
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<label><h4 class="linkd">Please Fill Following Details</h4></label><hr id="personal_info">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Patience Diease:</label>
							<input type="text" name="dieases" id="dieases" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Doctor Name</label>
							<input type="text" name="doc_name" id="doc_name" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Please Select Date On Which You Need Transfusion</label>
							<input type="date" name="date" id="date" class="form-control" required>
						</div>
					</div>							
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Enter Password To Confirm:</label>
							<input type="password" name="password" id="password" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="row" style="margin-top:5%;margin-bottom: 5% ">
					<div class="col-sm-12" align="right">
						<button type="reset" class="btn" style="background-color: ">Reset <span class="glyphicon glyphicon-repeat"></span></button>
						<button type="submit" name="register" class="btn" onclick="return collect_values5();" style="background-color: #d6351e;color: white">Continue <span class="glyphicon glyphicon-chevron-right"></span></button>
					</div>
				</div>
			</form>					
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
