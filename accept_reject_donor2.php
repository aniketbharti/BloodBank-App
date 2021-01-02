<!-- This file is used for accept / reject for blood donate -->
 <?php

 session_start();
 $hospital=$_SESSION['hospital_adminstration'];

include("dbconfig.php");
parse_str($_SERVER['QUERY_STRING']);
if($status=='accept')
$query=mysqli_query($dbconfig,"update blood_donor set approved_hospital='$hospital',status='Waiting' where id= $id");
else if($status=='withdraw')
{
$query=mysqli_query($dbconfig,"update blood_donor set status='Reject' where id= $id");

}
else if($status=='done')
{
$query=mysqli_query($dbconfig,"update blood_donor set status='Donated'where id= $id");
$query2=mysqli_query($dbconfig,"insert into blood_bank (hospital_name,blood_group) VALUES ('$hospital','$bgrp')");
}

if($query)
{
echo json_encode(true);
}
?> 