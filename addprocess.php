<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "add_student";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $id_number = $_POST["id_number"];
    $email = $_POST["email"];
    $strand = $_POST["strand"];
    $grade_section = $_POST["grade_section"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO `student`(`name`, `id_number`, `email`, `strand`, `grade_section`, `username`, `password`) 
        VALUES ('$name', '$id_number', '$email', '$strand', '$grade_section', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Student added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
