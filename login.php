
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Log In - Influence Connect</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>Log In</h2>
  <form action="login.php" method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Log In</button>
  </form>
</body>
</html>

<?php
// login.php - Login handler
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $conn->real_escape_string($_POST['email']);
  $password = $_POST['password'];

  // Retrieve the user by email
  $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    // Verify the password
    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      echo "Login successful!";
      // Redirect to the dashboard or homepage
    } else {
      echo "Incorrect password.";
    }
  } else {
    echo "User not found.";
  }
}?>
