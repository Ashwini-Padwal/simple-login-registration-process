<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .login-div{
            margin:0 auto;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
            padding-bottom: 50px;
        }
        .heading-login{
            text-align: center;
        }
        .reg-a{
            float: right;
        }
        .login-btn{
            margin-bottom: 20px;
        }
        .login-container{
            margin-top:100px;
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="col-sm-5 login-div">
        <h2 class="mt-4 heading-login">Login</h2>
        <form action="login_process.php" method="post">
            <div class="form-group">
                <label for="username">Username or Email</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary login-btn">Login</button>
        </form>
        <a href="forgot_password.php">Forgot Password?</a>
        <a href="register.php" class="reg-a">Register Now</a>
    </div>
    </div>
</body>
</html>
