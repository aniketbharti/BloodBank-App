<?php
session_start();
if(!isset($_SESSION['hospital_adminstration']))
    {
    header('Location: index.php' );
    }
$hospital=$_SESSION['hospital_adminstration'];

include('dbconfig.php');

if(isset($_POST['update'])) 
    {
        $fname      = mysqli_real_escape_string($dbconfig,$_POST['fname']);
        $email  = mysqli_real_escape_string($dbconfig,$_POST['email']);
        $password   = mysqli_real_escape_string($dbconfig,$_POST['password']);
        $address      = mysqli_real_escape_string($dbconfig,$_POST['address']);
        $street_name   = mysqli_real_escape_string($dbconfig,$_POST['street_name']);
        $city   = mysqli_real_escape_string($dbconfig,$_POST['city']);
        $number   = mysqli_real_escape_string($dbconfig,$_POST['number']);
        $alternate_email   = mysqli_real_escape_string($dbconfig,$_POST['alternate_email']);
		$result=mysqli_query($dbconfig,"update hospital_adminstration set name='$fname',email='$email',password='$password',address='$address',street='$street_name',city='$city',contact_no='$number',alt_email='$alternate_email' where hospital_name='$hospital'");
        	if($result)
        		echo"<script type=\"text/javascript\">alert('Update Sucessfully')</script>";
        	else
        		echo"<script type=\"text/javascript\">alert('Error Occured')</script>";
        
    }
?>

<!--Link Files Starts-->
<?php include 'links.php';?> 
<!--Link Files Starts-->

<style type="text/css">
  .linkd{
        color: #d6351e !important;}
</style>
<script type="text/javascript">
    function collect_values()
	{    	
    	if(document.getElementById("password").value!=document.getElementById("confirm_password").value)
		{
			alert("Password and Confirm Password fields Does Not Match");
			return false;
		}
		else
		{
			return true;

		}
	}
</script>

<?php include 'navigation_hospital.php';?>

      <!--Navbar Ends-->

<div class="container">
      <!-- Page Heading/Breadcrumbs -->
 <h1 class="linkd" style="margin-top: 3%">Update Information</h1>
   <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a class="linkd" href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Update Information</li>
    </ol>

 <div class="row">
	<div class="col-lg-12 mb-12">
		<form method="POST" id="form">
			<div class="row">
				<div class="col-sm-12">
					<div class="alert alert-danger">
						All the fields marked asterisk (*) are mandatory. <br>NOTE: In order to save the current data, click on Save button.
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

			<?php 
	$query=mysqli_query($dbconfig,"select * from hospital_adminstration where hospital_name='$hospital'");
    $total=mysqli_num_rows($query);
    while($result=mysqli_fetch_array($query))
    {

			echo'<div class="row">
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Hospital Admin Name:</label>';
								echo"<input type=\"text\" name=\"fname\" id=\"fname\" class=\"form-control\" value=\"$result[name]\" required>";
						echo'</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Email</label>';
							echo"<input type=\"email\" name=\"email\" id=\"email\" value=\"$result[email]\" class=\"form-control\" required>";
						echo'</div>
					</div>
				</div>				
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Hospital Name:</label>';
								echo"<input type=\"text\" name=\"hname\" id=\"fname\" value=\"$result[hospital_name]\" class=\"form-control\" required readonly>";
						echo'</div>
					</div>
			</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Password:</label>
							<input type="password" name="password" id="password" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Confirm Password:</label>
							<input type="password" name="confirm_password" id="confirm_password" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Address</label>';
							echo"<input type=\"text\" name=\"address\" id=\"address\" value=\"$result[address]\" class=\"form-control\" required>";
						echo'</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Street Name:</label>';
							echo"<input type=\"text\" name=\"street_name\" id=\"street_name\" value=\"$result[street]\" class=\"form-control\">";
						echo'</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>City</label>';
							echo"<input type=\"text\" name=\"city\" id=\"city\" value=\"$result[city]\" class=\"form-control\" required>";
						echo'</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Contact Number:</label>';
							echo"<input type=\"tel\" name=\"number\" id=\"number\" value=\"$result[contact_no]\" class=\"form-control\" maxlength=\"10\" minlength=\"8\" required>";
						echo'</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Alternate EmailID:</label>';
							echo"<input type=\"email\" name=\"alternate_email\" value=\"$result[alt_email]\"  id=\"alternate_email\" class=\"form-control\">";
						echo'</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top:5%;margin-bottom: 5% ">
				<div class="col-sm-12" align="right">
					<button type="reset" class="btn" style="background-color: ">Reset <span class="glyphicon glyphicon-repeat"></span></button>
					<button type="submit" name="update" class="btn" onclick="return collect_values();" style="background-color: #d6351e;color: white">Continue <span class="glyphicon glyphicon-chevron-right"></span></button>
				</div>
			</div>';}?>
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
