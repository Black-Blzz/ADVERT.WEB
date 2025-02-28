<?php
// chat_backend.php - Handle chat messages
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $user_id = $conn->real_escape_string($_POST['user_id']);
  $message = $conn->real_escape_string($_POST['message']);

  $sql = "INSERT INTO chat (user_id, message, timestamp) VALUES ('$user_id', '$message', NOW())";
  if ($conn->query($sql) === TRUE) {
    echo "Message sent!";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// For GET requests, fetch and return chat messages as JSON
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $sql = "SELECT chat.*, users.username FROM chat JOIN users ON chat.user_id = users.id ORDER BY timestamp ASC";
  $result = $conn->query($sql);
  $messages = [];
  while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
  }
  header('Content-Type: application/json');
  echo json_encode($messages);
}
?>
