<?php
// Connect to the database
$servername = "localhost";
$username = "yourusername";
$password = "yourpassword";
$dbname = "yourdbname";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);

// Get the user's input from the registration form
$username = $_POST["username"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password

// Execute the SQL statement
$stmt->execute();

// Check for errors and print a message
if ($stmt->affected_rows == 1) {
  echo "New user registered successfully";
} else {
  echo "Error: " . $conn->error;
}

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();
?>