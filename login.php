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
            <form id="login-form" action="login.php" method="post">
                <input type="text" id="username" name="username" placeholder="Username" required><br><br>
                <input type="password" id="password" name="password" placeholder="Password" required><br><br>
                <input type="submit" class="submit" value="SIGN IN">
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "login";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

       // Check connection
       if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

        // Handle form submission
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Secure the input
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        // Query to check credentials
        $query = "SELECT * FROM admin_login WHERE username='$username' AND password='$password'";
        $result = $conn->query($query);

        // Check if the query was successful
        if ($result && $result->num_rows > 0) {
            // Redirect to homepage
            header("Location: test.php");
            exit();
        } else {
            echo '<script>alert("Invalid username or password. Please try again.");</script>';
        }

        // Close the database connection
        $conn->close();
}
?>
</body>
</html>
