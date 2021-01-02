<!-- his Page Contains Search And Image Corousel secton of main page -->


<script type="text/javascript">
// Checking Both Fields Are Selected
	function collect_values3()
		{
			if(document.getElementById("bloodgrp").value!='select' && document.getElementById("cities").value!='select')
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
<header>
  <div class="row" style="margin-top: 3%;margin-left:3%;margin-right:3%;margin-bottom:3%  ">
  <!-- search box start -->
    <div class="col-lg-4 mb-5" style="margin-top: 4%;">
      <div class="card h-100">
      <!-- form starts -->
      <form method="POST" id="form" action="search_donor.php">
        <h4 class="card-header" style="background-color: #d6351e !important;color: white;">Search Blood Donors</h4>
          <div class="card-body">
            <div class="form-group col-sm-12">
              <label for="email">Select Blood Group</label>
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
          <div class="form-group col-sm-12">
            <label for="email">Select City</label>
            <select class="form-control" name="cities" id="cities">
              <optio value="select">Select</option>
              <option>Navi Mumbai</option>
              <option>Delhi</option>
              <option>Pune</option>
          </select>
          </div>
        </div>
        <div class="card-footer" style="background-color: #d6351e !important;color: white;">
          <button type="submit" class="btn" style="background-color:#332f2e;color: white" onclick="return collect_values3();" name="search">Search <span class="glyphicon glyphicon-chevron-right"></span></button>
          <a href="register.php" class="btn" style="float: right;background-color:#332f2e;color: white; ">Register</a>
        </div>
        </form>
        <!-- form ends -->
      </div>
    </div>
    <!-- Search box ends -->
<!-- 
    Corousel Starts -->

    <div class="col-lg-8 mb-8">        
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active" style="background-image: url('images/bloodcamp.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h5>Blood Donation Camp Organised By Prashant Thakkar</h5>
            </div>
          </div>
          <div class="carousel-item" style="background-image: url('images/bloodcamp2.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h5>Blood Donation Camp At City Hospital</h5>
            </div>
          </div>
          <div class="carousel-item" style="background-image: url('images/bloodcamp3.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h5>Blood Checking Camp At DAV School</h5>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    <!-- Corousel End -->
  </div>
</header>
