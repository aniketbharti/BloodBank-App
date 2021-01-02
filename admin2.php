
<?php 
session_start();
if(!isset($_SESSION['hospital_adminstration']))
    {
    header('Location: homepage.php' );
    }
$hospital=$_SESSION['hospital_adminstration'];
include 'links.php';
include('dbconfig.php');
?> 
<script type="text/javascript">
  function ajax(a,b,c){
    
        var req = new XMLHttpRequest();
        req.onreadystatechange = function(){
       if(req.readyState == 4 && req.status == 200){
          myData= eval("(" + req.responseText + ")");
          if(myData==true)
          {
            alert('Updated Sucessfully');
            location.reload();
          }
          else alert(req.responseText);  
          }  
          }
          req.open('POST','accept_reject_donor2.php?id='+a+'&&status='+b+'&&bgrp='+c,true); 
          req.send();
        }

        function myFunction() {
          var x = document.getElementById("show");
          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
              x.style.display = "none";
          }
  }
        
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/abc.css">
<style type="text/css">
  .linkd{
    color: #d6351e !important;
    }
 </style>
  
<body>

<?php include 'navigation_hospital.php';?>

<div class="container">
    <h1 class="linkd" style="margin-top: 3%">Blood Donors</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a class="linkd" href="homepage.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Donor List</li>
      </ol>

    <h5 class="linkd" style="margin-top: 3%">Available Blood (No. of Bottles)</h5>
      <ol class="breadcrumb">
         <?php 
            $query=mysqli_query($dbconfig,"SELECT COUNT(*) as count, blood_group FROM blood_bank where hospital_name='$hospital' GROUP BY blood_group");
            $total=mysqli_num_rows($query);
            while($result=mysqli_fetch_array($query))
            {
              echo"
              <li class=\"breadcrumb-item active\">
              <a class=\"linkd\">$result[blood_group] : $result[count]</a>
              </li>";
            }
          ?>
      </ol>

    <div class="row">
        <div class="col-lg-12 mb-4">
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

        $query=mysqli_query($dbconfig,"select d.id,d.dob,d.bloodgroup,d.weight,d.frequency,d.dates,d.allergy,u.name,u.address,u.city,u.contact_no,u.email,u.alt_contact_no from blood_donor d,user u where u.email=d.email AND d.status='' LIMIT $start, $limit");
        $total=mysqli_num_rows($query);
        
        if($total>0)
        {
          echo"<table class=\"rwd-table\" >
            <tr style=\"background-color: #d6351e !important;\">
              <th>Name</th>
              <th>Email</th>
              <th>Blood Group</th>
              <th>DOB</th>
              <th>ON</th>
              <th>Frequency</th>
              <th>Allergy</th>    
              <th>Address</th>
              <th>City</th>
              <th>Contact</th>
              <th>Accept</th>
            </tr>";
            $index=0;
            while($result=mysqli_fetch_array($query))
            {
              echo"<tr>";
              echo"<td data-th=\"Name\">$result[name]</td>
                    <td data-th=\"Email\">$result[email]</td>
                    <td data-th=\"Blood Group\">$result[bloodgroup]</td>
                    <td data-th=\"DOB\">$result[dob]</td>
                    <td data-th=\"ON\">$result[dates]</td>
                    <td data-th=\"Frequency\">$result[frequency]</td>
                    <td data-th=\"Allergy\">$result[allergy]</td>
                    <td data-th=\"Address\">$result[address]</td>
                    <td data-th=\"City\">$result[city]</td>
                    <td data-th=\"Contact\">$result[contact_no]</td>
                    <td data-th=\"Accept\">
                    <a href=\"#\" id=\"$result[id]\"onclick=\"if(confirm('Are you sure you want to accept this application ?'))ajax($result[id],'accept','none');\">Accept</a> </td></tr>";

             }
             echo"</table>";
          }
          else
            echo"<center><img class=\"img-fluid rounded mb-3 mb-md-0\" src=\"http://www.yamasuta.com/Content/images/NoDataAvailable.png\"  alt=\"Not Available\"></center>"; //Display Img if data is not available

          ?>
    </div>
  </div>
  
  <a class="btn" href="#"  onclick="myFunction()" style="float:right;margin-bottom: 5% ">Scheduled Donations</a>
<!-- display pagination -->
<div class="row text-center">
  <div class="col-lg-12">
    <br>
      <?php
        $rows=mysqli_num_rows(mysqli_query($dbconfig,"select d.dob,d.bloodgroup,d.weight,d.frequency,d.dates,d.allergy,u.name,u.address,u.city,u.contact_no,u.email,u.alt_contact_no from blood_donor d,user u where u.email=d.email AND d.status='' "));
        $total=ceil($rows/$limit);
      ?>
    <ul class="pagination justify-content-center">
      <?php 
      if($id>1)
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
<div id="show" style="display: none">
<h5 class="linkd"  style="margin-top: 3%;">Schedule Blood Donations</h5>
   <div class="row">
      <div class="col-lg-12 mb-4">
    <?php
          
        $query=mysqli_query($dbconfig,"select d.id,d.bloodgroup,u.name,u.contact_no,u.email from blood_donor d,user u where u.email=d.email AND d.approved_hospital='$hospital' AND d.status='Waiting'");
        $total=mysqli_num_rows($query);
        if($total>0)  
          {
            echo"<table class=\"rwd-table\" >
            <tr style=\"background-color: #d6351e !important;\">
            <th>Name</th>
            <th>Blood Group</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Confirm</th>
            </tr>";

            while($result=mysqli_fetch_array($query))
            {
              echo"<tr>";
              echo"<td data-th=\"Name\">$result[name]</td>
                   <td data-th=\"Blood Group\">$result[bloodgroup]</td>
                  <td data-th=\"Blood Group\">$result[email]</td>
                  <td data-th=\"Blood Group\">$result[contact_no]</td>
                  <td data-th=\"Status\">
                  <a href=\"#\" id=\"$result[id]\"onclick=\"if(confirm('Done With Blood Donation ?'))ajax($result[id],'done','$result[bloodgroup]');\">Donated</a> <a href=\"#\" id=\"$result[id]\"onclick=\"if(confirm('Are you sure you want to reject this application ?'))ajax($result[id],'withdraw','none');\">Decline</a></td></tr>";

            }
          }else echo"<h3 class=\"linkd\">No Donations Scheduled Yet</h3>";
          ?>
        </table>
      </div>
    </div>
  </div>
</div>
<br>


<!--Footer Starts-->
  <?php include 'footer.php';?>
<!--Footer Ends-->

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script  src="css/index.js"></script>

</body>


</html>
