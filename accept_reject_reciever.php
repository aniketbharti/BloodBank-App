<!-- This File is used to reject/accept request for blood -->
 <?php
include("dbconfig.php");
parse_str($_SERVER['QUERY_STRING']);
if($status=='accept')
$query=mysqli_query($dbconfig,"update request_blood set status='Accept' where id= $id");
else if($status=='reject')
$query=mysqli_query($dbconfig,"update request_blood set status='Reject' where id= $id");
if($query)
{
echo json_encode(true);
}
?> 