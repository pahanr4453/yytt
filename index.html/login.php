<?php
$host = "localhost";
$db = "registration_db";
$user = "root";  // your DB user
$pass = "0715";      // your DB password
include('db.php');
$conn = new mysqli("localhost", "root", "0715", "Registration_db");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);  // simple hash example

$sql = "SELECT * FROM registrations WHERE username=? AND password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "Login successful!";
     header("Location: Paaass.html"); // Redirect to another page after login
    // Redirect to dashboard or set session
} else {
    echo "Invalid username or password";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Login Page</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 20px;
        }

        .login-container {
            background-color: white;
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 12px 24px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
            transition: all 0.3s ease;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            border: none;
            border-radius: 10px;
            background-color: #667eea;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #5a67d8;
        }

        .footer-text {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .footer-text a {
            color: #667eea;
            text-decoration: none;
        }

        .footer-text a:hover {
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
                border-radius: 15px;
            }

            input[type="text"],
            input[type="password"],
            input[type="submit"] {
                font-size: 14px;
                padding: 10px;
            }

            .login-container h2 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <form action="register.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
    <div class="footer-text">
        Don't have an account? <a href="file:///C:/Users/senes/OneDrive/Desktop/Pro/Registaration.html">Sign up</a>
    </div>
</div>
<script>
    function loginUser() {
      const username = document.getElementById("username").value;
      const password = document.getElementById("password").value;

      // Simple check (replace with real backend logic)
      if (username === "user" && password === "pass") {
        window.location.href = "page1.html"; // Redirect to web form
        return false;
      } else {
        alert("Invalid credentials!");
        return false;
      }
    }
  </script>
</body>
</html>
</body>
</html>

