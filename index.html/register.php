<?php
$host = "localhost";         // or 127.0.0.1
$user = "root";     // your database username
$password = "0715"; // your database password
$database = "registration_db"; // your database name




// Create connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: echo to confirm
// echo "Connected successfully";
if ($conn->query($sql) === TRUE) {
    echo "Result submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
