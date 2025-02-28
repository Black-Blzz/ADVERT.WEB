<?php
// signin.php - Registration handler
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve and sanitize form inputs
  $username = $conn->real_escape_string($_POST['username']);
  $email = $conn->real_escape_string($_POST['email']);
  $password = $_POST['password'];

  // Hash the password for security
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Insert the new user into the database
  $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

  if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
    // Optionally, redirect to a welcome page or login page
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign In - Influence Connect</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Sign In</h2>
  <form action="signin.php" method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
  </form>
</body>
</html>
