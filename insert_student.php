<?php
// Include the database connection file
require_once 'includes/db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $age = $_POST['age'];

  // Validate the input
  if (!empty($firstName) && !empty($lastName) && !empty($age)) {
    // Prepare the SQL query to prevent SQL injection
    $stmt = $connect->prepare("INSERT INTO students (firstName, lastName, age) VALUES (?, ?, ?)");

    if ($stmt) {
      // Bind the parameters
      $stmt->bind_param("ssi", $firstName, $lastName, $age);

      // Execute the statement
      if ($stmt->execute()) {
        echo "<script>alert('New student added successfully!');</script>";
      } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
      }

      // Close the statement
      $stmt->close();
    } else {
      echo "<script>alert('Error preparing the statement: " . $connect->error . "');</script>";
    }
  } else {
    echo "<script>alert('Please fill in all fields.');</script>";
  }

  // Close the database connection
  $connect->close();
}
