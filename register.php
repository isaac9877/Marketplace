<?php
  // Connect to the database
  $conn = mysqli_connect("localhost", "username", "password", "database");

  // Check if the form has been submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);

    // Hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the data into the database
    $sql = "INSERT INTO users (username, password, email, name) VALUES ('$username', '$password', '$email', '$name')";
    mysqli_query($conn, $sql);

    // Redirect to the login page
    header("Location: login.php");
    exit;
  }
?>

