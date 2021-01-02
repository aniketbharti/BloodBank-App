
<!-- 
This Page Contains Navigation Panel For User -->


<?php
session_start();
if(isset($_SESSION['user_name'])) //checking whteher user has login.
{
  echo"<script type=\"text/javascript\">
  sessionStorage.setItem(\"userlogin_flag\",true);</script>";
}   
?>
<script type="text/javascript">
 function check_login()
  {
    if(sessionStorage.getItem("userlogin_flag")=="true") //setting session flag for login
      return true;
    else
      {
        alert("Please Login First");
        return false;
      }
  }
</script>
<!-- Navigation Panel Starts -->

<nav class="navbar fixed-top navbar-expand-lg navbar-dark fixed-top" style="background-color: #d6351e !important;color: white;">
  <div class="container">
      <a class="navbar-brand" href="homepage.php">Blood Bank India</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="voluntaryevents.php">Voluntary Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blooddonation.php" onclick="return check_login()">Donate Blood</a>
            </li>            
            <li class="nav-item">
              <a class="nav-link" href="bloodtips.php">Blood Tips</a>
            </li>
            <?php
            if(!isset($_SESSION['user_name'])) //Toggle Login And My Profile Button
            {
                echo"<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\" data-toggle=\"modal\" data-ajax=\"false\" data-target=\"#myModal\">Login</a>
                </li>";
            }
            if(isset($_SESSION['user_name']))
            {
                echo"<li class=\"nav-item dropdown\">
                  <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownPortfolio\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                  My Profile
                  </a>
                  <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"navbarDropdownPortfolio\">
                  <a class=\"dropdown-item\" href=\"user_history.php\">History</a>
                  <a class=\"dropdown-item\" href=\"userprofile.php\">Update Profile</a>
                  <a class=\"dropdown-item\" href=\"logout.php\">Logout</a>
                  </div>
                  </li>";      
            }
            if(!isset($_SESSION['user_name']))
            {
              echo"<li class=\"nav-item\">
                <a class=\"nav-link\" href=\"register.php\">Register</a>
                </li>";
            }
            ?>
          </ul>
        </div>
    </div>
</nav>
<!-- Navigation Panel Ends -->

<!-- style for modal -->
<style type="text/css">
  #othr,othr2,othr3{
      background-color:#d6351e;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #332f2e;
  }
  .btr {
    background-color: #d6351e;
    color: white;
    padding: 10px 10px;
    margin: 4px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
  </style>
<!-- End -->

<!-- Modal For Login -->

  <div class="container" >
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;" id="othr">
          <h4 id="othr3"><span class="glyphicon glyphicon-lock" data-ajax="false"></span> Login</h4>

          <button type="button" class="close" data-dismiss="modal" id="othr2" data-ajax="false" style="color: white">&times;</button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="manageuser.php" method="post">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" name="usrname" placeholder="Enter Email" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Enter password" required>
            </div><br>
              <input type="submit" class="btr" name="login" id="login">
          </form>
        </div>
        <div class="modal-footer">
          <p ><a style="float:right;color: white" data-dismiss="modal" data-toggle="modal" href="#myModal3" >Forgot Password?</a></p>
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- Ends -->

<!-- Recovery Modal -->
 <div class="container" >
  <div class="modal fade" id="myModal3"  role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;" id="othr">
          <h4 id="othr3"><span class="glyphicon glyphicon-lock" data-ajax="false"></span> Welcome To Recovery</h4>

          <button type="button" class="close" data-dismiss="modal" id="othr2" data-ajax="false" style="color: white">&times;</button>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="manageuser.php" name="a" autocomplete="on" method="GET">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Enter Your Email</label>
              <input type="email" class="form-control" id="forgot" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"  name="d" oninvalid="setCustomValidity('Enter Your Registered Email Address')" onchange="try{setCustomValidity('')}catch(e){}"  required autofocus="on">
            </div>
            <br>
            <input type="submit" class="btr" id="recover" name="login" id="logi">
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>     
    </div>
  </div>
</div>
<!-- Recovery Modal Ends -->
