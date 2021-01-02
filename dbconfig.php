<!-- Database connection file -->

<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="bloodbank2";
	$dbconfig=mysqli_connect($servername,$username,$password,$dbname);
	if(!$dbconfig)
	die("Connection failed.<br>".mysqli_connect_error());
?>