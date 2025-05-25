<?php
$host = "localhost";
$dbname = "registration_db";
$username = "root";
$password = "0715";

$conn = new mysqli("localhost", "root", "0715", "registration_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and collect POST data
$name = htmlspecialchars($_POST['name']);
$index_no = htmlspecialchars($_POST['index_no']);
$school = htmlspecialchars($_POST['school']);
$class = htmlspecialchars($_POST['class']);
$contact = htmlspecialchars($_POST['contact']);
$result = htmlspecialchars($_POST['result']);
$medium = htmlspecialchars($_POST['medium']);
$et_result = htmlspecialchars($_POST['et_result']);

// SQL to insert data
$sql = "INSERT INTO al_results (name, index_no, school, class, contact, result, medium, et_result)
        VALUES ('$name', '$index_no', '$school', '$class', '$contact', '$result', '$medium', '$et_result')";

if ($conn->query($sql) === TRUE) {
    echo "Your result has been submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
