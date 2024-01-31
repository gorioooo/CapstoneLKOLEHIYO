<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <title>Login Page</title>
</head>
<body>
    <div class="main-container">
        <div class="login-container">
            <img src="./img/logo.jpg" alt="letran-logo">
            <h2>WELCOME BACK!</h2>
            <p>Login to your account</p>
            <form id="login-form" action="loginprocess.php" method="post">
                <input type="text" id="username" name="username" placeholder="Username" required><br><br>
                <input type="password" id="password" name="password" placeholder="Password" required><br><br>
                <input type="submit" class="submit" value="SIGN IN">
                <p>Don't have an account? <a href="register.php">Sign Up</a></p>
            </form>
        </div>
    </div>
</body>
</html>


