<?php
// Include the database connection file
require_once 'includes/db.php';

// Check if the delete button is clicked
if (isset($_POST['delete'])) {
  // Check if the 'id' is set in the POST request
  if (isset($_POST['id'])) {
    // Retrieve the student's ID from the form
    $student_id = $_POST['id'];

    if (!empty($student_id)) {
      // Prepare the SQL query to prevent SQL injection
      $stmt = $connect->prepare("DELETE FROM students WHERE id = ?");

      if ($stmt) {
        // Bind the parameter
        $stmt->bind_param("i", $student_id);

        // Execute the statement
        if ($stmt->execute()) {
          echo "<script>alert('Student deleted successfully!');</script>";
        } else {
          echo "<script>alert('Error: " . $stmt->error . "');</script>";
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
    echo "<script>alert('Student ID not set.');</script>";
  }

  // Close the database connection
  $connect->close();
}

// Check if the form is submitted for adding a new student
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['delete'])) {
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
