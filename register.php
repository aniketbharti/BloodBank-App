<!-- This Page is used to register a user -->

<?php

include('dbconfig.php');

if(isset($_POST['register'])) //Registration or insertion
    {
        $fname      = mysqli_real_escape_string($dbconfig,$_POST['fname']);
        $email  = mysqli_real_escape_string($dbconfig,$_POST['email']);
        $sex = mysqli_real_escape_string($dbconfig,$_POST['sex']);
        $password   = mysqli_real_escape_string($dbconfig,$_POST['password']);
        $address      = mysqli_real_escape_string($dbconfig,$_POST['address']);
        $street_name   = mysqli_real_escape_string($dbconfig,$_POST['street_name']);
        $city   = mysqli_real_escape_string($dbconfig,$_POST['city']);
        $zipcode   = mysqli_real_escape_string($dbconfig,$_POST['zipcode']);
        $state   = mysqli_real_escape_string($dbconfig,$_POST['state']);
        $number   = mysqli_real_escape_string($dbconfig,$_POST['number']);
        $alt_number   = mysqli_real_escape_string($dbconfig,$_POST['alt_number']);
        $alternate_email   = mysqli_real_escape_string($dbconfig,$_POST['alternate_email']);

        $query = "SELECT email FROM user where email='".$email."'"; //checking if email already exist
        $result = mysqli_query($dbconfig,$query);
        $numResults = mysqli_num_rows($result);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))  {
            $message =  "Invalid email address please type a valid email!!";
            echo"ddd";
        }
        
        if($numResults>=1)
        {
            $message = $email." Email already exist!!";
            echo"<script type=\"text/javascript\">alert('Email Already Exists')</script>";

        }
        else
        {
		    $result=mysqli_query($dbconfig,"insert into user(name,email,sex,password,address,street,city,zipcode,state,contact_no,alt_contact_no,alt_email) values('$fname','$email','$sex','$password','$address','$street_name','$city','$zipcode','$state','$number','$alt_number','$alternate_email')");
        	if($result)
        		echo"<script type=\"text/javascript\">alert('Register Sucessfully')</script>";
        	else
        		echo"<script type=\"text/javascript\">alert('Error Occured')</script>";
        }
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
    	if(document.getElementById("password").value!=document.getElementById("confirm_password").value) //checking both password and confirm password are same or not
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

<?php include 'navigation.php';?>
      <!--Navbar Ends-->

<div class="container">
      <!-- Page Heading/Breadcrumbs -->
 <h1 class="linkd" style="margin-top: 3%">Registration</h1>
   <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a class="linkd" href="homepage.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Basic Registration</li>
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
					<label><h4 class="linkd">Your Login Information</h4></label><hr id="personal_info">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Full Name:</label>
								<input type="text" name="fname" id="fname" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Email</label>
							<input type="email" name="email" id="email" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label name="sex"><span style="color:red">*</span>Sex:</label><br>
								<label class="radio-inline">
								<input type="radio" name="sex" id="male" value="male" checked required>Male
								</label>
								<label class="radio-inline">
								<input type="radio" name="sex" id="female" value="female">Female
								</label>
						</div>
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
				<div class="col-sm-12">
					<label><h4 class="linkd">Your Address</h4></label><hr id="personal_info">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Address</label>
							<input type="text" name="address" id="address" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Street Name:</label>
							<input type="text" name="street_name" id="street_name" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>City</label>
							<input type="text" name="city" id="city" class="form-control" required>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Zipcode:</label>
							<input type="tel" name="zipcode" class="form-control" id="zipcode" minlength="6" maxlength="6" required>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>State</label>
							<input type="text" name="state" class="form-control" id="state" required readonly="on" value="Maharashtra">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<label><h4 class="linkd">Contact Information</h4></label><hr id="personal_info">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label><span style="color:red">*</span>Contact Number:</label>
							<input type="tel" name="number" id="number" class="form-control" maxlength="10" minlength="8" required>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Alternate Number:</label>
							<input type="tel" name="alt_number" id="alt_number" class="form-control" maxlength="10" minlength="8">
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Alternate EmailID:</label>
							<input type="email" name="alternate_email" id="alternate_email" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top:5%;margin-bottom: 5% ">
				<div class="col-sm-12" align="right">
					<button type="reset" class="btn" style="background-color: ">Reset <span class="glyphicon glyphicon-repeat"></span></button>
					<button type="submit" name="register" class="btn" onclick="return collect_values();" style="background-color: #d6351e;color: white">Continue <span class="glyphicon glyphicon-chevron-right"></span></button>
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
