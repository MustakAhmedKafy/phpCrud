<?php
// Include the database connection file
require_once 'includes/db.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the delete button is clicked and if the student ID is set
if (isset($_POST['id'])) {
  // Retrieve the student's ID from the POST request
  $student_id = intval($_POST['id']);

  if ($student_id > 0) {
    // Prepare the SQL query to prevent SQL injection
    $stmt = $connect->prepare("DELETE FROM students WHERE id = ?");

    if ($stmt) {
      // Bind the parameter
      $stmt->bind_param("i", $student_id);

      // Execute the statement
      if ($stmt->execute()) {
        echo "<script>alert('Student deleted successfully!'); window.location.href='index.php';</script>";
      } else {
        echo "<script>alert('Error executing the statement: " . $stmt->error . "');</script>";
      }

      // Close the statement
      $stmt->close();
    } else {
      echo "<script>alert('Error preparing the statement: " . $connect->error . "');</script>";
    }
  } else {
    echo "<script>alert('Invalid student ID.');</script>";
  }
} else {
  echo "<script>alert('No student ID provided.'); window.location.href='index.php';</script>";
}

// Close the database connection
$connect->close();
?>