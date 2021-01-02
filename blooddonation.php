<!-- This Form is for blood donation -->
<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

if(!isset($_SESSION['user_name']))
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
    	function collect_values2()
		{
			if(document.getElementById("bloodgrp").value!='select' && document.getElementById("freq").value!='select')
			{
				return true;
			}
			else
			{
				alert("Please Select Both Fields");
				return false;
			}
		}
    </script>
	

	<?php include 'navigation.php';?>
      <!--Navbar Ends-->
			
			<div class="container">
      <!-- Page Heading/Breadcrumbs -->
      			<h1 class="linkd" style="margin-top: 3%">Blood Donation</h1>
      			<ol class="breadcrumb">
        			<li class="breadcrumb-item"><a class="linkd" href="homepage.php">Home</a></li>
        			<li class="breadcrumb-item active">Blood Donation</li>
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
										Please enter as much detail as possible about yourself. Any information entered will assist us in helping others.
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<label><h4 class="linkd">Additional Information</h4></label><hr id="personal_info">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="col-sm-12">
										<div class="form-group">
											<label><span style="color:red">*</span>Date Of Birth</label>
											<input type="date" name="date" id="date" class="form-control" required>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="col-sm-12">
										<div class="form-group">
											<label><span style="color:red">*</span>Blood Group</label>
											<select class="form-control" name="bloodgrp" id="bloodgrp">
                								<option value="select">Select</option>
                								<option value="A+">A+</option>
                								<option value="B+">B+</option>
                								<option value="AB+">AB+</option>
                								<option value="AB-">AB-</option>
                								<option value="B-">B-</option>
                								<option value="O+">O+</option>
                								<option value="O-">O-</option>
              								</select>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="col-sm-12">
										<div class="form-group">
											<label><span style="color:red">*</span>Weight:</label>
											<input type="number" name="weight" id="weight" class="form-control" required>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="col-sm-12">
										<div class="form-group">
											<label><span style="color:red">*</span>How Often You Donate Blood:</label>
											<select class="form-control" name="freq" id="freq" required>
                								<option value="select">Select</option>
                								<option value="Yet To Donate">Yet To Donate</option>
                								<option value="Regular Donor">Regular Donor</option>
                								<option value="Need Basis">Need Basis</option>
              								</select>
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Prefareable dates To Donate</label>
												<input type="date" name="dates" id="dates" value="-" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Any Allergy</label>
											<input type="text" name="allergy" value="None" id="allergy" class="form-control">
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<label><h4 class="linkd">Please check your eligibility to donate blood</h4></label><hr id="personal_info">
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-12">
										<div class="form-group">
											<ul>
											<li>My hemoglobin is not less than 12.5 grams</li>
											<li>I am free from acute respiratory diseases and skin diseases</li>
											<li>I am free from acute respiratory diseases and skin diseases</li>
											<li>I do not carry any disease transmissible by blood transfusion</li>
											<li>I am not under medication for Malaria / Tuberculosis / Diabetes / Fits / Convulsions</li>
											</ul>
										</div>
									</div>
								</div>
								</div>

							<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-12">
										<div class="form-group">
											<label><span style="color:red">I have not suffered from #</span></label>
											<input type="checkbox" name="diease1" value="Hepatitis B C" class="form-control" required style="border-color: none!important" >Hepatitis B C<br>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-12">
										<div class="form-group">
											<input type="checkbox" name="diease2" value="Cancer" class="form-control" required>Cancer<br>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-12">
										<div class="form-group">
											<input type="checkbox" name="diease3" value="HIV" class="form-control" required>HIV<br>
										</div>
									</div>
								</div>
								</div>
								<div class="row">
								<div class="col-sm-12">
									<div class="col-sm-12">
										<div class="form-group">
											<input type="checkbox" name="diease4" value="Cancer" class="form-control" required>Cancer<br>
										</div>
									</div>
								</div>
								</div>

							<div class="row" style="margin-top:5%;margin-bottom: 5% ">
								<div class="col-sm-12" align="right">
									<button type="reset" class="btn" style="background-color: ">Reset <span class="glyphicon glyphicon-repeat"></span></button>
									<button type="submit" name="register" class="btn" onclick="return collect_values2();" style="background-color: #d6351e;color: white">Continue <span class="glyphicon glyphicon-chevron-right"></span></button>
							
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

<?php

include('dbconfig.php');

if(isset($_POST['register'])) //register
    {
        $date      = mysqli_real_escape_string($dbconfig,$_POST['date']);
        $email  = $_SESSION['user_name'];
        $bloodgrp = mysqli_real_escape_string($dbconfig,$_POST['bloodgrp']);
        $weight   = mysqli_real_escape_string($dbconfig,$_POST['weight']);
        $freq      = mysqli_real_escape_string($dbconfig,$_POST['freq']);
        $dates   = mysqli_real_escape_string($dbconfig,$_POST['dates']);
        if($dates=='')
        	$dates='Not Specified';
        $allergy   = mysqli_real_escape_string($dbconfig,$_POST['allergy']);
        $result=mysqli_query($dbconfig,"insert into blood_donor(email,dob,bloodgroup,weight,frequency,dates,allergy) values('$email','$dates','$bloodgrp','$weight','$freq','$dates','$allergy')");
        if($result)
        echo"<script type=\"text/javascript\">alert('Register Sucessfully')</script>";
            
    }
?>