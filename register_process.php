<?php
include 'auth.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (register($username, $email, $password)) {
        header('Location: login.php');
    } else {
        echo "Registration failed.";
    }
}
?>
