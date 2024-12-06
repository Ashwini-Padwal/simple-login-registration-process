<?php
include 'auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $otp = $_POST['otp'];
    $new_password = $_POST['password'];
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
    $static_otp = '1111';

    if ($otp == $static_otp) {

    if (resetPassword($token, $new_password)) {
        echo "Password reset successfully. Check your email for the new password.";
        echo "<a href='login.php?token=$reset_token'>GO to login page</a><br>";
        
    } else {
        echo "Password reset failed.";
    }
}else {
        echo "Invalid OTP.";
    }
}
?>
