<?php
$host = "localhost";
$db = "registration_db";
$user = "root";  // your DB user
$pass = "0715";      // your DB password


$conn = new mysqli("localhost", "Registration_db", "root", "0715");
if($conn->connect_error){
    echo "Failed to connect db".$conn->connect_error;
}
?>    