<!-- This File is database checking file for login -->
<?php  
    session_start();
    include('dbconfig.php');
    if(isset($_POST['login']))
    {          
        $username = mysqli_real_escape_string($dbconfig,$_POST['usrname']);
        $password = mysqli_real_escape_string($dbconfig,$_POST['passwd']);
        $result = mysqli_query($dbconfig,"SELECT * FROM `user` WHERE email='$username' and password='$password'");
        $result2 = mysqli_query($dbconfig,"SELECT * FROM `hospital_adminstration` WHERE email='$username' and password='$password'");
        $count2 = mysqli_num_rows($result2);
        $count = mysqli_num_rows($result);
        if ($count2 == 1){
            $row=mysqli_fetch_row($result2);
            $_SESSION['hospital_adminstration'] = $row[4];
        }
        else if ($count == 1){
            $_SESSION['user_name'] = $username;
        }
    else
    {
        echo "<script type=\"text/javascript\">alert('Check Your Credentials');window.open(\"homepage.php\",\"_self\")</script>";
//header('Location: homepage.php');
    }
  }

  if (isset($_SESSION['user_name']))
  {
    $username = $_SESSION['user_name'];
    header('Location: homepage.php');
  }
  else if (isset($_SESSION['hospital_adminstration']))
  {
    $username = $_SESSION['hospital_adminstration'];
    header('Location: admin.php');
  }
  
?>
<!-- 
Recovery Mail Send -->

<?php
  if($_GET){
    $d=$_GET["d"];
    $sql2="SELECT * FROM `user` WHERE `email`= '$d'";
    $result2 = mysqli_query($dbconfig, $sql2);
    if(mysqli_num_rows($result2) == 1)
    {
      $row = mysqli_fetch_assoc($result2);
      $pas=$row["password"];
      require 'PHPMailer/PHPMailerAutoload.php';
      $mail = new PHPMailer;
      $mail->isSMTP();                            
      $mail->Host = 'smtp.gmail.com';             
      $mail->SMTPAuth = true;                     
      $mail->Username = 'testid300@gmail.com';
      $mail->Password = '15975300'; 
      $mail->SMTPSecure = 'tls';                 
      $mail->Port = 587;
      $mail->addAddress($d);
      $mail->SMTPOptions = array(
      'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
        )
      );   
      $mail->isHTML(true);  
      $bodyContent = '<h1>Hi we are happy to help you anytime!!</h1>';
      $bodyContent .= '<p>This email sent from blood bank india!!</p>';
      $bodyContent .= '<p>Your Password for account '.$d.' is wriiten below. <h2 id="po" style="color:red;" >'.$pas.'</h2>. You can change your password anytime after login. click below to go to our website.THANK YOU!!!!</p>';
      $mail->Subject = 'password recovery message';
      $mail->Body    = $bodyContent;
      if(!$mail->send()) {
        echo "<script type=\"text/javascript\">alert('Message Failed Due To Technical Error!');window.open(\"homepage.php\",\"_self\")</script>";
      } else {
        
       echo "<script type=\"text/javascript\">alert('password has been sent to your email address');window.open(\"homepage.php\",\"_self\")</script>";}
      }
else{

        echo "<script type=\"text/javascript\">alert('No Such Email Enter Valid Email');window.open(\"homepage.php\",\"_self\")</script>";
    
}
mysqli_close($dbconfig);  

}
?>










