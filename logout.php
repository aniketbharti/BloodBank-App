<?php
session_start();

$_SESSION['user_name']='';
unset($_SESSION['user_name']);

$_SESSION['hospital_adminstration']='';
unset($_SESSION['hospital_adminstration']);


$_SESSION['admin']='';
unset($_SESSION['admin']);

$_SESSION['cities']='';
unset($_SESSION['cities']);
    
$_SESSION['bloodgrp']='';
unset($_SESSION['bloodgrp']);

echo"<script type=\"text/javascript\">
sessionStorage.clear();
window.open(\"homepage.php\",\"_self\")
</script>";
//header ('location: homepage.php');

?>