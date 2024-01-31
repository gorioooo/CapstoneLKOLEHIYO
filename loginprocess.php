<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $conn = new mysqli("localhost", "root", "", "login");


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $username;

            header("Location:homepage.html");
        } else {

            echo "<script>
                    alert('Incorrect password. Please try again.');
                    window.location.href = 'login.php';
                  </script>";
        }
    } 

    $conn->close();
}
?>