<?php
include 'database.php';

function register($username, $email, $password) {
    global $conn;
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    return $conn->query($sql);
}

function login($username, $password) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username='$username' OR email='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
    }
    return false;
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function logout() {
    session_destroy();
}

function resetPassword($token, $new_password) {
    global $conn;
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
    $sql = "UPDATE users SET password='$hashed_password' WHERE reset_token='$token'";
    return $conn->query($sql);
}
?>
