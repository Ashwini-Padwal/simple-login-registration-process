<?php
include 'auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $otp = '1111';
    $query="select * from users where email='$email'";
  $sql=mysqli_query($conn,$query);
  $count=mysqli_num_rows($sql);
  if($count>0){
    $reset_token = bin2hex(random_bytes(16));
      $query2="UPDATE users SET reset_token='$reset_token' where email='$email'";
  mysqli_query($conn,$query2);
    
 
     echo "An OTP has been sent to your email. Use the following link to reset your password: <br>";
        echo "<a href='reset_password.php?token=$reset_token'>Reset Password</a><br>";
        echo "Your OTP: $otp";
    } else {
        echo "Email not found.";
    }
}
?>
